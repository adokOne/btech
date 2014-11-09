<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'index';

$config["to_card/(\d+)"]  = 'index/to_card/$1';
$config["category/(.*)"] = 'index/category/$1';
$config["pages/(.*)"] = 'index/page/$1';
$config["item/(.*)"] = 'index/item/$1';
$config["contacts"] = "index/contacts";
$config["delete_from_cart/(\d+)"] = "index/delete_from_cart/$1";
$config["checkout"] = "index/checkout";
$config["create_order"] = "index/create_order";
$config["thanks"] = "index/thanks";
$config["blog/(.*)"] = "index/blog/$1";
$config["gifts"] = "index/page/gifts";
$config["specials"] = "index/specials";

$config["feedbacks"] = "index/feedbacks";
$config["zrobu_sam"] = "index/zrobu_sam";
