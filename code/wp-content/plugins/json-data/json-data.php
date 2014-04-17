<?php
/*
Plugin Name: JSON data
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Allows for the management and proper display of JSON data feeds in your WP website
Version: 1.0.0
Author: Kominski
Author URI: http://kominski.net
License: GPL2
*/
/*  Copyright 2013  Kominski  (email : info@kominski.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('JsonData_Plugin_Slug', 'JsonData');
define('JsonData_Plugin_Dir', dirname(__FILE__));
define('JsonData_Plugin_Url', plugins_url('', __FILE__));
define('JsonData_Plugin_File', __FILE__);
define('JsonData_Plugin_DirFile', basename(dirname(__FILE__)) . '/' . basename(__FILE__));

require_once 'autoloader.php';
JsonData\Controller::getInstance()->initialise();