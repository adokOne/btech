
<?php defined('SYSPATH') or die('No direct script access.');
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Ext_Constructor extends Constructor 
{
    protected $template = 'ext/list';

    public function __construct()
    {   
        parent::__construct();
        $this->db    = Database::instance();
        $this->input = Input::instance();
        $keys_1      = array();
        $keys_2      = array();
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

    }

	public function index() {

        $view  = new View($this->template);
        $view->dir       = MODPATH.'admin/views/ext/constructor';
        $view->use_form  = $this->use_form;
        $view->use_tree  = $this->use_tree;
        $view->enable_dd = $this->enable_dd;
        $view->use_logo  = $this->use_logo;
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
        $view->stores = $stores; unset($stores);
        $view->class  = $this->class;
        $view->list_items = json_encode($this->_list_items());
        $view->include  = file_exists($view->dir."/inc/$this->class.php") ? true : false;
        $view->buttons  = file_exists($view->dir."/buttons/$this->class.php") ? true : false;
        $view->lang = Kohana::lang($this->class."_admin");
        $view->render(true);
    }

    protected function _list_items()
    {
        $sort = $this->input->post('sort', $this->order_by,true);
        $dir  = $this->input->post('dir',  $this->order_dir,true);
        $this->db
            ->from($this->table." AS daddy")
            ->select($this->user_fields)
            ->orderby(trim($sort), $dir);
                  
        $this->_filter();

        return ext::grid();
    }





	public function create()  {}

	public function edit()  {}

	public function save()  {}

	public function save_all()  {}

	public function delete()  {}

	public function delete_all()  {}



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

}

?>