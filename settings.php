<?php

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) { // needs this condition or there is error on login page
    $settings = new admin_settingpage('local_qsection', 'Qsection');
    $ADMIN->add('localplugins', $settings);

    $name = 'local_qsection/commentplaceholder';
    $title = get_string('commentplaceholder', 'local_qsection');
    $description = get_string('commentplaceholder_desc', 'local_qsection');
    $default = '';

    $settings->add(new admin_setting_configtext($name, $title, $description, $default, PARAM_ALPHANUM));
}
