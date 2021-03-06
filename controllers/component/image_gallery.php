<?php
/** 
 * Copyright (c) 2007-2011 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 * 
 */

require_once('controllers/component/image.php');

class Onxshop_Controller_Component_Image_Gallery extends Onxshop_Controller_Component_Image {

	/**
	 * main action
	 */
	 
	public function mainAction() {
		
		/**
		 * check requested thumbnail width
		 */
		 
		if (is_numeric($this->GET['thumbnail_width'])) $thumbnail_width = $this->GET['thumbnail_width'];
		else $thumbnail_width = 50;
		
		/**
		 * check thumbnail constrain and set appropriate height
		 */
		 
		switch ($this->GET['thumbnail_constrain']) {
			
			case '1-1':
			default:
				$thumbnail_size = "{$thumbnail_width}x{$thumbnail_width}";
			break;
			
			case '0':
				$thumbnail_size = "{$thumbnail_width}";
			break;
		}
		
				
		$image_list = $this->mainImageAction();
		
		/**
		 * display thumbnails only if there is more than one item
		 */
		 
		if (count($image_list) > 1) {
		
			foreach ($image_list as $item) {
		
				$item['thumbnail_size'] = $thumbnail_size;
				$this->tpl->assign('ITEM', $item);
				$this->tpl->parse('content.thumbnails.item');
		
			}
		
			$this->tpl->parse('content.thumbnails');
		
		}

		return true;
	}
	
}	

