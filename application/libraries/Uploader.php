<?php
class Uploader {
	public static $files;
	public static function save($from,$to,$folder = "tmp" , $permisions = 755){
		$result = false;
		if(in_array($from, $_FILES)){
			try{
				$info = pathinfo($_FILES[$from]['name']);
				//var_dump($info);
				$dest = DOCROOT.$folder.DIRECTORY_SEPARATOR.$info['extension'];
				move_uploaded_file($_FILES[$from]['tmp_name'], $dest);
				chmod($dest,"0".$permisions);
				seff::$files[$from] = $dest;	
				$result = true;
			}
			catch(Extension $ext){}

		}
		return $result;
	}
}
?>