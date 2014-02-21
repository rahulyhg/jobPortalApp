<?php
namespace jobPortalApp;
class Model_Admin_Employer extends \Model_Table{
	public $table='jobPortalApp_employer';
	function init(){
		parent::init();
<<<<<<< HEAD
		$this->addField('name')->mandatory('please enter the employers name be must')->type('varchar');
		$this->addField('company_code')->mandatory('please enter the company_code be must')->type('varchar');
		$this->addField('e-mail')->mandatory('please enter the e-mail address')->type('varchar');
		$this->addField('address')->mandatory('please enter the current address')->type('varchar');
		$this->addField('country')->mandatory('please enter the country name be must')->type('varchar');
		$this->addField('state')->mandatory('please enter the state name be must')->type('varchar');
		$this->addField('district')->mandatory('please enter the district name be must()')->type('varchar');
		$this->addField('date')->mandatory('please enter the date')->type('date')->defaulteValue('date');

		$this->hasMany('Admin_jobApplied','employer_id');
=======


		$this->addField('name');
		$this->hasMany('jobPortalApp/Admin_JobApplied','jobPortalApp/employer_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$employer=$this->add('jobPortalApp/Model_Admin_Employer');
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

	if($this->ref('jobPortalApp/Admin_JobApplied')->count()->getOne()>0)
	throw $this->exception('Please Delete jobApplied content');
>>>>>>> a482713fff0a98ef9f575351b805646c93eb5cf3
	}
}