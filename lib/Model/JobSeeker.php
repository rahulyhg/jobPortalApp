<?php
namespace jobPortalApp;
class Model_JobSeeker extends \Model_Table{
	public $table='jobPortalApp_jobseeker';
	function init(){
		parent::init();


	
		$this->hasMany('jobPortalApp/JobApplied','jobseeker_id');
		$this->addField('name');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$jobseeker=$this->add('jobPortalApp/Model_JobSeeker');
		if($this->loaded()){
		$jobseeker->addCondition('id','<>',$this->id);
		}
		$jobseeker->addCondition('name',$this['name']);
		$jobseeker->tryLoadAny();
		if($jobseeker->loaded()){
		throw $this->exception('It is Already Exist');
		}
	}
	function beforeDelete(){

	if($this->ref('jobPortalApp/JobApplied')->count()->getOne()>0)
	throw $this->exception('Please Delete jobApplied content');
	}
}