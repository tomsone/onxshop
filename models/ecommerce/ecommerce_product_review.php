<?php

/**
 * class ecommerce_product_review
 *
 * Copyright (c) 2009-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */
 
require_once('models/common/common_comment.php');

class ecommerce_product_review extends common_comment {

	/**
	 * NOT NULL REFERENCES ecommerce_product(id) ON UPDATE CASCADE ON DELETE RESTRICT
	 * @access private
	 */
	var $node_id;



	/**
	 * get tree
	 */
	
	function getTree($node_id, $public = 1, $sort = 'ASC') {

		$sql = "SELECT id, parent, title as name, title as title, content, author_name, author_email, author_website, author_ip_address, customer_id, created, rating FROM ecommerce_product_review WHERE publish >= $public AND node_id='$node_id' ORDER BY parent, created $sort";

		$records = $this->executeSql($sql);

		return $records;
	}

}
