<?php
namespace jobPortalApp;
class Model_Packages extends \Model_Table{
	public $table='jobPortalApp_packages';
	function init(){
		parent::init();

		$this->hasOne('jobPortalApp/Company','company_id');
		$this->addField('name')->mandatory('Fill the name field be must');
		$this->addField('code')->caption('Package Code')->mandatory('Put the code of package');
		$this->addField('category')->caption('Category Name')->mandatory('Fill the category name');
		
		
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$packages=$this->add('jobPortalApp/Model_Packages');
		if($this->loaded()){
			$packages->addCondition('id','<>',$this->id);
		}
				$packages->addCondition('name',$this['name']);
				$packages->tryLoadAny();
		if($packages->loaded()){
				throw $this->exception('It is Already Exist');
		}
	}
	
}