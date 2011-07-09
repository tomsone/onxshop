<?php
/** 
 * Copyright (c) 2009-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

class Onxshop_Controller_Bo_Component_Ecommerce_Product_Add_Quick extends Onxshop_Controller {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		require_once('models/ecommerce/ecommerce_product.php');
		require_once('models/ecommerce/ecommerce_product_variety.php');
		require_once('models/ecommerce/ecommerce_price.php');
	
		$Product = new ecommerce_product();
		$Product_variety = new ecommerce_product_variety();
		$Price = new ecommerce_price();
	
		$this->tpl->assign("VARIETY_CONF", $Product_variety->conf);
	
		if ($Price->conf['backoffice_with_vat']) $this->tpl->assign('VAT_NOTE', I18N_PRICE_INC_VAT);
		else $this->tpl->assign('VAT_NOTE', I18N_PRICE_EX_VAT);
		
		if ($_POST['save']) {

			$product_data = $_POST['product'];
		 	
			/**
			 * add product
			 */
			 
			if($product_id = $Product->insertFullProduct($product_data)) {
				msg("Product id=$product_id interted.");
				
				//TODO: implement two options: 1. save end this, 2. save and add another
				onxshopGoTo("backoffice/products/{$product_id}/edit");
				//empty
				$product_data = array();
			} else {
				msg("Product add has failed.", 'error');
			}
		}
		
		$this->tpl->assign('PRODUCT', $product_data);

		return true;
	}
}
