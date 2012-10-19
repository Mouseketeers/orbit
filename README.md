# Orbit
Slideshow for SilverStripe CMS based on Zurb Foundation Orbit

## Maintainer Contact
* Henrik Olsen
  <Henrik (at) mouseketeers (dot) dk>

## Requirements
* Silverstripe 2.4
* DataObjectManager < http://silverstripe.org/dataobjectmanager-module/ >
* Uploadify < http://silverstripe.org/uploadify-module/ >
* Zurb Foundation framework < http://foundation.zurb.com/ >

## Installation

* Install DataObjectManager < http://silverstripe.org/dataobjectmanager-module/ > and Uploadify < http://silverstripe.org/uploadify-module/ >

* Include the foundation framework < http://http://foundation.zurb.com/ > in your project, including orbit.js

* Put the orbit folder inside your project

* To enable the slideshow on specific pages, for example your home page, add the following to your mysite/_config.php file: DataObject::add_extension('HomePage', 'Slideshow');

* To enable the orbit slideshow on all pages, add the following to your mysite/_config.php file: DataObject::add_extension('Page', 'Slideshow');

* Add <% include Slideshow %> to your templates

* Build the database (e.g. http://www.example.com/dev/build)


## Configuration and modification

* To modify the template HTML copy the Slideshow.ss file to your current theme and flush your projekt (e.g. www.example.com?flush=all)

* To configure the slideshow, copy the Slideshow.ss and slideshow.js files to your current theme, modify the path to your new javascript file in the Slideshow.ss and modify the configuration of the slideshow in your slideshow.js file. For configuration options see < http://foundation.zurb.com/docs/orbit.php >
