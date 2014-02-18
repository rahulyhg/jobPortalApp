<?php

namespace jobPortalApp;

class Model_Admin_Country extends \Model_Table {
	var $table= "jobPortalApp_country";
	function init(){
		parent::init();

		$this->addField('name')->mandatory('please enter the city name')->type('varchar');
		$this->addField('city_code')->mandatory('please enter the city_code')->type('varchar');
	}
}