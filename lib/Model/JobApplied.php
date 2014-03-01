<?php
namespace jobPortalApp;
class Model_JobApplied extends \Model_Table{
	public $table='jobPortalApp_jobapplied';
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Employer','employer_id')->caption('employer Name');
		$this->hasOne('jobPortalApp/JobSeeker','jobseeker_id')->caption('jobseeker Name');
	
		
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$jobapplied=$this->add('jobPortalApp/Model_JobApplied');
		if($this->loaded()){
			$jobapplied->addCondition('id','<>',$this->id);
			}
				$jobapplied->addCondition('name',$this['name']);
				$jobapplied->tryLoadAny();
			if($jobapplied->loaded()){
				throw $this->exception('It is Already Exist');
			}
	}
	
}