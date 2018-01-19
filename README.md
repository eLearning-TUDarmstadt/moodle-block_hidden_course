![screenshot](https://user-images.githubusercontent.com/15816473/33555151-8ee5f1b4-d8ff-11e7-844f-26375a53a853.jpg)

Description
===================
This block can be shown in every moodle course set to invisble. It helps teachers figure out why their students can not see their courses.
It is especially useful for the new boost theme as the course name is not greyed out anymore when set to not visible.

Installation
===================
Unzip the archive in your "moodle/block"-folder
* Or clone with ```git clone https://github.com/eLearning-TUDarmstadt/moodle-block_hidden_course blocks/hidden_course```

Activation
===================
After the plugin is installed, new Moodle displays its settings. If this is not shown, the block can be activated and deactivated in here:
https://YourMoodle.com/admin/settings.php?section=blocksettinghidden_course

![screenshot](https://user-images.githubusercontent.com/15816473/34302074-a12de6a4-e72f-11e7-806d-f6019ef78738.jpg)

Moodle-versions
===================
As of now, this plugin was only tested with Moodle version 3.3! Please report any bugs with other moodle versions

How it works
===================
The checkbox executes code (adding a Database-entry) after activating the checkbox which simply simulates the actions described in this moodle post by Tim Hunt:
https://moodle.org/mod/forum/discuss.php?d=170353#p747238

Similar Plugin
===================
There already exists a [plugin which did the same thing](https://moodle.org/plugins/block_hiddencourse) but it does not work anymore as it was developed for Moodle 2.0 and fiddled with the html_attributes which do not exist anymore.