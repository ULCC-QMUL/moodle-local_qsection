<?php
/**
 * Created by PhpStorm.
 * User: opitz
 * Date: 22/06/18
 * Time: 11:07
 */
// File: /local/qsection/index.php


require_once('../../config.php');
global $PAGE;
global $DB;

$PAGE->set_url('/local/qsection/view.php', array('id' => $cm->id));
$PAGE->set_title('Qsection');
$PAGE->set_heading('Qsection');
$PAGE->set_pagelayout('standard');

//======================================================================================================================
$PAGE->requires->js_call_amd('local_qsection/o2s_scripts','init', array());
echo $OUTPUT->header();

echo "Please chose '".get_string('menu_entry','local_qsection')."' from the 'Course administrator' menu to use this feature!";

echo $OUTPUT->footer();


