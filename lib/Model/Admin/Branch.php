<?php
namespace jobPortalApp;
class Model_Admin_Branch extends \Model_Table{
	public $table='jobPortalApp_banch';
	function init(){
		parent::init();
<<<<<<< HEAD
		$this->hasOne('Admin_Company','Company_id');
		$this->addField('name')->mandatory('please eneter the branch name be must')->type('varchar');
		$this->addField('category')->mandatory('please eneter the category name must')->type('varchar');
		$this->addField('branch_code')->mandatory('please eneter branch_code')->type('varchar');
		$this->addField('address')->mandatory('please eneter address may be must')->type('varchar');
		$this->addField('location')->mandatory('please eneter location may be must')->type('varchar');
		$this->hasMany('Staff','Branch_id');
=======


		$this->hasOne('jobPortalApp/Admin_Company','jobPortalApp_company_id')->caption('Company Name');
		$this->addField('name');
		$this->hasMany('jobPortalApp/Admin_Staff','jobPortalApp/branch_id');
		
		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

	function beforeSave(){
		$branch=$this->add('jobPortalApp/Model_Admin_Branch');
		if($this->loaded()){
		$branch->addCondition('id','<>',$this->id);
		}
		$branch->addCondition('name',$this['name']);
		$branch->tryLoadAny();
		if($branch->loaded()){
		throw $this->exception('It is Already Exist');
		}
	}
	function beforeDelete(){

	if($this->ref('jobPortalApp/Admin_Staff')->count()->getOne()>0)
	throw $this->exception('Please Delete Staff content');
>>>>>>> a482713fff0a98ef9f575351b805646c93eb5cf3
	}
}