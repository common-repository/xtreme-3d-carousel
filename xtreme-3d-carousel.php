<?php
/*
Plugin Name: Xtreme 3D Carousel
Plugin URI: http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-carousel-menu-xml.html
Description: The most advanced XML 3D Carousel Menu application. No Flash Knowledge required to insert the Carousel SWF inside the HTML page(s) of your site.
Version: 1.2
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_carousel_swf_nr	= 0; 											

function xtremeCarouselStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-carousel\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeCarouselAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeCarouselAddObj($xtreme_carousel_param) {

    global $xtreme_carousel_swf_nr; //number of swfs
	$xtreme_carousel_swf_nr++;
	
	$xtreme_carousel_rand = substr(rand(),0,3);
	
	$xtreme_carousel_dir = WP_CONTENT_URL .'/flashtuning/xtreme-3d-carousel/';
	$xtreme_carousel_swf = $xtreme_carousel_dir.'carousel.swf';
	$xtreme_carousel_config = "swfobj2";
	
	if ($xtreme_carousel_param[2] !=""){$xtreme_carousel_width = $xtreme_carousel_param[2];}
	else {$xtreme_carousel_width = 600;}
	
	if ($xtreme_carousel_param[4] !=""){$xtreme_carousel_height = $xtreme_carousel_param[4];}
	else {$xtreme_carousel_height = 400;}
	
	if ($xtreme_carousel_param[6] !=""){$xtreme_carousel_xml  = $xtreme_carousel_dir.$xtreme_carousel_param[6];}
	else {$xtreme_carousel_xml = $xtreme_carousel_dir.'carousel-settings.xml';}
	
	
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_carousel_param = array("quality" =>	"high", "bgcolor" => "#000000", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_carousel_config = "xhtml";}

	
	if ($xtreme_carousel_config != "xhtml") {
		$xtreme_carousel_output = "<div id=\"xtreme-3d-carousel".$xtreme_carousel_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_carousel_config) {
	
		case "xhtml":
			$xtreme_carousel_output.= "\n<object width=\"".$xtreme_carousel_width."\" height=\"".$xtreme_carousel_height."\">\n";
			$xtreme_carousel_output.= "<param name=\"movie\" value=\"".$xtreme_carousel_swf."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"quality\" value=\"".$xtreme_carousel_param['quality']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"bgcolor\" value=\"".$xtreme_carousel_param['bgcolor']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"wmode\" value=\"".$xtreme_carousel_param['wmode']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_carousel_param['allowfullscreen']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"scale\" value=\"".$xtreme_carousel_param['scale']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"salign\" value=\"".$xtreme_carousel_param['salign']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_carousel_param['allowscriptaccess']."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"base\" value=\"".$xtreme_carousel_dir."\"></param>\n";
			$xtreme_carousel_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_carousel_xml."\"></param>\n";
			
			
			$xtreme_carousel_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_carousel_width."\" height=\"".$xtreme_carousel_height."\" src=\"".$xtreme_carousel_swf."\" ";
			$xtreme_carousel_output.= "quality=\"".$xtreme_carousel_param['quality']."\" bgcolor=\"".$xtreme_carousel_param['bgcolor']."\" wmode=\"".$xtreme_carousel_param['wmode']."\" scale=\"".$xtreme_carousel_param['scale']."\" salign=\"".$xtreme_carousel_param['salign']."\" allowScriptAccess=\"".$xtreme_carousel_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_carousel_param['allowfullscreen']."\" base=\"".$xtreme_carousel_dir."\" FlashVars=\"setupXML=".$xtreme_carousel_xml."\"  ";
			
			$xtreme_carousel_output.= "></embed>\n";
			$xtreme_carousel_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_carousel_output.= '<script type="text/javascript">';
			$xtreme_carousel_output.= "swfobject.embedSWF('{$xtreme_carousel_swf}', 'xtreme-3d-carousel{$xtreme_carousel_rand}', '{$xtreme_carousel_width}', '{$xtreme_carousel_height}', '{$xtreme_carousel_param['version']}', '' , { setupXML: '{$xtreme_carousel_xml}'}, {base: '{$xtreme_carousel_dir}', wmode: '{$xtreme_carousel_param['wmode']}', scale: '{$xtreme_carousel_param['scale']}', salign: '{$xtreme_carousel_param['salign']}', bgcolor: '{$xtreme_carousel_param['bgcolor']}', allowScriptAccess: '{$xtreme_carousel_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_carousel_param['allowfullscreen']}'}, {});";
			$xtreme_carousel_output.= '</script>';
	
			break;
					
	}
	return $xtreme_carousel_output;
}

function  xtremeCarouselEcho($xtreme_carousel_width, $xtreme_carousel_height, $xtreme_carousel_xml) {
    echo xtremeCarouselAddObj( array( null, null, $xtreme_carousel_width, null, $xtreme_carousel_height, null, $xtreme_carousel_xml) );
}




function xtremeCarouselAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme 3D Carousel 1.2</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the free archive folder to the wp-content folder. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-3d-carousel/)
						</th>

					</tr>
                    <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-carousel]</strong>.</li>
                            <li>2. If you want to modify the width and height of the carousel insert this attributes into the tag: <strong>[xtreme-carousel width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme 3D Carousel on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-3d-carousel</strong> folder: carousel-settings.xml, used for general settings, and carousel-content.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: carousel-settings2.xml, carousel-content2.xml) </li>
                                <li>c. Open the carousel-settings2.xml, search for this tag <strong> < object param="contentXML"	value="carousel-content.xml" /></strong> and change the attribute value to <em>carousel-content2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-3d-carousel</strong></li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-carousel xml="carousel-settings2.xml"] when you insert the carousel on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeCarouselEcho(width,height,xmlFile)</strong> (e.g: xtremeCarouselEcho(595,420,'carousel-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-carousel-menu-xml.html">Xtreme 3D Carousel Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeCarouselAdminAdd() {
	
	add_options_page('Xtreme 3D Carousel Options', 'Xtreme 3D Carousel', 'manage_options','xtreme3dcarousel', 'xtremeCarouselAdmin');
}

function xtremeCarouselSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeCarouselStart');
add_action('admin_menu', 'xtremeCarouselAdminAdd');
add_action('init', 'xtremeCarouselSwfObj');
?>