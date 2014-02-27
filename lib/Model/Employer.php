<?php
namespace jobPortalApp;
class Model_Employer extends \Model_Table{
	public $table='jobPortalApp_employer';
	function init(){
		parent::init();


		$this->addField('name');
		$this->hasMany('jobPortalApp/JobApplied','employer_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$employer=$this->add('jobPortalApp/Model_Employer');
		if($this->loaded()){
			$employer->addCondition('id','<>',$this->id);
		}
		$employer->addCondition('name',$this['name']);
		$employer->tryLoadAny();
		if($employer->loaded()){
			throw $this->exception('It is Already Exist');
		}
	}
	function beforeDelete(){

		if($this->ref('jobPortalApp/JobApplied')->count()->getOne()>0)
			throw $this->exception('Please Delete jobApplied content');
	}
}