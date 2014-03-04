<?php
namespace jobPortalApp;
class Model_JobSeeker extends \Model_Table{
	public $table='jobPortalApp_jobseeker';
	function init(){
		parent::init();

		$this->hasMany('jobPortalApp/JobApplied','jobseeker_id');
		$this->addField('name')->Caption('JobSeeker name');
		$this->addField('designation');
		$this->addField('gender')->enum(array('Male','Female'))->display(array('form'=>'Radio'))->mandatory(true);
		$this->addField('dob')->type('date');
		$this->addField('age')->type('number');
		$this->addField('father_name')->Caption('Father name');
		$this->addField('mother _name')->Caption('Mother name');
		$this->addField('current_address')->type('text');
		$this->addField('parmanent_address')->type('text');
		$this->addField('category')->enum(array('gen','obc','stc','sc','st','other'));
		$this->addField('phone_number')->type('number')->Caption('Mobile no');
		$this->addField('is_active')->type('boolean')->defaultValue(true);

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		$this->hasMany('jobPortalApp/JobApplied','jobseeker_id');
		
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