<?php

namespace jobPortalApp;

class Model_Admin_Company extends \Model_Table {
	var $table= "jobPortalApp_company";
	function init(){
		parent::init();
		$this->hasOne('Epan','epan_id');
		$this->addField('name')->mandatory('please eneter the company name be must')->type('varchar');
		$this->addField('category')->mandatory('please eneter the category be must')->type('varchar');
		$this->addField('company_code')->mandatory('please eneter the company_code be must')->type('varchar');
		$this->addField('company_address')->mandatory('please eneter the company_address be must')->type('varchar');
		$this->addField('location')->mandatory('please eneter the location be must')->type('varchar');

		$this->hasMany('Admin_Branch','Company_id');
		$this->hasMany('Admin_Package','Company_id');
	$this->add('dyanamic_model/Controller_AutoCreator');
	}
}