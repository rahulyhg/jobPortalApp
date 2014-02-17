<?php

namespace jobPortalApp;

class Model_Admin_Packages extends \Model_Table {
	var $table= "jobPortalApp_packages";
	function init(){
		parent::init();
		$this->hasOne('Admin_Company','package_id');
	}
}