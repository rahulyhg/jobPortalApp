
<?php
namespace jobPortalApp;
class Model_Admin_Company extends \Model_Table{
	public $table='jobPortalApp_company';
	function init(){
		parent::init();


		$this->hasOne('Epan','epan_id');
<<<<<<< HEAD
		$this->addField('name')->mandatory('please eneter the company name be must')->type('varchar');
		$this->addField('category')->mandatory('please eneter the category be must')->type('varchar');
		$this->addField('company_code')->mandatory('please eneter the company_code be must')->type('varchar');
		$this->addField('company_address')->mandatory('please eneter the company_address be must')->type('varchar');
		$this->addField('location')->mandatory('please eneter the location be must')->type('varchar');

		$this->hasMany('Admin_Branch','Company_id');
		$this->hasMany('Admin_Package','Company_id');
	$this->add('dyanamic_model/Controller_AutoCreator');
=======
		$this->addField('name');
		$this->hasMany('jobPortalApp/Admin_Branch','jobPortalApp/company_id');
		$this->hasMany('jobPortalApp/Admin_Package','jobPortalApp/company_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

>>>>>>> a482713fff0a98ef9f575351b805646c93eb5cf3
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