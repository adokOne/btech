<?php defined('SYSPATH') or die('No direct script access.');
 /**
 * URL Helper modified to support multi-lang module
 *
 * @package    MIT Framework - multi-lang module 
 * @author     Kohana Team, modified by Kiall Mac Innes of Managed I.T.
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 * @link http://www.managedit.ie/ Managed I.T. Homepage
 */
class url extends url_Core {
	/**
	 * Fetches an absolute site URL based on a URI segment.
	 *
	 * @param   string  site URI to convert
	 * @param   string  non-default protocol
	 * @return  string
	 */
	public static function site($uri = '', $protocol = FALSE)
	{
		if ($path = trim(parse_url($uri, PHP_URL_PATH), '/'))
		{
			// Add path suffix
			$path .= Kohana::config('core.url_suffix');
		}

		if ($query = parse_url($uri, PHP_URL_QUERY))
		{
			// ?query=string
			$query = '?'.$query;
		}

		if ($fragment = parse_url($uri, PHP_URL_FRAGMENT))
		{
			// #fragment
			$fragment =  '#'.$fragment;
		}
		
		// Check if language is already in URL, else add the current language.
		
		$lang = '';
		
		if (Kohana::config('multi_lang.enabled')) {
			$lang = Router::$language != Kohana::config('multi_lang.default_language') && Router::$language != "" ? Router::$language.'/' : "";
		}

		// Concat the URL
		return url::base(false, $protocol).$lang.$path.$query.$fragment;
	}
	
	/**
	 * Fetches the current URI.
	 *
	 * @param   boolean  include the query string
	 * @return  string
	 */
	public static function current($qs = FALSE)
	{
		return ($qs === TRUE) ? Router::$complete_uri : Router::$current_uri;
	}
} // End url