<?php 
/**
*@package webplugin
*/
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminShortcode()
	{
		return require_once( "$this->plugin_path/templates/shortcode.php" );
	}


	public function textOptionsGroup( $input )
	{
		return $input;
	}

	public function testAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function testTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
	}

	public function testFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}