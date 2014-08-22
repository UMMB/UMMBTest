<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<?php 
/*
 * @file
 * UMMB's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system folder.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 */

?>





html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
  	 <?php
    db_query("DELETE FROM {cache};");
    ?>  
    <?php print render ($page ['head']); ?>
    <title><?php print $head_title;?></title>
    <?php print render($page ['styles']); ?>
    <?php print render($page ['scripts']); ?>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

<script> 
window.onload = function() {
   if (!document.getElementsByTagName) return false;
   var links = document.getElementsByTagName("a");
   for (var i=0; i<links.length; i++) {
      if (links[i].getAttribute("href").match('#newpagemenu') == "#newpagemenu") {
         links[i].onclick = function() {
            return !window.open(this.href);
         }
      }

   }
}
</script>

<body>
<div id="top-bar">

	<div id="top-bar-maroon">
		<div class="wrapper">
			
			<!-- Begin UMass Amherst top banner -->
			<div id="topbanner" style="text-align: right; padding-top: 8px; padding-right: 15px;">
			<a href="http://umass.edu/"><img id="banner_wordmark" src="http://umass.edu/umhome/identity/top_banner_06/informal_fff_on_881c1c.gif" width="146" height="22" alt="UMass Amherst" style="float: left; width: 146px; border: 0;"></a>
			<form action="http://googlebox.oit.umass.edu/search" method="get" name="gs" onsubmit="if (this.q.value=='Search UMass Amherst') return false;" style="margin: 0; padding: 0;margin-bottom:10px;">
			<div><label for="q"><input type="text" style="font-size: 11px; font-family: Verdana, sans-serif; padding-left: 2px" size="22" name="q" id="q" value="Search UMass Amherst" onfocus="if (this.value=='Search UMass Amherst') this.value=''" onblur="if (this.value=='') this.value='Search UMass Amherst'"></label>
			<input name="sa" type="submit" value="Go" style="font-size: 11px; font-family: Verdana, sans-serif;">
			<input type="hidden" name="site" value="default_collection">
			<input type="hidden" name="client" value="default_frontend">
			<input type="hidden" name="proxystylesheet" value="default_frontend">
			<input type="hidden" name="output" value="xml_no_dtd">
			</div></form>
			</div>

			<!-- End UMass Amherst top banner -->
			<div id="ummb-logo">
			<img src="<?php echo $base_path.path_to_theme().'/photos/ummb_top_bar_text.png'; ?>" />
			</div>
		</div>
	</div>
	<div id="top-bar-black">
		<div class="wrapper">
			<div id="main-navigation" class="light-text">

				<?php if ($main_menu): ?>

      		    <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 
     			 'class' => array('links', 'inline', 'clearfix')))); ?>
			        <?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="wrapper" id="content-body">
	<?php if ($is_front):?>
	<div id="slideshow">
		<div id="slideshow-js">
		<?php if ($slideshow):
			print render ($page ['slideshow']);
		else: ?>
			<img src="<?php echo $base_path.path_to_theme().'/photos/slideshow_1.png'; ?>" />
		<?php endif; ?>
		
		</div>	
		<div id="slideshow-grad">
			<img src="<?php echo $base_path.path_to_theme().'/photos/slideshow-gradiant.png'; ?>" />	
		</div>
		<div id="pandc">
			<img src="<?php echo $base_path.path_to_theme().'/photos/pandc-white.png'; ?>" />
		</div>
		<?php if ($upcoming_events): ?>
		<div id="upcoming-events">
			<h3>Upcoming Events</h3>
			<?php print render ($page ['upcoming_events']); ?>
		</div>
		 <?php endif; ?>
	</div>
	
	<?php endif; ?>
	
	<?php if ($announcements): ?>
		<div id="annoucements">
			<b style="color:black">Announcements for <?php echo date('M d,Y'); ?></b>
			<?php print render ($announcements ['announcements']); ?>
		</div>	
	<? endif; ?>
	
<div id="column-wrap">   

	<?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="column sidebar"><div class="section">

<?php
      	try {
        print render($page['sidebar_second']);
        echo 'If you see this, the number is 1 or below';
   		 }
    		
    		catch (Exception $e){
    		echo 'Message: Marc Broke this' .$e->getMessage();
    	}
    	?>

      </div></div> <!-- /.section, /#sidebar-first -->
         <?php endif; ?>

		<div id="<?php if($is_front){echo 'front-main-content';}else{echo 'main-content';}?>">
			<?php if ($messages): ?>
				<div id="errors">
					<?php print render ($messages ['messages']);?>
				</div>
			<?php endif;?>

			<?php if ($title || $tabs): ?>
			  <div id="pagebar">
			  <?php if ($title) : ?>
			    <h1>
			    <?php print render($page ['title']); ?>
			    </h1>
			    <?php endif; ?>
			  <?php print render($page['tabs']); ?>
			  </div>
			  <?php endif; ?>
			<?php print render($page ['content']); ?>
		</div>
		<div style="clear:both"></div>
	
	</div>
</div>

<div style="clear:both"></div>
<div id="footer">
	<?php if ($footer){print render ($page ['footer']);} ?>
	<?php print render ($page ['footer_message']); ?>
</div>

</body>
</html>
