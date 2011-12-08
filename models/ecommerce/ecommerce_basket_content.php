<?php
/**
 * class ecommerce_basket_content
 *
 * Copyright (c) 2009-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */
 
class ecommerce_basket_content extends Onxshop_Model {

	/**
	 * @access private
	 */
	var $id;
	/**
	 * REFERENCES basket(id) ON UPDATE CASCADE ON DELETE CASCADE
	 * @access private
	 */
	var $basket_id;
	/**
	 * REFERENCES product_variety(id) ON UPDATE CASCADE ON DELETE CASCADE
	 * @access private
	 */
	var $product_variety_id;
	/**
	 * @access private
	 */
	var $quantity;
	
	var $price_id;
	
	var $other_data;

	/*REFERENCES ecommerce_product_type ON UPDATE CASCADE ON DELETE RESTRICT*/
	var $product_type_id;
	
	var $_hashMap = array(
		'id'=>array('label' => '', 'validation'=>'int', 'required'=>true), 
		'basket_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'product_variety_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'quantity'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'price_id'=>array('label' => '', 'validation'=>'int', 'required'=>true),
		'other_data'=>array('label' => '', 'validation'=>'string', 'required'=>false),
		'product_type_id'=>array('label' => '', 'validation'=>'int', 'required'=>true)
	);
	
	/**
	 * create table sql
	 */
	 
	private function getCreateTableSql() {
	
		$sql = "
CREATE TABLE ecommerce_basket_content (
    id serial NOT NULL PRIMARY KEY,
    basket_id integer REFERENCES ecommerce_basket ON UPDATE CASCADE ON DELETE CASCADE,
    product_variety_id integer REFERENCES ecommerce_product_variety ON UPDATE CASCADE ON DELETE RESTRICT,
    quantity integer,
    price_id integer REFERENCES ecommerce_price ON UPDATE RESTRICT ON DELETE RESTRICT,
    other_data text,
    product_type_id smallint REFERENCES ecommerce_product_type ON UPDATE CASCADE ON DELETE RESTRICT
);
		";
		
		return $sql;
	}
	
	/**
	 * insert data
	 */
	 
	public function insertItem($data) {
	
		$data['other_data'] = serialize($data['other_data']);
		
		if (!$this->isAvailableItem($data)) return false;
		
		if ($id = $this->insert($data)) {
			msg("Item has been added to basket.", 'ok', 2);
			return $id;
		} else {
			return false;
		}

	}
	
	/**
	 * updateItem
	 */
	 
	public function updateItem($data) {
		
		if (!is_array($data)) return false;
		
		if (!is_numeric($data['id'])) return false;
		if (array_key_exists('basket_id', $data) && !is_numeric($data['basket_id'])) return false;
		if (array_key_exists('product_variety_id', $data) &&  !is_numeric($data['product_variety_id'])) return false;
		if (array_key_exists('quantity', $data) &&  !is_numeric($data['quantity'])) return false;
		if (array_key_exists('price_id', $data) && !is_numeric($data['price_id'])) return false;
		if (array_key_exists('product_type_id', $data) && !is_numeric($data['product_type_id'])) return false;
		
		if (!$this->isAvailableItem($data)) return false;
		
		if ($this->update($data)) {
			return true;
		} else {
			return false;
		}
		
	}
	
	/**
	 * get items
	 */

	public function getItems($basket_id) {
	
		if (!is_numeric($basket_id)) return false;
		
		$basket_content_data = array();
		
		$basket_content_data = $this->listing("basket_id={$basket_id}");
		
		return $basket_content_data;
	}

	/**
	 * isAvailableItem
	 */
	 
	public function isAvailableItem($data) {
		
		//get product detail
		require_once('models/ecommerce/ecommerce_product.php');
		$EcommerceProduct = new ecommerce_product();
		$product_detail = $EcommerceProduct->getProductDetailByVarietyId($data['product_variety_id'], $data['price_id']);
		
		//check stock is available
		if ($product_detail['variety']['stock'] < $data['quantity']) {
			msg("{$product_detail['variety']['sku']} is out of stock.", 'error');
			return false;
		}
		
		//check product variety is published
		if ($product_detail['variety']['publish'] == 0) {
			msg("{$product_detail['variety']['sku']} is not available.", 'error');
			return false;
		}
		
		//check product is published
		if ($product_detail['publish'] == 0) {
			msg("Product ID {$product_detail['id']} is not available.", 'error');
			return false;
		}
		
		return true;
		
	}
}
