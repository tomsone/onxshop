<?php
/** 
 * Copyright (c) 2009-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 * 
 * TODO: check if $node_conf['id_map-payment_worldpay_callback'] is coming from the WorldPay server
 */

require_once('controllers/component/ecommerce/payment/worldpay.php');

class Onxshop_Controller_Component_Ecommerce_Payment_Worldpay_Callback extends Onxshop_Controller_Component_Ecommerce_Payment_Worldpay {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		if (is_numeric($this->GET['order_id']) && (count($_POST) > 0)) {
			require_once('conf/payment/worldpay.php');
			$this->transactionPrepare();
			
			// we need this to allow get order detail with WorldPay
			// we should check Worlpay IP address here
			$_SESSION['authentication']['logon'] = 1;
			$transaction_id = $this->paymentProcess($this->GET['order_id'], $_POST);
			$_SESSION['authentication']['logon'] = 0;
		}

		return true;
		
	}
}
