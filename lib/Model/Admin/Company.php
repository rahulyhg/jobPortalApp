<?php

namespace jobPortalApp;

class Model_Admin_Company extends \Model_Table {
	var $table= "jobPortalApp_company";
	function init(){
		parent::init();
		$this->hasOne('Epan','epan_id');
		$this->hasMany('Admin_Branch','Company_id');
		$this->hasMany('Admin_Package','Company_id');
	$this->add('dyanamic_model/Controller_AutoCreator');
	}
}