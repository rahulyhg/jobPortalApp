<?php
class page_jobPortalApp_page_owner_company extends page_jobPortalApp_page_owner_main{
	function init(){
		parent::init();
		
		$this->add('H3')->set('Upadate Company Information');

		$form=$this->add('Form');
		$company=$this->add('jobPortalApp/Model_Company');
		$company->addCondition('epan_id',$this->api->auth->model->id);
		$company->tryLoadAny();
		$form->setModel($company);
		$form->addSubmit('update');
		if($form->isSubmitted()){
			$form->update();
			$form->js()->univ()->successMessage('Updated SuccessFully')->execute();
		}
	}
}