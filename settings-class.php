<?php
class One_Click_Coming_Soon_Setting
 {
    /**
     * Construct the plugin object
     */
    public function __construct() {
		
        // register actions
        add_action( 'admin_menu', array( &$this, 'add_in_menu' ) );
        add_action( 'admin_init', array( &$this, 'occs_register_settings' ) );
        add_action( 'admin_enqueue_scripts', array( &$this, 'occs_admin_enqueue_scripts' ) );
        add_action( 'get_header', array( &$this, 'one_click_coming_soon_display_page' ) );	

    } // END public function __construct
	
    /**
    * Create an options page for setting
    * 
    */
    public function add_in_menu() {
        add_options_page( 
            __( 'One Click Coming Soon', 'one-click-coming-soon' ), 
            __( 'One Click Coming Soon', 'one-click-coming-soon' ), 
            'manage_options', 
            'one_click_coming_soon', 
            array( &$this, 'one_click_coming_soon_settings_page' ) 
        );
    } // END public function add_in_menu

    /**
    * Register Settings
    */
    public function occs_register_settings() {

        register_setting( 'One_Click_Coming_Soon_Setting-group', 'enable_coming' );		
        
    } // END public function register_settings

    /**
    * Display a settings page
    */
    public function one_click_coming_soon_settings_page() {

        // Render the tools template
        include( dirname(__FILE__) . '/settings-form.php' );
        
    } // END public function settings_page

    
    public function occs_admin_enqueue_scripts(  ) {

		wp_enqueue_style('tz-admin-options-css',plugins_url('/css/occs-admin-styles.css', __FILE__ ), array(), null, 'all' );		

        wp_enqueue_script( 'wp-occs-admin-script', plugins_url( '/js/occs-admin-script.js', __FILE__ ), array( 'jquery' ), false, true ); 
    
    } // END public function occs_admin_enqueue_scripts
    
    
    public function one_click_coming_soon_display_page(){

	$check_status =   get_option('enable_coming');
	
	if( ($check_status == 'yes') && ( !current_user_can('edit_themes') || !is_user_logged_in()) ){

 ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="robots" content="noindex" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php echo get_bloginfo( 'name' ); ?> | Comming Soon</title>
<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
<style>
body,div,footer,html,img,p,sub{
		margin:0;
		padding:0;
		border:0;
		font-size:100%;
		font:inherit;
		vertical-align:baseline
	}
	footer{
		display:block
	}
	.clear{
		clear:both
	}
	img{
		max-width:100%
	}
	body{
		background-color: #000;
		font-family:Anton,sans-serif;
		font-weight:300
	}
	.wrap{
		width:80%;
		margin:0 auto
	}
	.content-grid{
		text-align:center
	}
	.content-grid p img{
		text-align:center;
		z-index:-9999;
		margin-top:-9em
	}
	.grid{
		text-align:center;
		margin-top:1em;
		padding: 4rem 0;
	}
	.footer p{
		font-family:'Titillium Web',sans-serif;
		display:block;
		font-size:1em;
		font-weight:100;
		line-height:1.8em;
		text-align:center;
		margin-top:1em;
		text-shadow:0 1px 0 rgba(255,250,250,.09)
	}
	.launching-soon{
		color:#d5ad6d;
		background:-webkit-linear-gradient(transparent,transparent),-webkit-linear-gradient(top,rgba(213,173,109,1) 0,rgba(213,173,109,1) 26%,rgba(226,186,120,1) 35%,rgba(163,126,67,1) 45%,rgba(145,112,59,1) 61%,rgba(213,173,109,1) 100%);
		background:-o-linear-gradient(transparent,transparent);
		-webkit-background-clip:text;
		-webkit-text-fill-color:transparent;
		font-size:80px
	}
	.launching-soon-sub{
		color:#d5ad6d;
		background:-webkit-linear-gradient(transparent,transparent),-webkit-linear-gradient(top,rgba(213,173,109,1) 0,rgba(213,173,109,1) 26%,rgba(226,186,120,1) 35%,rgba(163,126,67,1) 45%,rgba(145,112,59,1) 61%,rgba(213,173,109,1) 100%);
		background:-o-linear-gradient(transparent,transparent);
		-webkit-background-clip:text;
		-webkit-text-fill-color:transparent;
		font-size:50px
	}
	.text-style{
		color:#d5ad6d;
		background:-webkit-linear-gradient(transparent,transparent),-webkit-linear-gradient(top,rgba(213,173,109,1) 0,rgba(213,173,109,1) 26%,rgba(226,186,120,1) 35%,rgba(163,126,67,1) 45%,rgba(145,112,59,1) 61%,rgba(213,173,109,1) 100%);
		background:-o-linear-gradient(transparent,transparent);
		-webkit-background-clip:text;
		-webkit-text-fill-color:transparent;
		font-size:30px                    
		
	}
	@media only screen and (max-width:1366px) and (min-width:1280px){
		.wrap{
			width:95%
		}
	}
	@media only screen and (max-width:1280px) and (min-width:1024px){
		.wrap{
			width:95%
		}
	}
	@media only screen and (max-width:768px){
		.launching-soon-sub{
			font-size:30px
		}
		.launching-soon{
			font-size:40px
		}
	}
	@media only screen and (max-width:1024px) and (min-width:768px){
		.wrap{
			width:95%
		}
		.grid p{
			margin-top:1em
		}
		.content-grid p img{
			margin-top:-8em
		}
	}
	@media only screen and (max-width:768px) and (min-width:480px){
		.wrap{
			width:95%
		}
		.content-grid p{
			margin-top:3em
		}
		.grid p{
			margin-top:0
		}
		.grid p img{
			width:80%;
			margin-top:1em
		}
		.footer p{
			margin-bottom:1em
		}
	}
	@media only screen and (max-width:480px) and (min-width:320px){
		.wrap{
			width:95%
		}
		.content-grid p img{
			margin-top:-2.2em;
			width:300px;
			text-align:center
		}
		.content-grid{
			text-align:center;
			margin:0 auto
		}
		.grid{
			margin-top:0
		}
		.grid p{
			margin-top:0
		}
		.grid p img{
			width:283px;
			margin-top:.3em
		}
		.footer p{
			margin-bottom:1em;
			margin-top:.8em;
			font-size:.9em
		}
	}
	@media only screen and (max-width:320px) and (min-width:240px){
		.grid p img{
			width:100%;
			margin-top:0
		}
		.content-grid p{
			margin-top:1em
		}
		.grid p{
			margin-top:0
		}
		.footer p{
			margin-bottom:1em
		}
		.wrap{
			width:95%
		}
	}

</style>
</head>
<body>
<div class="content">
  <div class="wrap">
	<div class="grid">
	  <p class="launching-soon">Launching Soon!</p>
	  <p class="launching-soon-sub"><?php echo get_bloginfo( 'name' ); ?></p>
	  <p class="text-style"><?php echo get_bloginfo( 'description' ); ?></p>
	</div>
	<div class="clear"></div>
	<div class="footer text-style">
	  <p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
	</div>
	<div class="clear"></div>
  </div>
</div>
<div class="clear"></div>
<!-- One Click Coming Soon | WordPress Plugin by abulogics -->
</body>
</html>
<?php exit();
		}
    } // END public function one_click_coming_soon_display_page
} // END class One_Click_Coming_Soon_Setting