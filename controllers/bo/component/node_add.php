<?php
/** 
 * Copyright (c) 2005-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 * 
 */

class Onxshop_Controller_Bo_Component_Node_Add extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		/**
		 * input data
		 */
		 
		if (is_numeric($this->GET['expand_all'])) $expand_all = $this->GET['expand_all'];
		else $expand_all = 0;
		
		/**
		 * initialize
		 */

		require_once('models/common/common_node.php');
		
		$node_data = $_POST['node'];
		
		$Node = new common_node();

		
		if ($_POST['save']) {
			//$parent_data = $Node->getDetail($this->GET['parent']);

			if ($node_data['parent'] == $Node->conf['id_map-homepage'] && $node_data['node_group'] == 'page') {
				msg("Inserting page under the main menu");
				$home_page_data = $Node->getDetail($Node->conf['id_map-homepage']); 
				$node_data['parent'] = $home_page_data['parent'];
			}
			

			/**
			 * insert a new node
			 */
			
			if($id = $Node->nodeInsert($node_data)) {
				
				//quick pages builder
				//is broken :) $Page_builder = new nSite("bo/page_builder@blank&parent=$id&node_group={$node_data['node_group']}&node_controller={$node_data['node_controller']}");
		
				msg(ucfirst($node_data['node_group']) . " ". $node_data['title'] . " has been added.");
				$this->tpl->assign("INSERTED_NODE_ID", $id);
				
				$this->tpl->parse('content.inserted');
				
				// clean
				$node_data['title'] = '';
				
				//return true;
			}
		}
		
		$this->tpl->assign('NODE', $node_data);

		
		/**
		 * prepare
		 */
		 
		$node_controller = $node_data['node_controller'];
		$node_group = $this->GET['node_group'];
		if ($node_group == 'container') $node_group = 'page';
		
		// get the list of node types
		$Node_type = new nSite("bo/component/node_type_menu~id=0:open={$node_controller}:node_group={$node_group}:expand_all=$expand_all~");
		$this->tpl->assign("NODE_TYPE", $Node_type->getContent());

		$this->tpl->parse('content.form');
		
		return true;
	}
}
