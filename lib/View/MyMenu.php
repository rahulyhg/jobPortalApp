<?php

namespace jobPortalApp;
class View_MyMenu extends \Menu_Basic{
public $items=array();
	function init(){
		parent::init();
		
	}


	function addMenuItem($page,$label=null,$icon='comments',$panel_type='info'){
        if(!$label){
            $label=ucwords(str_replace('_',' ',$page));
        }
        $id=$this->name.'_i'.count($this->items);
        $label=$this->api->_($label);
        $js_page=null;
        if($page instanceof jQuery_Chain){
            $js_page="#";
            $this->js('click',$page)->_selector('#'.$id);
            $page=$id;
        }
        $this->items[]=array(
            'id'=>$id,
            'page'=>$page,
            'href'=>$js_page?:$this->api->url($page),
            'label'=>$label,
            'icon'=>$icon,
            'panel_type'=>$panel_type,
            // $this->class_tag=>$this->isCurrent($page)?$this->current_menu_class:$this->inactive_menu_class,
        );
        return $this;
    }


	function defaultTemplates(){
		$l=$this->api->locate('addons',__NAMESPACE__, 'location');
		$this->api->pathfinder->addLocation(
			$this->api->locate('addons',__NAMESPACE__),
			array(
		  		'template'=>'templates',
		  		'css'=>'templates/css'
				)
			)->setParent($l);
		return array('view/mymenus');
	}
}

	function addMenuItem($page,$label=null,$icon='comments',$panel_type='info'){
        if(!$label){
            $label=ucwords(str_replace('_',' ',$page));
        }
        $id=$this->name.'_i'.count($this->items);
        $label=$this->api->_($label);
        $js_page=null;
        if($page instanceof jQuery_Chain){
            $js_page="#";
            $this->js('click',$page)->_selector('#'.$id);
            $page=$id;
        }
        $this->items[]=array(
            'id'=>$id,
            'page'=>$page,
            'href'=>$js_page?:$this->api->url($page),
            'label'=>$label,
            'icon'=>$icon,
            'panel_type'=>$panel_type,
            // $this->class_tag=>$this->isCurrent($page)?$this->current_menu_class:$this->inactive_menu_class,
        );
        return $this;
    }


	function defaultTemplates(){
		$l=$this->api->locate('addons',__NAMESPACE__, 'location');
		$this->api->pathfinder->addLocation(
			$this->api->locate('addons',__NAMESPACE__),
			array(
		  		'template'=>'templates',
		  		'css'=>'templates/css'
				)
			)->setParent($l);
		return array('view/mymenus');
	}
}