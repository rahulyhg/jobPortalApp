<?php
class page_jobPortalApp_page_owner_employer extends page_jobPortalApp_page_owner_main{
	function page_index(){

		$crud=$this->add('CRUD');
		$crud->setModel('jobPortalApp/Employer');
		if($crud->grid){
		$crud->grid->addPaginator(2);
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addColumn('button','deactive','Active/Deactive');
		$crud->grid->addColumn('expander','details');
	}

	if($_GET['deactive'])
	{
		$job=$this->add('jobPortalApp/Model_Employer');
		$job->load($_GET['deactive']);
        $job['is_active']=!$job['is_active'];
        $job->save();
            if($crud->grid)
            	$crud->grid->js()->reload()->execute();
			
	}
  }
		
}