<?php

/**
 * Local Add Page Module to Course Content Plugin
 * 
 * @package    local_addpage
 * @author     UMAMI E-Learning Solutions
 * @email      hatem.askar@umami-learning.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 
defined('MOODLE_INTERNAL') || die();
require_once(dirname(__FILE__) . '/locallib.php');

require_once($CFG->libdir . "/externallib.php");

class local_addpage_external extends external_api {
    public static function add_page_module_parameters() {
        return new external_function_parameters(
            array(
                'courseid'  => new external_value(PARAM_INT, 'Course ID'),
                'sectionid' => new external_value(PARAM_INT, 'Section ID'),
                'title'     => new external_value(PARAM_TEXT, 'Page title'),
                'content'   => new external_value(PARAM_RAW, 'Page content')
            )
        );
    }
    
    public static function add_page_module($courseid, $sectionid, $title, $content) {
        $params = self::validate_parameters(self::add_page_module_parameters(),
                array('courseid' => $courseid, 'sectionid' => $sectionid, 'title' => $title, 'content' => $content));
    
        $result = local_addpage_add_page_module($params['courseid'], $params['sectionid'], $params['title'], $params['content']);
    
        return $result;
    }
    

    public static function add_page_module_returns() {
        return new external_single_structure(
            array(
                'status'  => new external_value(PARAM_TEXT, 'Status of the operation'),
                'message' => new external_value(PARAM_TEXT, 'Result message'),
            )
        );
    }
}