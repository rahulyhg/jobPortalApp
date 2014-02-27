<?php

namespace jobPortalApp;

class Model_ResumeTemplate extends \Model_Table {
		public $table= "jobPortalApp_resumetemplate";
	function init(){
		parent::init();
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');

	}
}