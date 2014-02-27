<?php
namespace jobPortalApp;
class Model_Company extends \Model_Table{
	public $table='jobPortalApp_company';
	function init(){
		parent::init();


		$this->hasOne('Epan','epan_id');
		$this->addField('name')->mandatory('Company_Name');
		$this->addField('category')->mandatory('this field has not empity')->type('varchar');
		$this->addField('company_Code')->type('varchar');
		$this->addField('address')->mandatory('Comany_address')->type('text');
		$this->addField('location')->mandatory('Comany_Location');
	
		$this->hasMany('jobPortalApp/Branch','company_id');
		$this->hasMany('jobPortalApp/Package','company_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}

		function beforeSave(){
			$company=$this->add('jobPortalApp/Model_Company');
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

			if($this->ref('jobPortalApp/Branch')->count()->getOne()>0)
			throw $this->exception('Please Delete branch content');
	
			if($this->ref('jobPortalApp/Package')->count()->getOne()>0)
			throw $this->exception('Please Delete package content');
		}

}