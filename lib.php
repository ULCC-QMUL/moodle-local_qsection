<?php
/**
 * Created by PhpStorm.
 * User: opitz
 * Date: 10/08/18
 * Time: 10:37
 */
global $PAGE;
$PAGE->requires->js_call_amd('local_qsection/create_qsection','init', array());


/*
 * Does currently nothing much...
 * @param $navigation stdClass navigation
 * @param $context stdClass context
 */
function local_qsection_extend_settings_navigation(settings_navigation $navigation, $context){
    global $DB,$PAGE;

    $course = $PAGE->course;

    if($context == null) {
        return;
    }
    if (!$PAGE->user_is_editing()){
        return;
    }
    if (!has_capability('moodle/course:update', $context)){
        return;
    }
    if($context->contextlevel != CONTEXT_COURSE) {
        return;
    }

    if(!$lti_type = $DB->get_record('lti_types', array('tooldomain' => 'echo360.org.uk'))) {
        return;
    }
    if($ltirecord = $DB->get_record('lti', array('course' => $course->id, 'typeid' => $lti_type->id))){
        return;
    }

    $menutext = get_string('menu_entry', 'local_qsection');
    $url = '/local/qsection/create_qsection.php?courseid='.$course->id;

    $coursenode = $navigation->get('courseadmin');
    if ($coursenode) {
        $coursenode->add($menutext, $url, navigation_node::TYPE_SETTING, 'qsection', 'qsection_creator', new pix_icon('i/up', ''));
    }
}
