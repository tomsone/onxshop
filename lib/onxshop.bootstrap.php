<?php
/**
 * Copyright (c) 2005-2012 Laposa Ltd (http://laposa.co.uk)
 * Licensed under the New BSD License. See the file LICENSE.txt for details.
 *
 */

class Onxshop_Bootstrap {

	public $Onxshop;
	
	public $headers;
	
	public $output;
	
	/**
	 * constructor
	 *
	 * @return OnxshopBootstrap
	 */
	 
	function __construct() {
		
		/**
		 * Include default libraries
		 */
		 
		require_once('xtemplate.class.php');
		require_once('onxshop.controller.php');
		require_once('onxshop.model.php');
		require_once('onxshop.router.php');
		require_once('onxshop.authentication.php');
		require_once('Zend/Db.php');
		require_once('Zend/Registry.php');

		/**
		 * Initialise database connection object
		 */

		$this->initDatabase();
	
		/**
		 * Initialise session
		 */
		
		$this->initSession();
	
		//hack
		if ($_SESSION['authentication']['authenticity'] > 0) {
			// temporary ACL, database user is superuser
			if ($_SESSION['authentication']['username'] == ONXSHOP_DB_USER || $_SESSION['authentication']['username'] == ONXSHOP_DB_USER . '-editor') $_GET['fe_edit'] = 1;
			define('ONXSHOP_DB_QUERY_CACHE', false);
		} else {
			$_GET['fe_edit'] = 0;
			define('ONXSHOP_DB_QUERY_CACHE', true);
		}
		
		/**
		 * Initialise site configuration
		 */

		$GLOBALS['onxshop_conf'] = $this->initConfiguration();
		
		/**
		 * Initialise authentication object
		 */
		$GLOBALS['Auth'] = new Onxshop_Authentication();
		
		//hack
		if ($_GET['login'] == 1) {
		    $GLOBALS['Auth']->login();
		}
	
		//hack
		if ($_GET['logout'] == 1) {
		    if ($GLOBALS['Auth']->logout()) {
	    		header("Location: http://{$_SERVER['SERVER_NAME']}/");
		    	exit;
		    }
		}

		//hack
		if ($_GET['preview'] == 1) {
			$_SESSION['preview'] = 1;
		} else if ($_GET['exit_preview'] == 1) {
			$_SESSION['preview'] = 0;
		}
	
	}


	/**
	 * Initialise database connection
	 */
	 
	function initDatabase() {

		/**
		 * determine adapter name
		 */
		 
		switch (ONXSHOP_DB_TYPE) {
			case 'mysql':
				$adapter_name = 'Pdo_Mysql';
			break;
			case 'pgsql':
			default:
				$adapter_name = 'Pdo_Pgsql';
			break;
		}
		
		/**
		 * set connection options
		 */
		
		$connection_parameters =  array(
			'host'     => ONXSHOP_DB_HOST,
			'username' => ONXSHOP_DB_USER,
			'password' => ONXSHOP_DB_PASSWORD,
			'dbname'   => ONXSHOP_DB_NAME,
			'port'	   => ONXSHOP_DB_PORT,
			'charset'  => 'UTF8'
		);
	
		/**
		 * connect
		 */
		 
		try {
			$db = Zend_Db::factory($adapter_name, $connection_parameters);
			$db->getConnection();
		}  catch (Zend_Db_Adapter_Exception $e) {
			// perhaps a failed login credential, or perhaps the RDBMS is not running
		} catch (Zend_Exception $e) {
			// perhaps factory() failed to load the specified Adapter class
		}
		
		/**
		 * check connection
		 */
		 
		if (!$db->isConnected()) {
			header("HTTP/1.1 503 Service Unavailable");
			die('Our site is temporarily unavailable, please try again later.');
		}
		
		/**
		 * profiler
		 */
		 
		if (ONXSHOP_DB_PROFILER) {
			$db->getProfiler()->setEnabled(true);
		}
		
		/**
		 * store in registry
		 */
		 
		Zend_Registry::set('onxshop_db', $db);
	}

	/**
	 * Initialise configuration from database
	 */
	 
	function initConfiguration() {
	
		$conf = array();

		require_once ('models/common/common_configuration.php');
		$Configuration = new common_configuration();
		
		$conf = $Configuration->getConfiguration();
		
		return $conf;
	}

	/**
	 * Initialise session
	 */
	 
