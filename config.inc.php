<?php
/**
 * Typecho Blog Platform
 *
 * @copyright  Copyright (c) 2008 Typecho team (http://www.typecho.org)
 * @license    GNU General Public License 2.0
 * @version    $Id$
 */

define('__TYPECHO_ROOT_DIR__', dirname(__FILE__));

define('__TYPECHO_PLUGIN_DIR__', '/usr/plugins');

define('__TYPECHO_THEME_DIR__', '/usr/themes');

define('__TYPECHO_ADMIN_DIR__', '/admin/');

@set_include_path(get_include_path() . PATH_SEPARATOR .
__TYPECHO_ROOT_DIR__ . '/var' . PATH_SEPARATOR .
__TYPECHO_ROOT_DIR__ . __TYPECHO_PLUGIN_DIR__);

require_once 'Typecho/Common.php';

Typecho_Common::init();

$db = new Typecho_Db('Pgsql', 'typecho_');
$db->addServer(array (
  'host' => 'localhost',
  'user' => 'typecho',
  'password' => '555182',
  'charset' => 'utf8',
  'port' => '5432',
  'database' => 'typecho',
), Typecho_Db::READ | Typecho_Db::WRITE);
Typecho_Db::set($db);

define('__TYPECHO_DEBUG__', true);
