<?php
/**
 * Copyright (c) 2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 */

require_once('controllers/bo/component/survey.php');

class Onxshop_Controller_Bo_Component_Survey_Add extends Onxshop_Controller_Bo_Component_Survey {

	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		$this->Survey = $this->initializeSurvey();
		
		/**
		 * Save on request
		 */
		 
		if ($_POST['save'] && is_array($_POST['survey'])) {
		
			$this->saveSurvey($_POST['survey']);
			
		}
		
		/**
		 * destroy
		 */
		 
		$this->Survey = false;
		
		return true;
	}
	
}

