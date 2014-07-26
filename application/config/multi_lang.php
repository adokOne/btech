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
	'uk' => 'uk_UA',
	'ru' => 'ru_RU',
);

$config['fallback_language'] = 'ru';
$config['default_language']  = 'ru';

//$config['fallback_language'] = $config['language']; // Fallback to the default language - set to FALSE to disable fallback.
													// WARNING: Kohana::lang() doesn't respect this option.
?>
