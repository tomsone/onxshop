<?php
/**
 * Copyright (c) 2006-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

require_once('controllers/node/content/default.php');

class Onxshop_Controller_Node_Content_Shared extends Onxshop_Controller_Node_Content_Default {

	/**
	 * main action
	 */
	 
	public function mainAction() {
		
		require_once('models/common/common_node.php');
		
		$Node = new common_node();
		
		$node_data = $Node->nodeDetail($this->GET['id']);
		
		$linked_node_id = $node_data['component']['node_id'];
		
		if (is_numeric($linked_node_id)) {
			$_nSite = new nSite("node~id={$linked_node_id}:fe_edit=0:shared=1~");
			$node_data['content'] = $_nSite->getContent();
				
			$this->tpl->assign("NODE", $node_data);
		} else {
			msg("Please select a content");
		}

		return true;
	}
}
