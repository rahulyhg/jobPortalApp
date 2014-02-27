<?php
class page_jobPortalApp_page_owner_branch extends page_jobPortalApp_page_owner_main{
	function init(){
		parent::init();
		
		$crud=$this->add('CRUD');
		$crud->setModel('jobPortalApp/Branch');
	}
}