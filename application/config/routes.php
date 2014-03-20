<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'main';
$config['courses/([\w_\-\/]+)/([\w_\-\/]+)/([\w_\-\/]+)/([\w_\-\/]+)'] = 'main/error';
$config['courses/([\w_\-\/]+)/([\w_\-\/]+)/([\w_\-\/]+)'] = 'courses/open/$1/$2/$3';
$config['courses/([\w_\-\/]+)/([\w_\-\/]+)'] = 'courses/categories/$1/$2';
$config['courses/([\w_\-\/]+)'] = 'courses/show/$1';

$config['blog/([\w_\-\/]+).html|htm'] = 'blog/show/$1';
$config['online'] = 'main/online';
