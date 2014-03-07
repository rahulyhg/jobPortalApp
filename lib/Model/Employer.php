<?php
namespace jobPortalApp;
class Model_Employer extends \Model_Table{
	public $table='jobPortalApp_employer';
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Company','company_id');

		$this->addField('name')->Caption('Your Full Name');
		$this->addField('title')->Caption('Your Job Title');
		$this->addField('company_names')->Caption('Your Company');
		$this->addField('location')->Caption('Company Location');
		$this->addField('mobile_num')->type('number')->Caption('Mobile no');
		$this->addField('email')->Caption('Your Email');
		$this->addField('website')->Caption('Company Website');
		$this->addField('recruitment_needs')->Caption('Your Recruitment Needs');
		$this->addField('company_type')->enum(array('Employer','Recruiting Agency'))->display(array('form'=>'Radio'))->mandatory(true);
		$this->addField('is_active')->type('boolean')->defaultValue(false);
		
		$this->hasMany('','');
		//$this->hasMany('Admin_jobApplied','employer_id');
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

	if($this->ref('jobPortalApp/Admin_JobApplied')->count()->getOne()>0)
	throw $this->exception('Please Delete jobApplied content');

	}
}