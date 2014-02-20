<?php

namespace jobPortalApp;

class Model_Admin_Jobseekers extends \Model_Table {
	var $table= "jobPortalApp_jobseekers";
	function init(){
		parent::init();
		$this->addField('name')->mandatory('please enter the jobseekers name be must')->type('varchar');
		$this->addField('category')->mandatory('please enter the category of jobseekers name be must')->type('varchar');
		$this->addField('company_code')->mandatory('please enter the company_code be must')->type('varchar');
		$this->addField('e-mail')->mandatory('please enter the e-mail address')->type('varchar');
		$this->addField('address')->mandatory('please enter the current address')->type('text');
		$this->addField('location')->mandatory('please enter the current location of jobseekers')->type('varchar');
		$this->addField('country')->mandatory('please enter the country name be must')->type('varchar');
		$this->addField('state')->mandatory('please enter the state name be must')->type('varchar');
		$this->addField('district')->mandatory('please enter the district name be must')->type('varchar');
		$this->addField('zip_code')->mandatory('please enter the zip_code be must')->type('varchar');
		$this->addField('phone_no')->mandatory('please enter the phone_no be must')->type('varchar');
		$this->addField('registration_no')->mandatory('please enter the jobseeker_reg_no be must')->type('varchar');
		$this->addField('products')->mandatory('please enter the product nomber be must')->type('int');
		$this->addField('date')->mandatory('please enter the date')->type('date');

		$this->hasMany('Admin_JobApplied','jobseekers_id');
	}
}
