<?php 
/**
 * @version     $Id: status.php 050 2013-05-09 11:33:00Z Anton Wintergerst $
 * @package     Jinfinity Migrator for Joomla 1.5+
 * @copyright   Copyright (C) 2013 Jinfinity. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @website     www.jinfinity.com
 * @email       support@jinfinity.com
 */
 
// No direct access 
defined( '_JEXEC' ) or die( 'Restricted access' );

class JiMigratorControllerStatus extends JiMigratorController
{
    function __construct()
    {
        parent::__construct();
    }
    function status() {
        // Get the Application Object.
        $app = JFactory::getApplication();      
        // Set Page Header
        header('Content-Type: application/json;charset=UTF-8');
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Wed, 1 Jun 1998 00:00:00 GMT");
        // Get Data
        if(version_compare(JVERSION, '3.0.0', 'ge')) {
        	$model = JModelLegacy::getInstance('Status', 'JiMigratorModel');
		} else {
			$model = JModel::getInstance('Status', 'JiMigratorModel');
		}
        echo $model->getStatus();
        // Close the Application.
        $app->close();
    }
    function cleanup() {
        // Get the Application Object.
        $app = JFactory::getApplication();      
        // Set Page Header
        header('Content-Type: application/json;charset=UTF-8');
        // Run Cleanup
        if(version_compare(JVERSION, '3.0.0', 'ge')) {
        	$model = JModelLegacy::getInstance('Status', 'JiMigratorModel');
		} else {
			$model = JModel::getInstance('Status', 'JiMigratorModel');
		}
        $model->cleanup();
        
        echo 'Complete';
        // Close the Application.
        $app->close(); 
    }
}