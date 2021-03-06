<?php
/** 
 * Copyright (c) 2006-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

class Onxshop_Controller_Forward extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		if ($this->GET['to']) {
			header("HTTP/1.1 301 Moved Permanently");
			onxshopGoTo($this->GET['to']);
		} else if (is_numeric($this->GET['product_id'])) {
			header("HTTP/1.1 301 Moved Permanently");
			require_once('models/common/common_node.php');
			$Node = new common_node();

			$product_homepage = $Node->getProductNodeHomepage($this->GET['product_id']);
			if (is_array($product_homepage)) {
				onxshopGoTo("/page/{$product_homepage['id']}");
			} else {
				msg("Product no longer available");
				onxshopGoTo("/");
			}
		}

		return true;
	}
}
