<?php
/**
*@package WooCustom
*/

namespace Inc\Base;
class Deactivation
{
	public  static function deactivate() {
		flush_rewrite_rules();
	}
}
