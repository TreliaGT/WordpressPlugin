<?php

  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  //Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

  ?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">
    <!-- Print the page title -->
    <h1>test Plugin</h1>
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">
      <a href="?page=testing" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">Intro</a>
      <a href="?page=shortcodes" class="nav-tab <?php if($tab==='Shortcodes'):?>nav-tab-active<?php endif; ?>">Shortcodes</a>
      <a href="#" class="nav-tab <?php if($tab==='OtherSettings'):?>nav-tab-active<?php endif; ?>">Other Settings</a>
    </nav>
<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'test_options_group' );
			do_settings_sections( 'webplugin' );
			submit_button();
		?>
		
		<?php echo get_option( 'first_name' );?>
		
	</form>
   
    </div>
  </div>