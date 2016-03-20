<?php
/**
 * Created by PhpStorm.
 * User: mc12345678
 * Date: 3/20/16
 * Time: 5:09 PM
 */
class zcObserverOptionNameTypeSelect extends base {
    function __construct(){
        $attachNotifier = array();

        $attachNotifier[] = 'NOTIFY_ATTRIBUTES_MODULE_START_OPTION';

        $this->attach($this, $attachNotifier);
    }

    // This function is called to ensure that when the missing data is needed below that it is available.
    function updateNotifyAttributesModuleStartOption(&$callingClass, $notifier){
        global $db;

        if (!defined('PRODUCTS_OPTIONS_TYPE_SELECT')) {
            $db->Execute("INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Product option type Select', 'PRODUCTS_OPTIONS_TYPE_SELECT', '0', 'The number representing the Select type of product option.', 6, NULL, now(), now(), NULL, NULL);");
            define('PRODUCTS_OPTIONS_TYPE_SELECT', '0');
        }
        if (!defined('UPLOAD_PREFIX')) {
            $db->Execute("INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Upload prefix', 'UPLOAD_PREFIX', 'upload_', 'Prefix used to differentiate between upload options and other options', 6, NULL, now(), now(), NULL, NULL);");
            define('UPLOAD_PREFIX', 'upload_');
        }
        if (!defined('TEXT_PREFIX')) {
            $db->Execute("INSERT INTO configuration (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Text prefix', 'TEXT_PREFIX', 'txt_', 'Prefix used to differentiate between text option values and other option values', 6, NULL, now(), now(), NULL, NULL);");
            define('TEXT_PREFIX', 'txt_');
        }
        // @unlink(__FILE__); // To delete this file after execution delete the first 2 characters of this line.
    }
}