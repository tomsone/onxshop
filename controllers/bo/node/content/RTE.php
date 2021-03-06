<?php
/** 
 * Copyright (c) 2005-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

require_once('controllers/bo/node/default.php');

class Onxshop_Controller_Bo_Node_Content_RTE extends Onxshop_Controller_Bo_Node_Default {

	/**
	 * post action
	 */

	function post() {
		
		/**
		 * check hard link
		 */
		
		$hard_links = $this->Node->findHardLinks($this->GET['id']);
		
		if (count($hard_links) > 0) {
			msg("Hard link detected, please fix.", 'error');
		}
		
		/*
		foreach ($hard_links as $hard_link) {
			$this->tpl->assign('ITEM', $hard_link);
			$this->tpl->parse('content.hard_links.item');
		}
		$this->tpl->parse('content.hard_links');
		*/		
	}
}

