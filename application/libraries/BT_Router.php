<?php
class Router extends Router_Core {

    public static $language = '';
    public static $current_language = '';
    public static $title    = '';
    public static $desc     = '';
    public static $keywords = '';

    public static function find_uri()
    {
        Router_Core::find_uri();
		if (Kohana::config('multi_lang.enabled')) {
			self::$current_language = Kohana::config('multi_lang.default_language');
			$allowed_languages = Kohana::config('multi_lang.allowed_languages');
			if (preg_match('~^[a-z]{2}(?=/|$)~i', Router::$current_uri, $matches) AND isset($matches[0]))
		    {
				// LC the language used in the url.
				$lang_lc = strtolower($matches[0]);

				// Check for invalid language in URL
				if ( ! array_key_exists($lang_lc, $allowed_languages))
					Event::run('system.404');
					
	            // Set the currently defined language
	            Router::$language = $lang_lc;
	            self::$current_language  = $lang_lc;
	            // Remove the language from the URI
	            Router::$current_uri = substr(Router::$current_uri, 3);
	            
	            if (Router::$current_uri == '')
				{
					// Make sure the default route is set
					$routes = Kohana::config('routes');
					if ( ! isset($routes['_default']))
						throw new Kohana_Exception('core.no_default_route');
		
					// Use the default route when no segments exist
					Router::$current_uri = $routes['_default'];
				}
	            
	            Kohana::config_set('locale.language', array($allowed_languages[Router::$language]));
	
				// Overwrite setlocale which has already been set before in Kohana::setup()
				setlocale(LC_ALL, $allowed_languages[Router::$language].'.UTF-8');
	
				// Finally set a language cookie for 60 days
				cookie::set('language', Router::$language, 5184000);
	        }
	        else
	        {
	        	// Pick a language for the user and redirect
	        	
	        	// 1. Check for a language cookie. 
	        	$new_langs[] = (string) cookie::get('language');

				// 2. Look at HTTP_ACCEPT_LANGUAGE header
				foreach(Kohana::user_agent('languages') as $language)
				{
					$new_langs[] = substr($language, 0, 2);
				}
		
				// 3. Final hard-coded fallback from config file
				$new_langs[] = Kohana::config('multi_lang.fallback_language');
		
				// Now loop through the new languages and stop at the first valid one
				foreach($new_langs as $new_lang)
				{
					if (array_key_exists($new_lang, $allowed_languages))
						break;
				}

				
				// Redirect the user so the language appears in the browser url
				 // Needed to allow url::site to give a correct url...
				
				if(!Router::$language != Kohana::config('multi_lang.default_language'))
					url::redirect(url::site(Router::$current_uri));
	        }
		}
    }

}