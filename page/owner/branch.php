<?php
class page_jobPortalApp_page_owner_branch extends page_jobPortalApp_page_owner_main{
	function init(){
		parent::init();
		
		$crud=$this->add('CRUD');
		$crud->setModel('jobPortalApp/Branch');
		if($crud->grid){
		$crud->grid->addPaginator(2);
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addColumn('button','deactive');
		}
		if($_GET['deactive']){
			$branch=$this->add('jobPortalApp/Model_Branch');
			$branch->load($_GET['deactive']);
			$branch['is_active']=!$branch['is_active'];
			$branch->save();
			$crud->grid->js()->reload()->execute();
		}
					
	}
}