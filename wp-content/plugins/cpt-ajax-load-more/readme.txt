=== WordPress Ajax Load More and Infinite Scroll ===
Contributors: tushargohel,udaymoradiya
Tags: infinite Scroll, ajax load more, lazy, lazy load, ajax posts, Scroll, infinite scrolling, load more, scroll, infinite
Requires at least: 4.0
Tested up to: 5.8
Stable tag: 1.6.0
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Great way to load initial posts and load other posts by just click on load more button or infinite scrolling.

== Description ==

Custom post type Ajax load more is the flexible solutions for WordPress to load only some of the posts and another posts will be load with infinite scroll or load more and you can create beautiful blog listing quickly.

If you are looking for large number of posts listing in single page then Custom post type Ajax load more is the right choice.

### Key Features

&#9989; Custom post type Ajax load more is the using WordPress standard query with the many parameters like Post Type, Post Status, Category Taxonomies and more.
&#9989; Setup security level, you can select post type and post status that only allow to load.
&#9989; You can create own template to customized listing behavior and overwrite into your theme easily.
&#9989; Lightweight, Faster and powerful performance.
&#9989; 3 types of inbuilt template layouts.

### How to Use

Lightweight Custom post type Ajax load is very simple way to use, you just put short-code anywhere.

#### Shortcode:

    [cpt_ajax_load_more post_type="post" template="default" posts_per_page="6"]
	
#### PHP Code:

    <?php 
     $args = array(
      'id' => 'blog-list',
      'post_type' => 'post', 
      'post_staus' => 'publish',
      'template' => 'default'
     ); 
     echo cpt_alm_render($args); 
    ?>

### Extend Functionalities

Developer can extend the functionalities using WordPress standard hooks and filters

-  [Short code Parameters](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/shortcode-parameters/)
-  [Filters](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/filters/)
-  [Create Custom template](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/custom-templates/)
-  [JavaScript callback](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/javascript-callbacks/)

### Demos and Examples
-  [Simple List](https://plugins.blacktheme.net/cpt-ajax-load-more/examples/default-list/)
-  [Grid view](https://plugins.blacktheme.net/cpt-ajax-load-more/examples/grid-view/)
-  [Card View](https://plugins.blacktheme.net/cpt-ajax-load-more/examples/card-view/)
-  [Advance Card view](https://plugins.blacktheme.net/cpt-ajax-load-more/examples/card-view-2/)
-  [Infinite Scrolling](https://plugins.blacktheme.net/cpt-ajax-load-more/examples/infiinte-scroll/)

### Docs

You can find [docs](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/) and more details about Custom post type Ajax load more on [blacktheme.net](https://plugins.blacktheme.net/cpt-ajax-load-more/)

== Installation ==

Easiest way:
1. Upload the plugin files to the `/wp-content/plugins/plugin-name` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Plugin Name screen to configure the plugin

== Frequently Asked Questions ==

= How to add Ajax load more in my website? =
Put this shortcode [cpt_ajax_load_more] in your page content editor.

= Can I create my own custom template? =
Yes, Please read this [article](https://plugins.blacktheme.net/cpt-ajax-load-more/docs/custom-templates) to add custom template

= Can I restrict specific post type to allow? =
Yes, in the settings menu of the Custom post type Ajax load more plugin.

= Is the Ajax call secure? =
Yes, Custom post type Ajax load more uses the WordPress standard nonce to protect the URL to direct access and also admin user can set permission to allow custom post type and post status.

= How to override the system loop template file? =
Create new folder called “cpt-alm” in the current theme .
Copy template file from plugins (wp-content/plugins/cpt-ajax-load-more/templates) and put in the current theme.

== Screenshots ==

1. Ajax load more button screen grid view
2. Ajax load more button screen simple list
3. Infinite Scroll screen.
4. Ajax load more button screen advance grid view
5. General settings.

== Changelog ==

= 1.6.0 - July 28, 2021 =

- NEW - Added a new feature to disable nonce verify in ajax call.
- NEW - Added new feature to disable the default CSS.
- FIX - Multiple post type issue.
- FIX - Fixed wrapper and item class issue.
- FIX - Border issue in Safari of default layout.

= 1.5.1 - October 13, 2020 =

- FIX - Category parameters is not working.
- FIX - Multiple post types not working.
- FIX - Gutenberg page update issue.

= 1.5.0 - September 9, 2020 =

-  NEW - Added shortcode builder button for editor.
-  FIX - Fixed queryArguments filter not working after ajax load more.

= 1.0.0 =
initial version

== Upgrade Notice ==
none