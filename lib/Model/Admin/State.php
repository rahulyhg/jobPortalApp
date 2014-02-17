<?php

namespace jobPortalApp;

class Model_Admin_State extends \Model_Table {
	var $table= "jobPortalApp_state";
	function init(){
		parent::init();
		$this->hasOne('Country','country_id');
		$this->hasMany('City','state_id');
		$this->add('dyanamic_model/Controller_AutoCreator');
	}
}
