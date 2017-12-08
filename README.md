![screenshot](https://user-images.githubusercontent.com/15816473/33555151-8ee5f1b4-d8ff-11e7-844f-26375a53a853.jpg)

Description
===================
This block is automatically shown in every moodle course set to invisble in the settings. It helps teachers figure out why their students can not see their course.

There already is a [plugin which did the same thing](https://moodle.org/plugins/block_hiddencourse) but it does not work anymore as it was developed for Moodle 2.0 and fiddled with the html_attributes which do not exist anymore.

Installation
===================
Unzip the archive in your "moodle/block"-folder
* Or clone with ```git clone https://github.com/eLearning-TUDarmstadt/moodle-block_hidden_course block/hidden_course```

Setup - Not required in the current plugin - it gets set automatically!
===================
Add the block to your Site home: your-moodle-site/?redirect=0 (Customise this page -> Add block)

Go to the block-settings and select "Any page" as display on page types

Go into a random course and into the block-setting

For display on page type select "Any type of course main page"
