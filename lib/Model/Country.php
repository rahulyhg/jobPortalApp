<?php
namespace jobPortalApp;
class Model_Country extends \Model_Table{
	public $table='jobPortalApp_country';
	function init(){
		parent::init();


		$this->addField('name');
		$this->addField('code');
		$this->hasMany('jobPortalApp/State','country_id');
		
		// $this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
			$country=$this->add('jobPortalApp/Model_Country');
		if($this->loaded()){
			$country->addCondition('id','<>',$this->id);
		}
			$country->addCondition('name',$this['name']);
			$country->tryLoadAny();
		if($country->loaded()){
			throw $this->exception('It is Already Exist');
		}
	}
	// function beforeDelete(){

	// if($this->ref('jobPortalApp/State')->count()->getOne()>0)
	// throw $this->exception('Please Delete State content');
}
