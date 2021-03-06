<?php
/**
 * Copyright (c) 2012 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

require_once('controllers/node/layout/default.php');

class Onxshop_Controller_Node_Layout_Tabs extends Onxshop_Controller_Node_Layout_Default {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		/**
		 * check input: node id value must be numeric
		 */
		 
		if (!is_numeric($this->GET['id'])) {
			msg("node/layout/default: id not numeric", 'error');
			return false;
		}
		
		/**
		 * layout standard functions
		 */
		 
		$this->processContainers();
		$this->processLayout();
		
		/**
		 * custom functions
		 */
		 
		$this->generateTabsMenu($this->GET['id']);
	
		return true;
			
	}
	
	/**
	 * generateTabsMenu
	 */
	 
	public function generateTabsMenu($node_id) {
	
		if (!is_numeric($node_id)) return false;
		
		require_once('models/common/common_node.php');
		$Node = new common_node();
		
		$children = $Node->getChildren($node_id);
		
		if (is_array($children) && count($children) > 0) {

			$total_count = count($children);
			
			foreach ($children as $k=>$item) {
				$first_last = '';
				if ($k == 0) $first_last = 'first';
				if ($k == ($total_count - 1)) $first_last .= ' last';
				$this->tpl->assign('FIRST_LAST', $first_last);
				$this->tpl->assign('ITEM', $item);
				$this->tpl->parse('content.menu.item');
			}
			
			$this->tpl->parse('content.menu');
			
		}
		return true;
	}
	
}