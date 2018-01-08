<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
/**
 * This file replaces the legacy STATEMENTS section in db/install.xml,
 * lib.php/modulename_install() post installation hook and partially defaults.php
 *
 * @package    block_hidden_course
 * @copyright  2017 <benedikt-schneider@hrz.tu-darmstadt.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once('hiddencourselib.php');

if ($ADMIN->fulltree) {

    // Is stored in the table "mdl-config" with it's name and is accessible with $CFG->block_hidden_course_check
    // The class is taken from hiddencourselib.php
    $settings->add(new admin_setting_configcheckbox_hidden_course('block_hidden_course_check', get_string('settingname', 'block_hidden_course'),
                     get_string('settingdescription', 'block_hidden_course'), 0));
}
