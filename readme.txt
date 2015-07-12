=== Advanced Random Posts Widget ===
Contributors: satrya
Tags: random posts, thumbnail, widget, widgets, sidebar, excerpt, category, post tag, post type, taxonomy, shortcode, multiple widgets
Requires at least: 4.0
Tested up to: 4.3
Stable tag: 2.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides flexible and advanced random posts. Display it via shortcode or widget with thumbnails, post excerpt, and much more!

== Description ==

This plugin will enable a custom, flexible and advanced random posts. It allows you to display a list of random posts via shortcode or widget with thumbnail, excerpt and post date, also you can display it from all or specific or multiple taxonomy.

= Important! =
Before asking a support question:  

* Please see [FAQ](http://wordpress.org/plugins/advanced-random-posts-widget/faq/) page to read common questions.
* Please see [Other Notes](http://wordpress.org/plugins/advanced-random-posts-widget/other_notes/) to read how to use shortcode.

= Features Include =

* Allow you to set title url.
* Display thumbnails, with customizable size and alignment.
* Display excerpt, with customizable length.
* Display from all, specific or multiple category.
* Display from all, specific or multiple tag.
* Display from all, specific or multiple taxonomy.
* Display post date.
* Post types.
* Post status.
* Allow you to set custom css class per widget.
* Add custom html or text before and/or after random posts.
* Multiple widgets.

= Plugin Support =
* [Get the Image](http://wordpress.org/plugins/get-the-image/).
* [Page Builder by SiteOrigin](http://wordpress.org/plugins/siteorigin-panels/).

= Image Sizes Issue =

This plugin creates custom image sizes. If you use images that were uploaded to the media library before you installed this plugin, please install [Regenerate Thumbnails](https://wordpress.org/plugins/force-regenerate-thumbnails/) plugin to fix the image size.

= Language =
* English
* Bahasa Indonesia
* [Please contibute to submit your language](http://satrya.me/projects/advanced-random-posts-widget/)

= Support =

* Go to [forum support](http://wordpress.org/support/plugin/advanced-random-posts-widget).
* [Rate/Review the plugin](http://wordpress.org/support/view/plugin-reviews/advanced-random-posts-widget).
* Submit translation.

= Plugin Info =
* Developed by [Satrya](http://satrya.me/)
* Check out the [Github](https://github.com/satrya/advanced-random-posts-widget) repo to contribute.

= Posts Plugin Series =
* [Recent Posts Widget Extended](http://wordpress.org/plugins/recent-posts-widget-extended/)
* [Advanced Random Posts Widget](http://wordpress.org/plugins/advanced-random-posts-widget/)

== Installation ==

**Through Dashboard**

1. Log in to your WordPress admin panel and go to Plugins -> Add New
2. Type **advanced random posts widget** in the search box and click on search button.
3. Find **Advanced Random Posts Widget** plugin.
4. Then click on Install Now after that activate the plugin.
5. Go to the widgets page **Appearance -> Widgets**.
6. Find **Random Posts** widget.

**Installing Via FTP**

1. Download the plugin to your hardisk.
2. Unzip.
3. Upload the **advanced-random-posts-widget** folder into your plugins directory.
4. Log in to your WordPress admin panel and click the Plugins menu.
5. Then activate the plugin.
6. Go to the widgets page **Appearance -> Widgets**.
6. Find **Random Posts** widget.

== Frequently Asked Questions ==

= No image/thumbnail options? =
Your theme needs to support Post Thumbnail, please go to http://codex.wordpress.org/Post_Thumbnails to read more info and how to activate it in your theme.

= Thumbnail Size =
By default it uses **arpw-thumbnail** which have **50x50** size. If you want to use custom image size, you can install http://wordpress.org/plugins/simple-image-sizes/ then create new image size, it will appear in the **Thumbnail Size** selectbox in the widget option.

= Thumbnail Size Not Working Properly =
I have mentioned it in the plugin description. If you use images that were uploaded to the media library before you installed this plugin and/or you have your own custom image sizes, please install [Regenerate Thumbnails](https://wordpress.org/plugins/force-regenerate-thumbnails/) plugin to fix the image size.

= How to add custom style? =
The plugin comes with a very basic style, if you want to add custom style please do `wp_dequeue_style` to remove the default stylesheet. Place the code below in your theme `functions.php`.
`
function prefix_remove_arpw_style() {
	wp_dequeue_style( 'arpw-style' );
}
add_action( 'wp_enqueue_scripts', 'prefix_remove_arpw_style', 10 );
`
Then you can add your custom style using Custom CSS plugin or in your theme `style.css`. Here's the plugin selector
`
/* ul */
.arpw-ul {}

/* li */
.arpw-li {}

/* title */
.arpw-title {}

/* thumbnail */
.arpw-thumbnail {}

/* date */
.arpw-time {}

/* excerpt */
.arpw-summary {}
`

== Screenshots ==

1. The widget settings

== Shorcode Explanation ==

Explanation of shortcode options:

Basic shortcode
`
[arpw]
`

Display 10 random posts
`
[arpw limit="10"]
`

Display with thumbnail and set the size
`
[arpw thumbnail="true" thumbnail_size="thumbnail"]
`

**Here's the full default shortcode arguments**
`
title=""
title_url=""
offset=""
limit="5"
post_type="post"
post_status="publish"
ignore_sticky="1"
taxonomy=""
thumbnail="false"
thumbnail_size="arpw-thumbnail"
thumbnail_align="left"
excerpt="false"
excerpt_length="10"
date="false"
css_class=""
before=""
after=""
`

== Changelog ==

= 2.0.6 - 07/12/2015 =
* **Fix:** Deprecated function in WordPress 4.3

= 2.0.5 - 07/12/2015 =
* WordPress 4.3 support
* **Update:** Remove `ID` in the widget markup to prevent duplicate ID
* **Update:** Limit the number of `tags` and `categories` displayed in the widget

= 2.0.4 - 04/1/2015 =
* WordPress 4.1.1 support.
* **Add:** Add Custom CSS textarea.

= 2.0.3 - 4/01/2015 =
* WordPress 4.1 support.
* **Update:** Language.
* **Add:** Bahasa Indonesia translation.

= 2.0.2 - 12/03/2014 =
* **Fix:** Compatibility issue with `Get The Image` plugin/extension.
* **Fix:** Issue with `html or text before and after recent posts`, now it allow all HTML tags.

= 2.0.1 - 9/15/2014 =
* Bring back custom thumbnail size options!
* Bring back category and tag options!
* Added: Relative date option `eg: 5 days ago`.