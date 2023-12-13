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
function local_addpage_add_page_module($courseid, $sectionid, $title, $content) {
    global $DB, $CFG;
    require_once($CFG->dirroot . '/course/modlib.php');

    // Attempt to retrieve the course
    $course = $DB->get_record('course', array('id' => $courseid));

    // Prepare the response array
    $response = array(
        'courseName' => $course ? $course->fullname : 'Unknown Course'
    );

    // Check if the course was found
    if (!$course) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid course ID';
        return $response;
    }

    // Check if the section exists
    if (!$DB->record_exists('course_sections', array('section' => $sectionid, 'course' => $courseid))) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid section ID';
        return $response;
    }

    // Get the 'page' module type ID
    $module = $DB->get_record('modules', array('name' => 'page'));
    if (!$module) {
        $response['status'] = 'error';
        $response['message'] = 'Page module type not found';
        return $response;
    }

    // Prepare page module data
    $moduleinfo = new stdClass();
    $moduleinfo->modulename = 'page';
    $moduleinfo->module = $module->id; // Set the module ID
    $moduleinfo->course = $courseid;
    $moduleinfo->section = $sectionid;
    $moduleinfo->visible = 1;
    $moduleinfo->content = $content;
    $moduleinfo->name = $title;

    // Add the page module
    $coursemodule = add_moduleinfo($moduleinfo, $course);
    if (!$coursemodule) {
        $response['status'] = 'error';
        $response['message'] = 'Failed to add page module';
        return $response;
    }

    // Update the response for successful operation
    $response['status'] = 'success';
    $response['message'] = 'Page module added successfully';

    return $response;
}