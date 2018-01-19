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
 *
 * @package    block_hidden_course
 * @copyright  2017 Benedikt Schneider <benedikt.schneider@hrz.tu-darmstadt.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/lib.php');
require_once($CFG->dirroot.'/course/format/lib.php');

class block_hidden_course extends block_base {

    /**
     * Initializes the block, called by the constructor
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_hidden_course');
    }

    /**
     * Amend the block instance after it is loaded
     */
    public function specialization() {
        $this->title = get_string('pluginname', 'block_hidden_course');
    }

    /**
     * Which page types this block may appear on
     * @return array
     */
    public function applicable_formats() {
        // At first, the block has to be visible for every moodle-site.
        return array('course-view-*' => true);
    }

    /**
     * Does the block have a global settings.
     *
     * @return bool
     */
    public function has_config() {
        return true;
    }

    /**
     * Populate this block's content object
     * @return stdClass block content info
     */
    public function get_content() {
        global $CFG;

        if (!is_null($this->content)) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->footer = '';
        $this->content->text   = '';

        if (empty($this->instance)) {
            return $this->content;
        }

        if ($this->page->course->visible == 0) {
            // Add message.
            $this->content->text = '<span style="color: #ff0000;">'.get_string('message', 'block_hidden_course').'</span>';

            // Add Link to course settings.
            $this->content->text = $this->content->text.
                '<a href='.$CFG->wwwroot.'/course/edit.php?id='.$this->page->course->id.'>'.get_string('editcoursesettings').'</a>';
        } else {
            // Empty content means that the block won't be displayed.
            $this->content->text = '';
        }

        return $this->content;
    }
}
