<?php
namespace jobPortalApp;
class Model_Admin_City extends \Model_Table{
	public $table='jobPortalApp_city';
	function init(){
		parent::init();

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
	}
	
}