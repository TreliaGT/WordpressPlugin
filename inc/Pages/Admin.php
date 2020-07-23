<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Test Plugin', 
				'menu_title' => 'Test', 
				'capability' => 'manage_options', 
				'menu_slug' => 'testing', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'testing', 
				'page_title' => 'Shortcodes', 
				'menu_title' => 'Shortcodes', 
				'capability' => 'manage_options', 
				'menu_slug' => 'shortcodes', 
				'callback' => array( $this->callbacks, 'adminShortcode' )
			),
		
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'text_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'testoptionsGroup' )
			),
			array(
				'option_group' => 'test_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'test_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks, 'testAdminSection' ),
				'page' => 'webplugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array( $this->callbacks, 'testTextExample' ),
				'page' => 'webplugin',
				'section' => 'test_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'testFirstName' ),
				'page' => 'webplugin',
				'section' => 'test_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}
}