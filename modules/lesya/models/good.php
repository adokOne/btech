<?php


class Good_Model  extends ORM{
    protected $has_one = array("label");
    public    $img_dir = "/upload/goods/";
    protected $has_many = array("positions","size_counts","reviews");
    protected $belongs_to = array("category");
	public 	$sizes = array();
	public function sizes(){
		$this->sizes = array();
		foreach($this->size_counts as $pos){
			$this->sizes[$pos->size_id] = $pos->count;
		}
		return $this->sizes;
	}

	public function price(){
		return $this->price;
	}

	public function size_names(){
		$sizes = array();
		foreach($this->size_counts as $pos){
			$sizes[] = $pos->size_id;
		}
		return $sizes ? ORM::factory("size")->where("id IN (".implode(",", $sizes).")")->find_all() : array();
	}

	public function save(){
		if((int)$this->created_at < 1){
			$this->created_at = time();
		}
	    if(!strlen($this->seo_name)){
	      $this->seo_name = $this->generate_seo();
	    }
		parent::save();
	}



	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}
	public function anons(){
		$field = "anons_".Router::$current_language; 
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$current_language; 
		return $this->$field;
	}
	public function count(){
		return array_sum(array_values($this->sizes()));
	}
	public function alt_image($idx=2,$size="home"){
		$files  = is_dir(DOCROOT.$this->img_dir.$this->id) ? array_map(function($item){return (int)$item; }, scandir(DOCROOT.$this->img_dir.$this->id)) : array();
		$files  = array_filter($files);
		return file_exists(DOCROOT.$this->img_dir.$this->id."/".$idx."_".$size.".png") 
		? $this->img_dir.$this->id."/".$idx."_".$size.".png" 
		: "/upload/goods/not_found/".$size.".png";



	}

	public function alt_images($size="home"){
		$images = array();
		$files  = is_dir(DOCROOT.$this->img_dir.$this->id) ? array_map(function($item){return (int)$item; }, scandir(DOCROOT.$this->img_dir.$this->id)) : array();
		$files  = array_filter($files);
		$files  = array_unique($files);
		foreach ($files as $image_idx) {
			$image = file_exists(DOCROOT.$this->img_dir.$this->id."/".$image_idx."_".$size.".png") 
					? $this->img_dir.$this->id."/".$image_idx."_".$size.".png" 
					: "/upload/goods/not_found/".$size.".png";
			$images[] = $image;
		}
		return $images;
	}




	public function main_image($size="home"){
		$files  = is_dir(DOCROOT.$this->img_dir.$this->id) ? array_map(function($item){return (int)$item; }, scandir(DOCROOT.$this->img_dir.$this->id)) : array();
		if("original" == $size){
				return file_exists(DOCROOT.$this->img_dir.$this->id."/".current(array_filter($files)).".png") 
			? $this->img_dir.$this->id."/".current(array_filter($files)).".png" 
		: "/upload/goods/not_found/".$size.".png";
		}
		return file_exists(DOCROOT.$this->img_dir.$this->id."/".current(array_filter($files))."_".$size.".png") 
		? $this->img_dir.$this->id."/".current(array_filter($files))."_".$size.".png" 
		: "/upload/goods/not_found/".$size.".png";
	}

	public function __set($key, $value)
	{	$trim_keys = array("anons_ru","anons_uk","desc_ru","desc_uk");
		if (in_array($key, $trim_keys))
		{
			$value = trim($value);
		}

		parent::__set($key, $value);
	}

	public function is_new(){
		return time() - Kohana::config("lesya.new_time") < $this->created_at;
	}

	public function url(){
		return url::base()."product/".$this->seo_name."-".$this->id;
	}

	public function rating(){
		$count   = Database::instance()->from("reviews")->where("good_id",$this->id)->count_records();
		$total   = Database::instance()->from("reviews")->select("SUM(rating) as rating")->where("good_id",$this->id)->get()->current()->rating;
		
		return ($total/$count);
	}
    private function generate_seo(){
      return text::ru2Lat($this->name_uk);
    }
}