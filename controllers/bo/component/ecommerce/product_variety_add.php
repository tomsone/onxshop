<?php
/** 
 * Copyright (c) 2005-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 */

class Onxshop_Controller_Bo_Component_Ecommerce_Product_Variety_Add extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {

		$this->initPrice();
		
		$product_data = $_POST['product'];
		
		if (!isset($product_data['variety']['product_id'])) $product_data['variety']['product_id'] = $product_data['id'];
		
		require_once('models/ecommerce/ecommerce_product_variety.php');
		$Product_variety = new ecommerce_product_variety();
		
		$this->tpl->assign("VARIETY_CONF", $Product_variety->conf);
		
		if ($_POST['save']) {
			
			if($id = $Product_variety->insertFullVariety($product_data['variety'])) {
				
				msg("Product variety id=$id has been added.");
				
				//empty
				$product_data = array();
				
			} else {
				msg ("Can't add the product variety for product id={$product_data['variety']['product_id']}. Is your product SKU unique? Did you fill in stock value?");
			}
		}
		
		$this->tpl->assign('PRODUCT', $product_data);

		return true;
	}
	
	/**
	 * init price configuration constants
	 */
	 
	public function initPrice() {
	
		require_once('models/ecommerce/ecommerce_price.php');
		$price_conf = ecommerce_price::initConfiguration();
		
		if ($price_conf['backoffice_with_vat']) $this->tpl->assign('VAT_NOTE', I18N_PRICE_INC_VAT);
		else $this->tpl->assign('VAT_NOTE', I18N_PRICE_EX_VAT);
		
		return true;
	}
	
}
