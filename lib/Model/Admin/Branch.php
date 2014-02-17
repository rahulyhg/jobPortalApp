<?php

namespace jobPortalApp;

class Model_Admin_Branch extends \Model_Table {
	var $table= "jobPortalApp_branch";
	function init(){
		parent::init();

		$this->addField('name');

		$this->hasOne('Admin_Company','Company_id');
		$this->hasMany('Staff','Branch_id');
		$this->addField('name');
	}
}