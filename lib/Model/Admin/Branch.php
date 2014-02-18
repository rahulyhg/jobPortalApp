<?php

namespace jobPortalApp;

class Model_Admin_Branch extends \Model_Table {
	var $table= "jobPortalApp_branch";
	function init(){
		parent::init();
		$this->hasOne('Admin_Company','Company_id');
		$this->addField('name')->mandatory('please eneter the branch name be must')->type('varchar');
		$this->addField('category')->mandatory('please eneter the category name must')->type('varchar');
		$this->addField('branch_code')->mandatory('please eneter branch_code')->type('varchar');
		$this->addField('address')->mandatory('please eneter address may be must')->type('varchar');
		$this->addField('location')->mandatory('please eneter location may be must')->type('varchar');
		$this->hasMany('Staff','Branch_id');
	}
}