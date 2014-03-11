<?php

class page_jobPortalApp_page_owner_main extends page_componentBase_page_owner_main {
	function init(){
		parent::init();
		
		$menu=$this->add('Menu');
		$menu->addMenuItem('jobPortalApp_page_owner_company','Company Information');
		$menu->addMenuItem('jobPortalApp_page_owner_branch','Branch');
		$menu->addMenuItem('jobPortalApp_page_owner_staff','Staff');
		$menu->addMenuItem('jobPortalApp_page_owner_packages','Packages');
		$menu->addMenuItem('jobPortalApp_page_owner_country','Country');
		$menu->addMenuItem('jobPortalApp_page_owner_city','City');
		$menu->addMenuItem('jobPortalApp_page_owner_state','State');
		$menu->addMenuItem('jobPortalApp_page_owner_employer','Employers');
		$menu->addMenuItem('jobPortalApp_page_owner_jobseeker','JobSeekers');
		$menu->addMenuItem('jobPortalApp_page_owner_resume','Resume');
		$menu->addMenuItem('jobPortalApp_page_owner_resume_resumeField','ResumeField');
	}
}