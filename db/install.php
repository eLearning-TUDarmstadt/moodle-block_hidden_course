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

/**
 * Post installation procedure
 *
 * @see upgrade_plugins_modules()
 */
function xmldb_block_hidden_course_install() {
	global $DB;

    // Form for asking to do so does not work yet.

    /*
    //moodleform is defined in formslib.php
    require_once("$CFG->libdir/formslib.php");

    class simplehtml_form extends moodleform {

        public function definition() {
            global $CFG;

            $mform = $this->_form; // Don't forget the underscore!

            // thirs param is label, fourth is text
            $mform->addElement('static', 'description', "Hier kommt das Label hin!",
                "Wenn Sie den Block auf jeder Kursseite angezeigt bekommen möchten, können Sie JA klicken");

            // Add Buttons
            $mform->addElement('button', 'intro', "HIER KOMMT DER OK-BUTTON HIN");
            $mform->addElement('button', 'intro', "HIER KOMMT DER NEIN-BUTTON HIN");

			//$this->content->text = $mform->render();
            //displays the form
            $mform->display();
            $mform->render();
        }
    }
    */

	$DB->insert_record('block_instances', array('blockname'=> 'hidden_course','parentcontextid' => 1, 'showinsubcontexts' => 1, 'requiredbytheme' => 0, 'pagetypepattern' => 'course-view-*', 'defaultregion' => 'side-pre', 'defaultweight' => 0), $returnid=true, $bulk=false);

}