	function initSession() {
	
		switch (ONXSHOP_SESSION_TYPE) {
			case 'file':
				ini_set('session.save_path', ONXSHOP_PROJECT_DIR . 'var/sessions');
			break;
	
			case 'database':
			default:
				require_once ('models/common/common_session.php');
	
				$Session = new common_session();
				$Session->setCacheable(false);
				$result = session_set_save_handler(array(&$Session, 'open'), array(&$Session, 'close'), array(&$Session, 'read'), array(&$Session, 'write'), array(&$Session, 'destroy'), array(&$Session, 'gc'));
				if (!$result) die("Can't init session!");
			break;
		}

		//session_set_cookie_params(31536000);// = 3600 * 24 * 365
		session_start();
		//to be sure sessions are written before exit
		register_shutdown_function('session_write_close');
		//in PHP5.4 can be used this:
		//session_register_shutdown();
		
		if (!array_key_exists('authentication', $_SESSION)) $_SESSION['authentication'] = array();
		if (!array_key_exists('authenticity', $_SESSION['authentication'])) $_SESSION['authentication']['authenticity'] = 0;
		
		if (!array_key_exists('active_pages', $_SESSION)) $_SESSION['active_pages'] = array();
		if (!array_key_exists('full_path', $_SESSION)) $_SESSION['full_path'] = array();
		if (array_key_exists('HTTPS', $_SERVER)) $protocol = 'https';
		else $protocol = 'http';

		$_SESSION['uri'] = "$protocol://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$_SESSION['last_item'] = $_SESSION['history'][count($_SESSION['history'])-1]['uri'];
		$_SESSION['orig'] = $_SERVER['REQUEST_URI'];
		
		//disable page cache for whole session after a user interaction and for backoffice users
		if (count($_POST) > 0 || $_SESSION['authentication']['authenticity'] > 0) $_SESSION['use_page_cache'] = false;
		else if (!isset($_SESSION['use_page_cache'])) $_SESSION['use_page_cache'] = ONXSHOP_PAGE_CACHE_TTL;
		
		/**
		 * FIXME HACK
		 * disable page cache also when sorting and mode is submitted
		 * component/ecommerce/product_list_sorting
		 */
		 
		if (is_array($_GET['sort']) || $_GET['product_list_mode']) $_SESSION['use_page_cache'] = false;

		// in the session history we store only new URIs and not the AJAX request (begin with /request/)
		// and don't store a popup
		if ($_SESSION['last_item'] != $_SESSION['uri'] && !preg_match('/^\/(request)*(popup)*(popupimage)*(ajax)*\//', $_SERVER['REQUEST_URI'])) {
			$_SESSION['history'][] = array('time'=>time(), 'uri'=>$_SESSION['uri']);
		}

		$_SESSION['last_diff'] = $_SESSION['last_item'];

		//print_r($_SESSION); exit;
	}


	/**
	 * User authentication
	 */
	
	function processAuthentication($request) {
	
		if (!$_SERVER['HTTPS'] && ONXSHOP_EDITOR_USE_SSL) {
			header("Location: https://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}");exit;
		}
		
		if ($_SESSION['authentication']['authenticity'] < 1 && $_GET['login'] != 1) {

			if ($GLOBALS['Auth']->login()) {
				msg('Successful Login to the backoffice', 'ok', 1);
				onxshopGoTo("$request", 1);
			} else {
				msg('Login to the backoffice failed', 'error', 1);
				return false;
			}
		} else if ($_SESSION['authentication']['authenticity'] < 1) {
			$GLOBALS['Auth']->login();
			return false;
		}
		
		return $request;
	}
	
	/**
	 * check is authentication is required
	 */
	 
	public function isRequiredAuthentication($request) {
	
		$auth_is_required = false;
		
		//force login when request is from bo/ folder
		if (preg_match('/bo\//', $request)) {
			
			$auth_is_required = true;
			
		}
		
		//force login when controller_request in uri_mapping is from bo/ folder
		if ($_GET['controller_request']) {
			
			if (preg_match('/bo\//', $_GET['controller_request'])) $auth_is_required = true;
			
		}
		
		//force login when specified
		if ($_GET['fe_edit'] == 1 || $_GET['login'] == 1 || (ONXSHOP_REQUIRE_AUTH && !ONXSHOP_IS_DEBUG_HOST)) {
		
			$auth_is_required = true;
			
		}
		
		return $auth_is_required;
		
	}

	/**
	 * Init pre action controllers
	 *
	 */
	 
	function initPreAction($requests = array()) {
	
		foreach ($requests as $request) {
			$this->processAction($request);
		}
	}
	
