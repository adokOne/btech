<?php
class Picture {
	public static $image ;
	public static $config;

	public static function process($from,$to,$folder,$config = array()){
		self::$config = !count($config) ? Kohana::config("pictures.sizes") : array();
		self::$image  = $folder.$to;
		$image = self::save($from,$to);
		if(!file_exists(DOCROOT . $folder ))
			mkdir(DOCROOT . $folder , 0777, true);
		rename($image,$file_name);
		self::resize();
	}
	public static function save($from,$to,$folder = "tmp"){
		if(!in_array($from, Uploader::$files))
			Uploader::save($from,$to,$folder);
		return Uploader::$files[$from];
	}
	public static function resize(){
		
	}
	public static function add_watermark(){
		
	}
}
?>