<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'index';
$config["to_card/(\d+)"]  = 'index/to_card/$1';
$config["cart"]  = 'index/cart/';
$config["tort_na_zakaz"]  = 'index/tort_na_zakaz/';