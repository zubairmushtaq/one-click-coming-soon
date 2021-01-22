<div class="wrap">

  <h2><?php echo esc_html(__( 'One Click Coming Soon', 'one-click-coming-soon' )); ?></h2>
<div id="poststuff" class="metabox-holder has-right-sidebar">
        <div class="inner-sidebar">
            <div id="side-sortables" class="meta-box-sortables ui-sortable">
                <!-- BOXES -->
                <div class="postbox">
    				<h3 class="stt-title"><?php echo esc_html(__( 'How to use?', 'one-click-coming-soon' )); ?> </h3>
    				<div class="inside">
    				<p><?php echo esc_html(__( 'Just enable the option to activate the Coming Soon Page.', 'one-click-coming-soon' )); ?> </p>
    				</div>
    			</div>
    
            </div>
        </div> 

    <div id="post-body">
        <div id="post-body-content">
            <div id="titlediv"></div>
            <div id="postdivrich" class="postarea"></div>
            <div id="normal-sortables" class="meta-box-sortables ui-sortable">
                <!-- BOXES -->
                <div class="postbox">
					<h3 class="stt-title"><?php echo esc_html( __('Settings', 'one-click-coming-soon')); ?></h3>				
					<div class="inside">

<form method="post" id="one_click_coming_soon_form" action="options.php">
  <?php settings_fields( 'One_Click_Coming_Soon_Setting-group' );
  
		// get all options
		$enable_coming_soon  		= get_option( 'enable_coming', 'Go to Top' );

?>
  <table class="form-table tz-form-table">
    <tr>
      <th><?php echo esc_html( __('Enable Coming Soon?', 'one-click-coming-soon')); ?></th>
      <td>
        <input type="checkbox" class="one_click_coming_soon"  name="enable_coming" value="yes" <?php checked('yes', $enable_coming_soon); ?> />
      </td>
    </tr>
  </table>
</form>

					</div>
				</div>
            </div>
 
        </div>
    </div>
    <br class="clear">
</div>

</div>

