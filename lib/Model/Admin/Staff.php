<?php
namespace jobPortalApp;
class Model_Admin_Staff extends \Model_Table {
	public $table= "jobPortalApp_staff";
	function init(){
		parent::init();
		$this->hasOne('jobPortalApp/Admin_Branch','branch_id');
		$this->addField('name');
		
		
		$this->addHook('beforeSave',$this);

		$this->add('dyanamic_model/Controller_AutoCreator');
	}

function beforeSave(){
		$branch=$this->add('jobPortalApp/Model_Admin_Staff');
		if($this->loaded()){
			$branch->addCondition('id','<>',$this->id);
		}
			$branch->addCondition('name',$this['name']);
			$branch->tryLoadAny();
		if($branch->loaded()){
			throw $this->exception('It is Already Exist');
		}
	}

	


}