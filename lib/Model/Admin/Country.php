<?php
namespace jobPortalApp;
class Model_Admin_Country extends \Model_Table{
	public $table='jobPortalApp_country';
	function init(){
		parent::init();

<<<<<<< HEAD
		$this->addField('name')->mandatory('please enter the city name be must')->type('varchar');
		$this->addField('city_code')->mandatory('please enter the city_code be must')->type('varchar');
=======

		$this->addField('name');
		$this->hasMany('jobPortalApp/Admin_State','jobPortalApp/country_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$country=$this->add('jobPortalApp/Model_Admin_Country');
		if($this->loaded()){
		$country->addCondition('id','<>',$this->id);
		}
		$country->addCondition('name',$this['name']);
		$country->tryLoadAny();
		if($country->loaded()){
		throw $this->exception('It is Already Exist');
		}
	}
	function beforeDelete(){

	if($this->ref('jobPortalApp/Admin_State')->count()->getOne()>0)
	throw $this->exception('Please Delete State content');
>>>>>>> a482713fff0a98ef9f575351b805646c93eb5cf3
	}
}