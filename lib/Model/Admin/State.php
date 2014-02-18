<?php

namespace jobPortalApp;

class Model_Admin_State extends \Model_Table {
	var $table= "jobPortalApp_state";
	function init(){
		parent::init();
		$this->hasOne('Country','country_id');
		$this->addField('name')->mandatory('please enter the state name be must')->type('varchar');
		$this->addField('state_code')->mandatory('please enter the state_code be must')->type('varchar');
		$this->hasMany('City','state_id');
		$this->add('dyanamic_model/Controller_AutoCreator');
	}
}
