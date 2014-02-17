<?php

namespace jobPortalApp;

class Model_Admin_Jobseekers extends \Model_Table {
	var $table= "jobPortalApp_jobseekers";
	function init(){
		parent::init();

		$this->addField('jobseekername');
		$this->addField('jobseekersdetailsss');


		$this->hasMany('Admin_JobApplied','jobseekers_id');
	}
}
