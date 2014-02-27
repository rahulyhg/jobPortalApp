<?php
class page_jobPortalApp_page_owner_jobseeker extends page_jobPortalApp_page_owner_main{
	function init(){
		parent::init();

		$crud=$this->add('CRUD');

		$crud->setModel('jobPortalApp/JobSeeker');
		if($crud->grid){
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addPaginator(2);
		$crud->grid->addColumn('button','Deactive');
		$crud->grid->addColumn('expander','Details');
		}

	}

	function deactivate(){
		
	}
}