<?php
/**
 * Multi Lang Config
 *
 * @package    MIT Framework - multi-lang module 
 * @author     Kiall Mac Innes
 * @copyright  (c) 2008 Managed I.T.
 * @link http://www.managedit.ie/ Managed I.T. Homepage
 */

$config['enabled'] = true;

$config['allowed_languages'] = array
(
	'en' => 'en_GB',
	'ru' => 'ru_RU',
	'ua' => 'ua_UK',
);

$config['fallback_language'] = 'ua';
$config['default_language']  = 'ua';

//$config['fallback_language'] = $config['default_language']; // Fallback to the default language - set to FALSE to disable fallback.
													// WARNING: Kohana::lang() doesn't respect this option.
?>
