# Sassy Roots

Roots is my Wordpress base theme of choice, but I've made several changes to reflect my personal workflow and preferences.

## Features
* Bootstrap Less has been converted to Sass
* Bootstrap Glyphicons replaced with [Font Awesome](http://fortawesome.github.io/Font-Awesome/)
* Utilizes Compass
* Optimized for use with CSS and JS preprocessors (i.e., CodeKit)

## Documentation
**CSS**
* Styles for screen compiled at `/sass/screen.scss` and output to `/css/screen.css`
* Styles for print compiled at `/sass/print.scss` and output to `/css/print.css`
* Roots Editor Styles also editable at `/sass/editor-styles.scss`

**Javascript**
* Two files called:
	1. `/js/plugins-min.js`
	2. `/js/main-min.js`
* `plugins.js` includes Bootstrap scripts, as well as any additional plugins
* `main.js` should include your custom jQuery/Javascript
* Setup your preprocessor to output these files with `-min.js` appended
* These filenames can be modified at `lib/scripts.php`

## Installation
* Clone repo: `git clone git://github.com/jaredhughes/sassy-roots.git`
* Reference the [theme activation](/retlehs/roots/blob/master/doc/activation.md) documentation to understand everything that happens once you activate Roots

## Planned Features
* Add theme options for javascript source file names
* Strip Bootstrap design elements
* Add basic print stylesheet

## [Roots Theme](http://www.rootstheme.com/)

Original project information:

* Source: [https://github.com/retlehs/roots](https://github.com/retlehs/roots)
* Documentation: [/retlehs/roots/blob/master/doc/TOC.md](/retlehs/roots/blob/master/doc/TOC.md)
* Web: [http://www.rootstheme.com/](http://www.rootstheme.com/)