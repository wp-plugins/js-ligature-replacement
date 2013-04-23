=== JS Ligature Replacement ===
Contributors: csixty4
Donate link: http://catguardians.org/
Tags: typography, ligatures
Requires at least: 3.0
Tested up to: 3.1.3
Stable tag: 1.0.1

Ligature replacement using Wyatt Allen's ligature.js library and provides an interface for applying to a specific set of CSS selectors.

== Description ==

**NOTE: This plugin has outlived its usefulness. You can use it if you need to support legacy browsers, but modern web sites should be using the `text-rendering: optimizeLegibility;` declaration in their CSS to encourage context-sensitive kerning and the use of ligatures.**

Wyatt Allen's [Ligature.js](http://code.google.com/p/ligature-js/) library is a tool for automatically inserting ligatures in content where appropriate. Ligatures are glyphs that combine two letter forms into one for stylistic and legibility reasons.

By default, this script replaces letter combinations which commonly have ligatures defined in web fonts:

* ffl
* ffi
* fl
* fi
* ff
* ij
* IJ

An "extended" mode is available, which replaces these additional combinations:

* ae
* AE
* oe
* OE
* ue
* st

The configuration screen lets you pick which text on your site gets ligatures using CSS selectors, and has a checkbox for enabling the "extended" ligatures. Use this plugin to enhance readability in headlines and flavor text on your site.

== Installation ==

1. Upload this plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Find the "Ligatures" configuration option in the WordPress admin interface to configure.

== Frequently Asked Questions ==

= Instead of ligatures, I'm seeing weird characters or a box =

You're using a font which doesn't have ligature characters, or at least doesn't define the ones this script uses. You may be better off with the [ligatures-js](http://wordpress.org/extend/plugins/ligatures-js/) plugin which is limited to a set of four ligatures which render consistently in most fonts.

== Screenshots ==

== Changelog ==

= 1.0.1 =
* Bugfix: Was loading wrong options


= 1.0 =
* Initial release
