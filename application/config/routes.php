<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'index';
$config["to_card/(\d+)"]  = 'index/to_card/$1';
$config["delete_from_cart/(\d+)"]  = 'index/delete_from_cart/$1';
$config["category/(.*)"] = "index/category/$1";
$config["product/(.*)"] = "index/product/$1";
$config["bestsellers"] = "index/bestsellers";
$config["specials"] = "index/specials";
$config["new"] = "index/new_products";
$config["set_comment/(\d+)"] = "index/set_comment/$1";

$config["page/(.*)"] = "page/index/$1";
$config["contacts"] = "page/contacts";
