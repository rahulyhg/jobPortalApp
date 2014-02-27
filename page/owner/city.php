<?php
class page_jobPortalApp_page_owner_city extends page_jobPortalApp_page_owner_main{
	function init(){
		parent::init();

		$crud=$this->add('CRUD');
		$crud->setModel('jobPortalApp/City');
		if($crud->grid){
		$crud->grid->addPaginator(2);
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addColumn('button','deactive');
		
			
		}
		
	}
}