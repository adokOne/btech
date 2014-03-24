<?php defined('SYSPATH') OR die('No direct access allowed.');
	
class bkt_Core {
    public function error(){
        $view = new View("erorr_page");
        $view->render(true);
    }


    public static function transliterate($st){
        $st = trim($st);


        $trn = array(
            'а' => 'a',
            'б' => 'b',
            'в' => 'v',
            'г' => 'h',
            'д' => 'd',
            'е' => 'e',
            'ё' => 'e',
            'ж' => 'zh',
            'з' => 'z',
            'и' => 'y',
            'й' => 'i',
            'к' => 'k',
            'л' => 'l',
            'м' => 'm',
            'н' => 'n',
            'о' => 'o',
            'п' => 'p',
            'р' => 'r',
            'с' => 's',
            'т' => 't',
            'у' => 'u',
            'ф' => 'f',
            'х' => 'h',
            'ц' => 'ts',
            'ч' => 'ch',
            'ш' => 'sh',
            'щ' => "shch'",
            'ъ' => '',
            'ы' => 'y',
            'ь' => "'",
            'э' => 'e',
            'ю' => 'yu',
            'я' => 'ya',
            'ї' => 'yi',
            'і' => 'i',
            'є' => 'e',
            
            'А' => 'A',
            'Б' => 'B',
            'В' => 'V',
            'Г' => 'H',
            'Д' => 'D',
            'Е' => 'E',
            'Ё' => 'E',
            'Ж' => 'Zh',
            'З' => 'Z',
            'И' => 'Y',
            'Й' => 'I',
            'К' => 'K',
            'Л' => 'L',
            'М' => 'M',
            'Н' => 'N',
            'О' => 'O',
            'П' => 'P',
            'Р' => 'R',
            'С' => 'S',
            'Т' => 'T',
            'У' => 'U',
            'Ф' => 'F',
            'Х' => 'H',
            'Ц' => 'Ts',
            'Ч' => 'Ch',
            'Ш' => 'Sh',
            'Щ' => "Shch'",
            'Ъ' => '',
            'Ы' => 'Y',
            'Ь' => "'",
            'Э' => 'E',
            'Ю' => 'Yu',
            'Я' => 'Ya',
            'Ї' => 'Yi',
            'І' => 'I',
            'Є' => 'E',            
        );

        $st = str_replace(array_keys($trn), array_values($trn), $st);
        
        return $st;
    }
    	
}


