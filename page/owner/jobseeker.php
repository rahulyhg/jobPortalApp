<?php
class page_jobPortalApp_page_owner_jobseeker extends page_componentBase_page_owner_main{
	function page_index(){
		//parent::init();

		$crud=$this->add('CRUD');
		
		if($_GET['deactive']){
			$this->js()->reload(array('deactive_id'=>$_GET['deactive']));
		}

		if($_GET['deactive_id']){

			$job=$this->add('jobPortalApp/Model_JobSeeker');
			$job->load($_GET['deactive_id']);
			$job['is_active']=!$job['is_active'];
			$job->save();
			if($crud->grid)
			$crud->grid->js()->reload()->execute();
		}

		$crud->setModel('jobPortalApp/JobSeeker');
		if($crud->grid){
		$crud->grid->addQuickSearch(array('name'));
		$crud->grid->addPaginator(2);
		$crud->grid->addColumn('button','deactive');
		$crud->grid->addColumn('expander','details');
		}
		//expander
		
		//expander
		// function page_jobseeker_details(){
		// 	$this->api->stickyGET($_GET['jobseeker_id']);
		// 	$jobapplied=$this->add('jobPortalApp/Model_JobApplied');
		// 	$jobapplied->addCondition('jobseeker_id',$_GET['jobseeker_id']);

		// 	$crud=$this->add('Grid');
		// 	$crud=setModel($jobapplied);

		// }

	}

}