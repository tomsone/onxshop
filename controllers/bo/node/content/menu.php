<?php
/**
 * Copyright (c) 2006-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 */

require_once('controllers/bo/node/default.php');

class Onxshop_Controller_Bo_Node_Content_Menu extends Onxshop_Controller_Bo_Node_Default {

	/**
	 * pre action
	 */

	function pre() {
		if ($_POST['node']['component']['display_title'] == 'on') $_POST['node']['component']['display_title'] = 1;
		else $_POST['node']['component']['display_title'] = 0;
		if ($_POST['node']['component']['display_teaser'] == 'on') $_POST['node']['component']['display_teaser'] = 1;
		else $_POST['node']['component']['display_teaser'] = 0;
		if ($_POST['node']['component']['display_all'] == 'on') $_POST['node']['component']['display_all'] = 1;
		else $_POST['node']['component']['display_all'] = 0;
	}
	
	/**
	 * post action
	 */

	function post() {
		$this->node_data['component']['display_title']        = ($this->node_data['component']['display_title']) ? 'checked="checked"'      : '';
		$this->node_data['component']['display_teaser']        = ($this->node_data['component']['display_teaser']) ? 'checked="checked"'      : '';
		$this->node_data['component']['display_all']        = ($this->node_data['component']['display_all']) ? 'checked="checked"'      : '';
		$this->tpl->assign("SELECTED_{$this->node_data['component']['template']}", "selected='selected'");
	}
}
