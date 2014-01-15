
<?php defined('SYSPATH') or die('No direct script access.');
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Ext_Constructor extends Constructor 
{
    protected $template = 'ext/list';
    protected $join     = null;

    protected $sort;

    public function __construct()
    {   
        parent::__construct();
        $this->db    = Database::instance();
        $this->input = Input::instance();
        $keys_1      = array();
        $keys_2      = array();
        $this->sort     = new StdClass();
        foreach ($this->columns as $field) if ($field != 'id')
        {
            $as = strripos($field, 'AS ');
            if ($as)  $keys_1[] = substr($field, $as + 3);
            $this->user_fields[] = $field;
        }
        $fields = $this->db->field_data($this->table);
        foreach($fields as $field)
            $keys_2[] = $field->Field;

        $this->phantom_fields = array_diff($keys_1, $keys_2);

        $class = strtolower(get_class($this));
        
        $this->template = (Kohana::find_file('views/ext', $class, FALSE, 'php')) ? $class : $this->template;
        
        $this->class    = substr($class, 0, strrpos($class, '_'));

        $this->sort->property  = "id";
        $this->sort->direction = "ASC";

    }

	public function index() {

        $view  = new View($this->template);
        $view->dir       = MODPATH.'admin/views/ext/constructor';
        $view->use_form  = $this->use_form;
        $view->use_tree  = $this->use_tree;
        $view->enable_dd = $this->enable_dd;
        $view->use_logo  = $this->use_logo;
        $view->use_filter= $this->use_filter;
        $view->use_map   = $this->use_map;
        $this->use_logo  || $view->logo_path = DOCROOT."upload/".$this->class."/";         
       
        if ($this->use_tree)
            $view->tree = json_encode($this->_load_tree());

        $stores = array();
        foreach($this->stores as $key)
        {
            $func = "_load_treecombo_$key";
            $stores[$key] = json_encode($this->$func());
        }

        $view->record = ext::record($this->table, $this->columns);
        $View->user_fields = $this->user_fields;
        $view->stores = $stores; unset($stores);
        $view->class  = $this->class;
        $view->include  = file_exists($view->dir."/inc/$this->class.php") ? $view->dir."/inc/".$this->class.EXT : false;
        $view->buttons  = file_exists($view->dir."/buttons/$this->class.php") ? $view->dir."/buttons/".$this->class.EXT : false;
        $view->lang = Kohana::lang($this->class."_admin");
        $view->render(true);
    }

    protected function _list_items()
    {
        $sort = is_null($this->input->post('sort')) ? $this->sort : end(json_decode($this->input->post('sort')));
        

        $this->db
            ->from($this->table." AS daddy")
            ->select($this->user_fields);
        if(!is_null($this->join))
            $this->db->join($this->join[0],$this->join[1],$this->join[2]);
        $this->db
            ->orderby("daddy.".trim($sort->property), $sort->direction);
        if(!is_null($this->where_statement))
            $this->db->where($this->where_statement);
        $this->_filter();

        echo json_encode(ext::grid());
    }

    public function list_items(){
        $this->_list_items();
    }


	public function item_save()  {
        $model  = inflector::singular($this->table);
        $id     = $this->input->post("id");
        $object = ORM::factory($model,$id)->find();
        foreach($_POST as $key=>$value)
            if(property_exists($object,$key) || $key!="id")
                $object->$key = $value;
        $object->save();
        if($this->use_logo && (bool)$object->has_logo)
            $this->_upload_photo();
    }

	public function save()  {
        $data   = json_decode(file_get_contents('php://input'), true);
        $data   = isset($data[0]) ? $data : array($data);
        $model  = inflector::singular($this->table);

        foreach($data as $item){
            $object = $item["id"] > 0 ? ORM::factory($model,$item["id"])->find() : ORM::factory($model);
            foreach ($item as $key => $value) {
                if($key=="id" || in_array($key, $this->phantom_fields)) 
                    continue;
                $object->$key = $value;
            }
            $object->save();
        }
    }

	public function delete(){
        $data = json_decode(file_get_contents('php://input'), true);
        foreach($data as $item){
            $id = is_array($item) ? $item["id"] : $data["id"];
            $this->db->delete($this->table,array("id"=>$id));
            if(!is_array($item)) break;
        }
        $this->_list_items();
    }





    protected function _filter()
    {        
        $search = $this->input->post('search');
        $fields = json_decode(stripslashes($this->input->post('fields')), TRUE);

        $search = preg_replace("~\s+~", " ", trim($search));
        
        if ($search and $fields)
        {
            $temp = array();
            foreach ($fields as $field)
            {
                $sub_temp = array();
                foreach (explode(" ", $search) as $word)
                {
                    $sub_temp[] = $field." LIKE '%$word%'";
                }
                $temp[] = "(".implode(" OR ", $sub_temp).")";
            }
            $where = implode(" OR \n", $temp);
            $this->db->where('('.$where.')');
        }
        
        if ($tree_id = explode('_', $this->input->post('node')))
        {
            $tree_id = $tree_id[0];
            if ($tree_id)
                $this->db->where("`$this->tree_id` = '".$tree_id."'");
        }
    }


    protected function _upload_photo(){
        Uploader::save("logo","wefwef");
    }

}

?>