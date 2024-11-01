=== Xtreme 3D Carousel ===
Contributors: Flashtuning 
Tags: free carousel, free flash, autoplay, effects, 3d, buttons, scroll, scroller, tooltip, mirror, menu, navigation, rotate
Requires at least: 2.9.0
Tested up to: 3.0.1
Stable tag: trunk

The most advanced XML 3D Carousel application. No Flash Knowledge required to insert the 3D Carousel SWF inside the HTML page(s) of your site.

== Description ==

3D Carousel Image Menu XML / 3D Carousel Scroller Photo Menu & XML Carousel Buttons Menu. 

**Features**

* Fully customizable XML driven content
* Unlimited number of images ( JPG, PNG, BMP, GIF ) and SWF support
* Customizable width, height, position and rotation angle
* Easy to use XML file for images / tooltips / titles / descriptions and links
* The carousel menu can be configured to support either image scrolling or sliding modes
* You can use images at fixed or custom size (images having variable width / height)
* Optional you can show / hide two navigation buttons and adjust each button position
* Center logo image support and all rotation menu behaviour orientation
* Dynamic image reflection with transparency, distance and direction settings
* Image ToolTips with automatic text wrapping, font embedding, background and border color / size support
* HTML / CSS driven ToolTips description text and ToolTips position, offset support
* Items alignment and rollover mouse movement speed options
* Set URL links when pressing on individual images
* Display the items in the order they appear in your XML file or in a random order
* Optional image highlighting feature for the active / inactive items
* Define image borders size/color from within the XML configuration file
* Image tooltips, rotation radius, mouse roll over blur effect and click support
* Optionally set the XML settings file path in HTML using FlashVars
  

== Installation ==

1. Download the plugin and upload it to the **/wp-content/plugins/** directory. Activate through the 'Plugins' menu in WordPress.
2. Download the [Free Xtreme3DCarousel](http://www.flashtuning.net/flash-samples/Xtreme3DCarouselFree.zip "Xtreme 3D Carousel") and copy the content of the archive in **wp-content** folder. (e.g: "http://www.yoursite.com/wp-content/flashtuning/xtreme-3d-carousel")
3. Insert the swf into post or page using this tag: `[xtreme-carousel]`. The default values for width and height are 600 400. If you want other values write the width and height attributes into the tag like so: `[xtreme-carousel width="yourvalue" height="yourvalue"]`
4. To configure the 3D carousel general parameters use the carousel-settings.xml. For individual carousel items use the carousel-contents.xml file (image path, image link and more). Enter [Flashtuning.net](http://www.flashtuning.net "Flashtuning") and play with the settings of the [Xtreme 3D Carousel](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-carousel-menu-xml.html "Sample Xtreme 3D Carousel") online demo.
5. If you want to use multiple instances of Xtreme 3D Carousel on different pages. Follow this steps:
   a. There are 2 xml files in **wp-content/flashtuning/xtreme-3d-carousel** folder: **carousel-settings.xml**, used for general settings, and **carousel-content.xml**, used for individual items.
   b. Modify the 2 xml files according to your needs and rename them (eg.: **carousel-settings2.xml**, **carousel-content2.xml**)
   c. Open the **carousel-settings2.xml**, search for this tag `< object param="contentXML"	value="carousel-content.xml" />` and change the attribute **value** to **carousel-content2.xml** .
   d. Copy the 2 modified xml files to **wp-content/flashtuning/xtreme-3d-carousel** .
   e. Use the **xml** attribute `[xtreme-carousel xml="carousel-settings2.xml"]` when you insert the carousel on a page.
6. Optionally for custom pages use this php function: `xtremeCarouselEcho(width,height,xmlFile)` (e.g: **xtremeCarouselEcho(595,420,'carousel-settings.xml')** )

= Remove the Flashtuning.net logo =

If you don’t want to have the Flashtuning.net logo on the top left corner, you'll have to purchase the [commercial package](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-carousel-menu-xml.html "FT Xtreme 3D Carousel"). You'll also have access to the fla file. After downloading the commercial archive, overwrite the swf file from the `/wp-content/flashtuning/xtreme-3d-carousel` directory.

== Screenshots ==

1. Fully customizable XML driven content (see the online demo at [Flashtuning.net](http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-carousel-menu-xml.html "Sample Xtreme 3D Carousel") ). No Flash Knowledge required to insert the 3D Carousel SWF inside the HTML page(s) of your site.