	/**
	 * Init Action
	 */
	
	function initAction($request = '') {
		
		/**
		 * User authentication required for certain actions
		 */
		
		if ($this->isRequiredAuthentication($request)) {
			if(!$this->processAuthentication($request)) {
				$request = 'sys/xhtml.sys/401';
			}
		}
		
		/**
		 * return cached version only if sessiong cache is enabled and GET is without nocache parameter
		 */
		 
		 
		if (is_numeric($_SESSION['use_page_cache']) && !$_GET['nocache']) $this->processActionCached($request);
		else $this->processAction($request);
		
	}
	
	/**
	 * Process Action
	 */
	
	function processAction($request) {
	
		$router = new Onxshop_Router();
		
		$this->Onxshop = $router->processAction($request);
		
		$this->headers = $this->getPublicHeaders();
		$this->output = $this->Onxshop->finalOutput();
		
	}
	
	/**
	 * page (snippet) output cache
	 */
	
	function processActionCached($request) {
		
		require_once 'Zend/Cache.php';
		
		$frontendOptions = array(
		'lifetime' => ONXSHOP_PAGE_CACHE_TTL,
		'automatic_serialization' => true
		);
		
		$backendOptions = array('cache_dir' => ONXSHOP_PROJECT_DIR . 'var/cache/');
		
		$cache = Zend_Cache::factory('Output', 'File', $frontendOptions, $backendOptions);
		
		$id = "GET_" . md5($request . serialize($_GET));
		
		if (!is_array($data = $cache->load($id))) {
		    // cache miss
			
		    $this->processAction($request);
		    
		    if ($this->Onxshop->http_status != 404 && $this->Onxshop->http_status != 401 && !Zend_Registry::isRegistered('controller_error')) {
		    	
		    	$data_to_cache = array();
		    	$data_to_cache['output_headers'] = $this->headers;
		    	$data_to_cache['output_body'] = $this->output;
		    	$cache->save($data_to_cache);
		    	
		    	//TODO update index now
		    	//$this->indexContent($_GET['translate'], $this->output);
		    }

		} else {
		
			$this->headers = $data['output_headers'];
			$this->output = $data['output_body'];
			$this->restoreHeaders();
		}
	}
	
	/**
	 * Index with Zend_Lucene
	 *
	 * @param unknown_type $uri
	 * @param unknown_type $htmlString
	 */
	 
	function indexContent($uri, $htmlString) {
	
		require_once('Zend/Search/Lucene.php');

		$index_location = ONXSHOP_PROJECT_DIR . 'var/index';
		
		if (is_dir($index_location)) {
			// Open existing index
			$index = Zend_Search_Lucene::open($index_location);
		} else {
			// Create index
			$index = Zend_Search_Lucene::create($index_location);
		}
		
		$doc = Zend_Search_Lucene_Document_Html::loadHTML($htmlString);
		$doc->addField(Zend_Search_Lucene_Field::Keyword('uri', $uri));
		
		$index->addDocument($doc);
		$index->commit();
	}
	
	/**
	 * restoreHeaders
	 * will resend original headers for cached pages
	 */
	 
	public function restoreHeaders() {
		
		if (is_array($this->headers)) {
		
			foreach ($this->headers as $header) {
				header($header);
			}
		}
	
	}
	
	/**
	 * getPublicHeaders
	 * store in cache only public headers, definitely not "Set-Cookie: PHPSESSID=2vom6fgga2lp0cg5d9gspqomv0; path=/" header!!!
	 */
	 
	public function getPublicHeaders() {
	
		$all_headers = headers_list();
		$public_headers = array();
		
		foreach ($all_headers as $item) {
		
			if (preg_match('/^Content-Type/', $item)) $public_headers[] = $item;
			
		}
		
		return $public_headers;
		
	}
	
	/**
	 * getOutput
	 */
	 
	public function getOutput() {
	
		$result = $this->output;

		//hack
		if ($Onxshop->http_status != '404') {
			if ($_SERVER['HTTP_REFERER'] != $_SESSION['uri'] && $_SERVER['HTTP_REFERER'] != '') {
				$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];
			}
		} else {
			array_pop($_SESSION['history']);
			$_SESSION['last_diff'] = $_SESSION['history'][count($_SESSION['history'])-1]['uri'];
		}

		return $result;
	}
	
	/**
	 * Final output content
	 */
	
	function finalOutput() {
	
		$result = $this->getOutput();
		session_write_close();
				
		return $result;
	}
	
}
