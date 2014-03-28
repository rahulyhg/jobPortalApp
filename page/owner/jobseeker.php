<?php
class page_jobPortalApp_page_owner_jobseeker extends page_jobPortalApp_page_owner_main{
	function page_index(){
		//parent::init();

		$crud=$this->add('CRUD');
		
		

		if($_GET['deactive']){

			$job=$this->add('jobPortalApp/Model_JobSeeker');
			$job->load($_GET['deactive']);
			$job['is_active']=!$job['is_active'];
			$job->save();
			if($crud->grid)
			$crud->grid->js()->reload()->execute();
		}

		$crud->setModel('jobPortalApp/JobSeeker');
		if($crud->grid){
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addPaginator(2);
		$crud->grid->addColumn('button','deactive','Active/Deactive');
		$crud->grid->addColumn('expander','details');
		}
		

	}

}