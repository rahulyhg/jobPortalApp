<?php

namespace jobPortalApp;

class Model_Admin_Employers extends \Model_Table {
	var $table= "jobPortalApp_employers";
	function init(){
		parent::init();

		$this->addField('employername');
		$this->addField('employeraddrss');


		$this->hasMany('Admin_jobApplied','employer_id');
	}
}