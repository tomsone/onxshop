<?php
/**
 * Copyright (c) 2010-2012 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 */


class Onxshop_Controller_Component_News_Archive extends Onxshop_Controller {
	
	/**
	 * main action
	 */
	 
	public function mainAction() {
		
		/**
		 * initialise
		 */
		 
		require_once('models/common/common_node.php');
		$Node = new common_node();
		
		/**
		 * input data
		 */
		 
		if (is_numeric($this->GET['blog_node_id'])) $blog_node_id = $this->GET['blog_node_id'];
		else $blog_node_id = $Node->conf['id_map-blog'];
		
		if ($this->GET['date_part'] == 'year-month') $date_part = 'year-month';
		else $date_part = "year";
		
		if (!$this->GET['created']) $this->tpl->assign('ACTIVE_CLASS_ALL', 'active');
		
		$this->tpl->assign('BLOG_NODE_ID', $blog_node_id);
		
		/**
		 * process
		 */
		 
		if ($article_archive = $Node->getBlogArticleArchive($blog_node_id, 1, $date_part)) {

			foreach ($article_archive as $item) {
			
				if ($date_part == 'year-month') {
					//archive by year-month
					$item['created'] = trim($item['date_part'], '()');
					$item['created'] = preg_replace('/,/', '-', $item['created']);
					//add leading 0 to month 1 to 9 (January to September)
					$item['created'] = preg_replace('/^([0-9]{4})-([0-9]{1})$/', '\\1-0\\2', $item['created']);
					//formating can be done in template, but in this case formating depends on input
					//custom formating can still be done in the template, e.g. {ITEM.created|strtotime|strftime('%B %Y', %s)}
					$item['created_formated'] = strftime('%B %Y', strtotime($item['created']));
				} else {
					//archive by year
					$item['created'] = $item['date_part'];
					$item['created_formated'] = $item['created'];
				}
				
				//active css class
				if ($item['created'] == $this->GET['created']) $this->tpl->assign('ACTIVE_CLASS', 'active');
				else $this->tpl->assign('ACTIVE_CLASS', '');
				
				$this->tpl->assign('ITEM', $item);
				$this->tpl->parse('content.list.item');
			}
			
			$this->tpl->parse('content.list');
			
		}
		
		
		return true;
	}

}
