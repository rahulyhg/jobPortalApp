<?php
namespace jobPortalApp;
class Model_Admin_City extends \Model_Table{
	public $table='jobPortalApp_city';
	function init(){
		parent::init();
<<<<<<< HEAD
		$this->hasOne('State','state_id');
		$this->addField('name')->mandatory('please enter the city name be must')->type('varchar');
		$this->addField('city_code')->mandatory('please enter the branch_code be must')->type('varchar');
=======

		$this->hasOne('jobPortalApp/Admin_State','jobPortalApp_state_id')->caption('State Name');
		$this->addField('name');
	
		
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$city=$this->add('jobPortalApp/Model_Admin_City');
		if($this->loaded()){
			$city->addCondition('id','<>',$this->id);
			}
				$city->addCondition('name',$this['name']);
				$city->tryLoadAny();
			if($city->loaded()){
				throw $this->exception('It is Already Exist');
			}
>>>>>>> a482713fff0a98ef9f575351b805646c93eb5cf3
	}
	
}
