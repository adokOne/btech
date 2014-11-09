<?php


class Sam_Position_Model  extends ORM{
	protected $belongs_to = array("ingredient","sam_order");
}