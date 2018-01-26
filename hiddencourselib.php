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

 // Extending the checkbox to execute custom code.
class admin_setting_configcheckbox_hidden_course extends admin_setting_configcheckbox {
    public function write_setting($data) {
        global $DB, $CFG;

        if ((string)$data === $this->yes) {
            set_config('block_hidden_course_check', true);
            // Add the block to every course.
            $DB->insert_record('block_instances', array('blockname' => 'hidden_course', 'parentcontextid' => 1,
                                                        'showinsubcontexts' => 1, 'requiredbytheme' => 0,
                                                        'pagetypepattern' => 'course-view-*',
                                                        'defaultregion' => 'side-pre', 'defaultweight' => 0,
                                                        'timemodified' => time(), 'timecreated' =>time()));
        } else {
            set_config('block_hidden_course_check', false);
            // Delete the block from every course.
            $DB->delete_records('block_instances', array('blockname' => 'hidden_course', 'parentcontextid' => 1,
                                                        'showinsubcontexts' => 1, 'requiredbytheme' => 0,
                                                        'pagetypepattern' => 'course-view-*',
                                                        'defaultregion' => 'side-pre', 'defaultweight' => 0));
        }

        return (parent::write_setting($data));
    }
}
