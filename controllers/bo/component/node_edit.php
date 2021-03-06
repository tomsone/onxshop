<?php
/**
 * Copyright (c) 2008-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 * 
 */

class Onxshop_Controller_Bo_Component_Node_Edit extends Onxshop_Controller {
	
	/**
	 * main action
	 */
	 
	public function mainAction() {
	
		if (is_numeric($this->GET['id'])) $node_id = $this->GET['id'];
		else {
			msg('node_edit: node_id is not numeric', 'error');
			return false;
		}
	
		require_once('models/common/common_node.php');
		
		$Node = new common_node();
		$node_data = $Node->detail($node_id);
		$this->tpl->assign("NODE", $node_data);
		
		/* in backoffice we use getActiveNodes instead of getActivePages function */
		$_SESSION['active_pages'] = $Node->getActiveNodes($node_id);
		$_SESSION['full_path'] = $Node->getFullPath($node_id);
		
		if ($_POST['node']['node_controller'] != '') $node_controller = $_POST['node']['node_controller'];
		else $node_controller = $node_data['node_controller'];
		
		$controller = "bo/node/{$node_data['node_group']}/{$node_controller}";
		
		if (getTemplateDir($controller . ".html") == '') {
			$controller_html = "bo/node/{$node_data['node_group']}/default";
		} else {
			$controller_html = $controller;
		}
		
		if (!file_exists(ONXSHOP_DIR . "controllers/{$controller}.php")) {
			$controller_php = "bo/node/{$node_data['node_group']}/default";
		} else {
			$controller_php = $controller;
		}
		
		
		$_nSite = new nSite("{$controller_php}@{$controller_html}&id={$node_id}&orig={$this->GET['orig']}&popup={$this->GET['popup']}", $this);
				
		$this->setContent($_nSite->getContent());
		$this->tpl->assign("SUB_CONTENT", $this->content);

		if ($this->GET['ajax'] == 0) $this->tpl->parse('content.form');
		
		return true;
	}
	
}

