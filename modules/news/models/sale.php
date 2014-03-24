<?php defined('SYSPATH') OR die('No direct access allowed.');

class Sale_Model extends ORM{


	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
	public function anons(){
		$field = "anons_".Router::$cur_lang;
		return $this->$field;
	}
	public function text(){
		$field = "text_".Router::$cur_lang;
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$cur_lang;
		return $this->$field;
	}
	public function keyw(){
		$field = "keyw_".Router::$cur_lang;
		return $this->$field;
	}	
	public function save(){
		$this->generate_seo();
		parent::save();
	}
	private function generate_seo(){
		if(!strlen($this->seo)) $this->seo = bkt::transliterate($this->name());
	}
} 