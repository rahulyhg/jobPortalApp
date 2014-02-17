<?php

namespace jobPortalApp;

class Model_Admin_City extends \Model_Table {
	var $table= "jobPortalApp_city";
	function init(){
		parent::init();
		$this->hasOne('State','state_id');
		$this->addField('name');
	}
}
		