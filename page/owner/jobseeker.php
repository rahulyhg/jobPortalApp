<?php
class page_jobPortalApp_page_owner_jobseeker extends page_componentBase_page_owner_main{
	function init(){
		parent::init();

		$crud=$this->add('CRUD');

		$crud->setModel('jobPortalApp/JobSeeker');
		if($crud->grid){
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addPaginator(2);
		}
	}
}