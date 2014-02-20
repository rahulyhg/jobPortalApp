<?php

namespace jobPortalApp;

class Model_Admin_Staff extends \Model_Table {
	var $table= "jobPortalApp_staff";
	function init(){
		parent::init();
		$this->addField('name')->mandatory('please enter the staff name be must')->type('varchar');
		$this->addField('staff_code')->mandatory('please enter the staff_code')->type('varchar');

	}
}