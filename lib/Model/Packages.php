<?php
namespace jobPortalApp;
class Model_Packages extends \Model_Table{
	public $table='jobPortalApp_packages';
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Company','company_id')->caption('State Name');
		$this->addField('name');
	
		
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$packages=$this->add('jobPortalApp/Model_Packages');
		if($this->loaded()){
			$packages->addCondition('id','<>',$this->id);
		}
				$packages->addCondition('name',$this['name']);
				$packages->tryLoadAny();
		if($packages->loaded()){
				throw $this->exception('It is Already Exist');
		}
	}
	
}