<?php
namespace jobPortalApp;
class Model_Branch extends \Model_Table{
	public $table='jobPortalApp_branch';
	function init(){
		parent::init();


   		$this->hasOne('jobPortalApp/Company','company_id')->caption('Company Name');
	   	$this->addField('name')->sortable(true);
      	$this->addField('current_address')->type('text');
		$this->addField('parmanent_address')->type('text');
		$this->addField('mobile_no')->type('number')->Caption('Mobile no');;
        $this->addField('email')->Caption('Your Email');
        $this->addField('location')->mandatory('Branch_Location');
  	    $this->addField('is_active')->type('boolean')->defaultValue(false);
 	    
 	    $this->hasMany('jobPortalApp/Staff','branch_id');

		$this->addHook('beforeDelete',$this);
		$this->addHook('beforeSave',$this);
		
		$this->add('dynamic_model/Controller_AutoCreator');

	}
	

		function beforeSave(){
			$branch=$this->add('jobPortalApp/Model_Branch');
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

		if($this->ref('jobPortalApp/Staff')->count()->getOne()>0)
		throw $this->exception('Please Delete Staff content');
		}
}