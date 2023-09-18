<?php

defined('MT_CMS') or die('Lỗi: Truy Cập Hệ Thống');

	class THCMS_Controller
	{	
		/**
		 * [$connect description]
		 * @var [type]
		 */
		public static $connect;
		/**
		 * [$connect description]
		 * @var [type]
		 */
		//public static $connect_xenforo;
		/**
		 * [$system_set description]
		 * @var [type]
		 */
		public static $system_set;
		/**
		 * [$user_id description]
		 * @var boolean
		 */
		public static $user_id = false;
		/**
		 * [$user_data description]
		 * @var array
		 */
		public static $user_data = array();
		/**
		 * [__construct description]
		 */
		function __construct()
	    {
	    		/**
	    		 * session_start
	    		 */
	    		$this->session_start();
	    		/**
	    		 * Database_Connection
	    		 */
	    		$this->Database_Connection(); 
	    		/**
	    		 * Database_Connection_Xenforo
	    		 */
	    		//$this->Database_Connection_Xenforo();  
	    		/**
	    		 * system_settings;
	    		 */
	    		$this->system_settings();
	    		/**
	    		 * authorize
	    		 */
	    		$this->authorize(); 
	    }
			/**
			 * [Database_Connection description]
			 * @return [type] [description]
			 */
			private function Database_Connection()
		    {
		        require(ROOTPATH . '/config.php');
		        $connect = mysqli_connect($db['host'], $db['user'],$db['pass'], $db['name'])or die ('Không thể kết nối tới database');
		        mysqli_set_charset($connect, "UTF8");
		        self::$connect = $connect;
		        return $connect;
		    }
		    /**
			 * [Database_Connection_Xenforo description]
			 * @return [type] [description]
			 */
			/*private function Database_Connection_Xenforo()
		    {
		        require(ROOTPATH . '/config.php');
		        $connect_xenforo = mysqli_connect($db['host_xenforo'], $db['user_xenforo'],$db['pass_xenforo'], $db['name_xenforo']) or die ('Không thể kết nối tới database Forum Xenforo');
		        mysqli_set_charset($connect_xenforo, "UTF8");
		        self::$connect_xenforo = $connect_xenforo;
		        return $connect_xenforo;
		    }*/
		   /**
		    * [session_start description]
		    * @return [type] [description]
		    */
		    private function session_start()
		    {
		        session_name('SESID');
		        session_start();
		    }
		     private function system_settings()
		    {
		        $set = array();
		        $req = mysqli_query(self::$connect,"SELECT * FROM `mt_cms_system`");
		        while (($res = mysqli_fetch_row($req))) 
		        	$set[$res[0]] = $res[1];
		        
		        self::$system_set = $set;
		    }
		    private function authorize()
			{
		        $user_id = false;
		        $user_ps = false;
		        if (isset($_SESSION['gta-id']) && isset($_SESSION['gta-ps'])) {
		            // ID Accounts sẽ chuyển từ thường tới base64 còn Key thì không cần
		            $user_id = abs(intval($_SESSION['gta-id']));
		            $user_ps = $_SESSION['gta-ps'];
		        } elseif (isset($_COOKIE['cuid']) && isset($_COOKIE['cups'])) {
		            // ID Accounts sẽ chuyển từ thường sang base64 còn Key thì không cần
		            $user_id = abs(intval(base64_decode(trim($_COOKIE['cuid']))));
		            $_SESSION['gta-id'] = $user_id;
		            $user_ps = base64_decode(trim($_COOKIE['cups']));
		            $_SESSION['gta-ps'] = $user_ps;
		        }
		        if ($user_id && $user_ps) {
		            $req = mysqli_query(self::$connect,"SELECT * FROM `accounts` WHERE `id` = '$user_id'");
		            if (mysqli_num_rows($req)) {
		                $user_data = mysqli_fetch_assoc($req);
		                if ($user_ps === $user_data['Key']) {
		                    // Lấy thông tin từ accounts
		                    self::$user_id =  true;
		                    self::$user_data = $user_data;
		                   
		                } else {
		                    // khi sai pass se unset accounts
		                    
		                    $this->user_unset();
		                }
		            } else {
		                // khi username ko tồn tại
		                $this->user_unset();
		            }
		        } else {
		            // khi so sanh id va pass sai
		            $this->user_unset();
		        }
			}
					private function user_unset()
		    {
		        self::$user_id = false;
		        unset($_SESSION['gta-id']);
		        unset($_SESSION['gta-ps']);
		        setcookie('cuid', '');
		        setcookie('cups', '');
		    }	


	}