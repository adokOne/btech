<?php


class Position_Model  extends ORM{
	protected $belongs_to = array("order","good");
}