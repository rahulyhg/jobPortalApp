
<?php
namespace jobPortalApp;
class Model_Admin_Company extends \Model_Table{
	public $table='jobPortalApp_company';
	function init(){
		parent::init();


		$this->hasOne('Epan','epan_id');
		$this->addField('name');
		$this->hasMany('jobPortalApp/Admin_Branch','jobPortalApp/company_id');
		$this->hasMany('jobPortalApp/Admin_Package','jobPortalApp/company_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}

	function beforeSave(){
		$company=$this->add('jobPortalApp/Model_Admin_Company');
		if($this->loaded()){
		$company->addCondition('id','<>',$this->id);
		}
		$company->addCondition('name',$this['name']);
		$company->tryLoadAny();
		if($company->loaded()){
		throw $this->exception('It is Already Exist');
		}
	}
	function beforeDelete(){

	if($this->ref('jobPortalApp/Admin_Branch')->count()->getOne()>0)
	throw $this->exception('Please Delete Staff content');
	
	if($this->ref('jobPortalApp/Admin_Package')->count()->getOne()>0)
	throw $this->exception('Please Delete Staff content');
	}

}