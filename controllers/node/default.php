<?php
/** 
 * Copyright (c) 2009-2012 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 * 
 */

class Onxshop_Controller_Node_Default extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		$this->processLayout();

		return true;
	}
	
	/**
	 * process containers
	 */
	
	public function processContainers() {
	
		/**
		 * check node id value
		 */
		 
		if (!is_numeric($this->GET['id'])) {
			msg("node/default: id not numeric", 'error');
			return false;
		} else {
			$node_id = $this->GET['id'];
		}
		
		/**
		 * initialize
		 */
		 
		require_once('models/common/common_node.php');
		$Node = new common_node();
		$node_data = $Node->nodeDetail($node_id);
		
		//find child nodes
		$contentx = $Node->parseChildren($node_id);
		
		//assign to this controller as CONTAINER variable
		if (is_array($contentx)) {
			foreach ($contentx as $content) {
				$container[$content['container']] .= $content['content'];
			}
		}
		
		/**
		 * node add icons
		 * front-end node edit and node move (sort) icons are inserted in controller/node
		 *  
		 */
		 
		if ($_SESSION['fe_edit_mode'] == 'edit' || $_SESSION['fe_edit_mode'] == 'move') {
			//normally we support container.0 to container.6 in default templates, but why not to have some reserve, e.g. 20
			$min_container_id = 0;
			$max_container_id = 20;
			for ($key = $min_container_id; $key < ($max_container_id + 1); $key++) {
				$container[$key] = "<div class='onxshop_layout_container' id='onxshop_layout_container_{$node_id}_{$key}'>{$container[$key]}</div>";	
			}
		}
			
		$this->tpl->assign("CONTAINER", $container);
		$this->tpl->assign("NODE", $node_data);	
	}
	
	/**
	 * process layout
	 */
	 
	public function processLayout() {
	
	}
}
