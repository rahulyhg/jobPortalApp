<?php

class page_jobPortalApp_page_uninstall extends page_componentBase_page_uninstall {
	function init(){
		parent::init();

		$this->uninstall();
	}

} 