<?php
namespace jobPortalApp;
class Model_Staff extends \Model_Table {
	public $table= "jobPortalApp_staff";
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Branch','branch_id');
		$this->addField('name')->Caption('Staff name');
		$this->addField('designation');
		$this->addField('date')->Caption('Date of joining')->type('date')->defaultValue(date('Y-m-d'));
		
		$this->addField('gender')->enum(array('Male','Female'))->display(array('form'=>'Radio'))->mandatory(true);
		$this->addField('dob')->type('date');
		$this->addField('age')->type('number');
		$this->addField('father_name')->Caption('Father name');
		$this->addField('mother_name')->Caption('Mother name');
		$this->addField('current_address')->type('text');
		$this->addField('parmanent_address')->type('text');
		$this->addField('category')->enum(array('gen','obc','stc','sc','st','other'));
		$this->addField('phone_number')->type('number')->Caption('Mobile no');
		$this->addField('is_marital status')->type('boolean');
		$this->addField('is_active')->type('boolean');
		
		
		$this->addHook('beforeSave',$this);
		$this->add('dynamic_model/Controller_AutoCreator');
	}

    function beforeSave(){
		$staff=$this->add('jobPortalApp/Model_Staff');
		if($this->loaded()){
			$staff->addCondition('id','<>',$this->id);
		}
			$staff->addCondition('name',$this['name']);
			$staff->tryLoadAny();
		if($staff->loaded()){
			throw $this->exception('It is Already Exist');
		}
	}
}