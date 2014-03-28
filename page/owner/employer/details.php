<?php
class page_jobPortalApp_page_owner_employer_details extends page_componentBase_page_owner_main{
	function init(){
		parent::init();
		
		// $crud=$this->add('CRUD');
		// $crud->setModel('jobPortalApp/Country');
		$this->api->stickyGET($_GET['employer_id']);
		$employer=$this->add('jobPortalApp/Model_JobApplied');
		$employer->addCondition('employer_id',$_GET['employer_id']);
		$grid=$this->add('Grid');
		$grid->setModel($employer);
		
	}
}