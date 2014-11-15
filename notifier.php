<?php
/**
 * Plugin Name:       Notifier
 * Plugin URI:        https://github.com/luancuba/notifier
 * Description:       Create a visual notification to your users
 * Version:           0.1.0
 * Author:            Luan Cuba
 * Author URI:        http://luancuba.com.br
 * Text Domain:       notifier
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /l10n
 * GitHub Plugin URI: https://github.com/luancuba/notifier
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ){
	die;
}

// Need to store this variable before leaving this file
define( '__NR_FILE__', __FILE__ );

define( 'NOTIFIER__VERSION', '0.1.0' );
define( 'NOTIFIER__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'NOTIFIER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once plugin_dir_path( __FILE__ ) . 'inc' . DIRECTORY_SEPARATOR . 'load.php';