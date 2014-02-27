<?php
namespace jobPortalApp;
class Model_Employer extends \Model_Table{
	public $table='jobPortalApp_employer';
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Company','company_id');

		$this->addField('name')->mandatory('please enter the employers name be must');
		//$this->addField('company_code')->mandatory('please enter the company_code be must');
		$this->addField('e_mail')->mandatory('please enter the e-mail address');
		$this->addField('address')->mandatory('please enter the current address');
		$this->addField('country')->mandatory('please enter the country name be must');
		$this->addField('state')->mandatory('please enter the state name be must');
		$this->addField('district')->mandatory('please enter the district name be must');
		$this->addField('date')->mandatory('please enter the date')->type('date');
		$this->addField('is_active')->type('boolean')->defaultValue(false);

		$this->hasMany('Admin_jobApplied','employer_id');



		
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