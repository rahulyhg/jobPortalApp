<?php
namespace jobPortalApp;
class Model_City extends \Model_Table{
	public $table='jobPortalApp_city';
	function init(){
		parent::init();

		
		$this->hasOne('jobPortalApp/Country','country_id')->caption('Country Name');
		$this->hasOne('jobPortalApp/State','state_id')->caption('State Name');
		
		$this->addField('name')->mandatory('please enter the city name be must');
		$this->addField('city_code')->mandatory('please enter the branch_code be must');


		
		
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$city=$this->add('jobPortalApp/Model_City');
		if($this->loaded()){
			$city->addCondition('id','<>',$this->id);
		}
				$city->addCondition('name',$this['name']);
				$city->tryLoadAny();
			if($city->loaded()){
				throw $this->exception('It is Already Exist');
		}
	}
	
}
