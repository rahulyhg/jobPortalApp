<?php

namespace jobPortalApp;

class Model_Admin_Packages extends \Model_Table {
	var $table= "jobPortalApp_packages";
	function init(){
		parent::init();
		$this->addField('name')->mandatory('please enter the package name')->type('varchar');
		$this->addField('code')->mandatory('please enter the package_code be must')->type('varchar');
		$this->addField('category')->mandatory('please enter the package_category be must')->type('varchar');
		$this->addField('amount')->mandatory('please enter the package_amount be must')->type('money');

		$this->hasOne('Admin_Company','package_id');
	}
}