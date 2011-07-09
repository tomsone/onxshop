<?php
/** 
 * Copyright (c) 2010-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 */

require_once('controllers/node/content/default.php');

class Onxshop_Controller_Node_Content_Textile extends Onxshop_Controller_Node_Content_Default {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		require_once('models/common/common_node.php');
		
		$Node = new common_node();
		
		$node_data = $Node->nodeDetail($this->GET['id']);
		
		if ($node_data['content']) {
			$node_data['content'] = $this->parseTextile($node_data['content']);
		}
		
		$this->tpl->assign("NODE", $node_data);
		
		if ($node_data['display_title'])  $this->tpl->parse('content.title');

		return true;
	}
	
	/**
	 * parse textile
	 */
	 
	public function parseTextile($text) {
	
		require_once('Zend/Markup.php');
		
		// Creates instance of Zend_Markup_Renderer_Html,
		// with Zend_Markup_Parser_BbCode as its parser
		$textilecode = Zend_Markup::factory('Textile');
		
		return $textilecode->render($text);
	}
}
