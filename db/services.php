<?php
$functions = array(
    'local_addpage_add_page_module' => array(
        'classname'   => 'local_addpage_external',
        'methodname'  => 'add_page_module',
        'classpath'   => 'local/addpage/externallib.php',
        'description' => 'Adds a page module to a course',
        'type'        => 'write',
        'capabilities' => 'moodle/course:manageactivities',
    ),
);