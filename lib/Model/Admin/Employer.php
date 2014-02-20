<?php

namespace jobPortalApp;

class Model_Admin_Employers extends \Model_Table {
	var $table= "jobPortalApp_employers";
	function init(){
		parent::init();
		$this->addField('name')->mandatory('please enter the employers name be must')->type('varchar');
		$this->addField('company_code')->mandatory('please enter the company_code be must')->type('varchar');
		$this->addField('e-mail')->mandatory('please enter the e-mail address')->type('varchar');
		$this->addField('address')->mandatory('please enter the current address')->type('varchar');
		$this->addField('country')->mandatory('please enter the country name be must')->type('varchar');
		$this->addField('state')->mandatory('please enter the state name be must')->type('varchar');
		$this->addField('district')->mandatory('please enter the district name be must()')->type('varchar');
		$this->addField('date')->mandatory('please enter the date')->type('date')->defaulteValue('date');

		$this->hasMany('Admin_jobApplied','employer_id');
	}
}