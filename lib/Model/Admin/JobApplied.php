<?php

namespace jobPortalApp;

class Model_Admin_JobApplied extends \Model_Table {
	var $table= "jobPortalApp_jobapplied";
	function init(){
		parent::init();

		$this->addField('jobname');
		$this->addField('jobdetails');


	$this->hasOne('Admin_Employers','employer_id');		
	$this->hasOne('Admin_Jobseeker','jobseeker_id');
	$this->addField('applied_at')->type('date')->defaultValue(date('Y-m-d'));		
	$this->add('dyanamic_model/Controller_AutoCreator');
	}
}