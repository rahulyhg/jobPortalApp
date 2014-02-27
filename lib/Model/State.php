<?php

namespace jobPortalApp;

class Model_State extends \Model_Table {
	public $table= "jobPortalApp_state";
	function init(){
		parent::init();
		$this->hasOne('jobPortalApp/Country','country_id');
		$this->addField('name');
		$this->addField('code');
		$this->hasMany('City','state_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}
