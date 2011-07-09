<?php
/** 
 * Copyright (c) 2009-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

class Onxshop_Controller_Bo_Node extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		$node_id = $this->GET['id'];
			
		$_nSite = new nSite("node~id=$node_id~");
		$node_data['content'] = $_nSite->getContent();
		$this->tpl->assign('NODE', $node_data);

		return true;
	}
}
