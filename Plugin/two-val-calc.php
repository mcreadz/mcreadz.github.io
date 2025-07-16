<?php
/*
* Plugin Name: 2 Value Calculator
* Plugin URI: https://plugin.com
* Description: Early Access
* Version: 1.0
* Author: Mcreadz
* Author URI: https://github.com/mcreadz
* License: GPLv2 or later
*/

defined( 'ABSPATH' ) or die( 'Access Denied!' );

define( 'MC_PATH', plugin_dir_path( __FILE__ ) );
define( 'MC_FILE', __FILE__ );

require_once MC_PATH . 'inc/initiate.php';

include_once MC_PATH . 'inc/class-form.php';

include_once MC_PATH . 'inc/class-table.php';

new Plugin_initiate();
