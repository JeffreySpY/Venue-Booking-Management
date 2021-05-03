<?php
	/*
	Plugin Name: Dashboard quick link widget
	Plugin URI: http://www.hemthapa.com
	Description: This lightweight plugin creates new widget in dashboard with quick access link  button.
	Version: 1.5
	Author: Hem Thapa
	Author URI: http://www.hemthapa.com
	License: GPL2
	*/

   	// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        die;
    }


	add_action('admin_enqueue_scripts', 'dqlw_scripts_enqueue');
	add_action('admin_menu', 'setDashboardQuickLinkWidgetMenu');

	function dqlw_scripts_enqueue(){
	wp_enqueue_style( 'style-dqlw', plugins_url( 'dqlw.css', __FILE__ ) );
	wp_enqueue_style('fontawesome-script','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
	}


	function setDashboardQuickLinkWidgetMenu()
	{
		add_options_page("Dashboard links widget", "Dashboard links widget", "administrator", 'dashboard-quick-link-widget', 'dashboardQuickLinkWidgetOption');
		add_action( 'admin_init', 'register_quick_dashboard_link_widget_settings' );
	}

	function register_quick_dashboard_link_widget_settings(){
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_enable' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_title' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_header_notice' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_link_list' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_open_link' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_footer_notice' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_mbox_bcolor' );
		register_setting( 'dashboard-quick-link', 'dashboard_quick_link_widget_mbox_fcolor' );
	}


	function dashboardQuickLinkWidgetOption(){ ?>

	<div class="wrap">
		<h1>Dashboard quick links widget options</h1>
		<div>
			<div>
			<form method="post" action="options.php">
				<?php settings_fields( 'dashboard-quick-link' ); ?>
				<?php do_settings_sections( 'dashboard-quick-link' ); ?>
				<table class="form-table quick_dashboard_link_form">
					<tr valign="top">
					<th scope="row"><strong>Enable dashboard widget</strong></th>
					<td>
						<input type="checkbox" name="dashboard_quick_link_widget_enable" <?php if(get_option('dashboard_quick_link_widget_enable') != false){ echo " checked"; } ?> >
					</td>
					</tr>
					<tr valign="top">
					<th scope="row">Widget title </th>
					<td>
						<input type="text" name="dashboard_quick_link_widget_title" value="<?php echo esc_attr( get_option('dashboard_quick_link_widget_title') ); ?>" placeholder="Dashboard quick links" size="50" />
					</td>
					</tr>
					<tr valign="top">
					<th scope="row">Header message<br>(You can use HTML content)</th>
					<td>
						<textarea name="dashboard_quick_link_widget_header_notice" rows="4" cols="50" placeholder="Enter header message"><?php echo esc_attr( get_option('dashboard_quick_link_widget_header_notice') ); ?></textarea>
					</td>
					</tr>
					<tr valign="top">
					<th scope="row">Links list</th>
					<td>List each link in separate lines<br><br><strong>Link format: </strong><i> Link text </i>| <i> Button link </i>| <i> Button text</i> | <i> Fontawesome icon class (optional) </i><br><b>For eg</b>:  <br><u>Post new blog article</u> | <u>/wp-admin/post-new.php</u> | <u>Create new post</u>| <u>fa-pencil-square-o</u> (with icon)<br><u>Post new blog article</u> | <u>/wp-admin/post-new.php</u> | <u>Create new post</u> (Without icon)<br><br>
						<textarea name="dashboard_quick_link_widget_link_list" rows="8" cols="120" placeholder='Post new blog article | /wp-admin/post-new.php | Create new post'><?php echo esc_attr( get_option('dashboard_quick_link_widget_link_list') ); ?></textarea><br>

					</td>
					</tr>
					<tr valign="top">
					<th scope="row">Open widget links on new tab</th>
					<td>
						<input type="checkbox" name="dashboard_quick_link_widget_open_link" <?php if(get_option('dashboard_quick_link_widget_open_link') != false ){ echo " checked"; } ?> >
					</td>
					</tr>
					<tr valign="top">
					<th scope="row">Footer message <br>(You can use HTML content)</th>
					<td>
						<textarea name="dashboard_quick_link_widget_footer_notice" rows="4" cols="50" placeholder="Enter footer message"><?php echo esc_attr( get_option('dashboard_quick_link_widget_footer_notice') ); ?></textarea>
					</td>
					</tr>
					<tr valign="top">
					<td scope="row" colspan="2"><h3>Color setting</h3></td>
					</tr>


					<tr valign="top">
					<th scope="row">Header message background color</th>
					<td>
						<input type="color" name="dashboard_quick_link_widget_mbox_bcolor" maxlength="7" value="<?php echo esc_attr( get_option('dashboard_quick_link_widget_mbox_bcolor') ); ?>" placeholder="#ff0000" size="15" />
					</td>
					</tr>

					<tr valign="top">
					<th scope="row">Header message font color</th>
					<td>
						<input type="color" name="dashboard_quick_link_widget_mbox_fcolor" maxlength="7" value="<?php echo esc_attr( get_option('dashboard_quick_link_widget_mbox_fcolor') ); ?>" placeholder="#ff0000" size="15" />
					</td>
					</tr>

					<tr valign="top" class="authortr">
					<th scope="row"></th>
					<td>
						If you got any feedback regarding the plugin, please let me know on <a href="http://hemthapa.com?ref=<?php echo $_SERVER['HTTP_HOST']; ?>&pl=dqlink" target="_blank">hemthapa.com</a>
					</td>
					</tr>

				</table>

				<?php submit_button(); ?>
			</form>
			</div>
		</div>
		</div>
	<?php }


	function add_quick_dashboard_link_widget() {
		if(get_option('dashboard_quick_link_widget_title') != false){
			$widgetTitle = esc_attr(get_option('dashboard_quick_link_widget_title'));
		}else {
			$widgetTitle = "Dashboard quick links";
		}


		wp_add_dashboard_widget(
					 'dashboard_quick_links_widget',
					 $widgetTitle,
					 'dashboard_quick_links_widget_function'
			);
	}

	if(trim(esc_attr(get_option('dashboard_quick_link_widget_enable')))=='on'){
		add_action( 'wp_dashboard_setup', 'add_quick_dashboard_link_widget' );
	}


	function dashboard_quick_links_widget_function() {

		if(get_option('dashboard_quick_link_widget_header_notice') != false){ ?>

			<div class="skip-dashboard-link-widget-notice" style="color:<?php if(get_option('dashboard_quick_link_widget_mbox_fcolor') != false){ echo esc_attr(get_option('dashboard_quick_link_widget_mbox_fcolor')); }?>; background-color:<?php if(get_option('dashboard_quick_link_widget_mbox_bcolor') != false){ echo esc_attr(get_option('dashboard_quick_link_widget_mbox_bcolor')); }?>; ">
			<?php echo html_entity_decode(esc_attr( get_option('dashboard_quick_link_widget_header_notice'))); ?>
			</div>

		<?php }

		$list = esc_attr( get_option('dashboard_quick_link_widget_link_list') );

		$linklist = explode("\n",$list);

		$finalarray = array();
		foreach($linklist as $a){
			$newarrayline = explode('|', $a);
			$newarrayline = array_map('trim', $newarrayline);
			if(sizeof($newarrayline)<3){
				continue;
			}
			array_push($finalarray, $newarrayline);
		}

		if(trim($list) != false) {
		?>
			<table class="skip-dashboard-link-widget">
		<?php foreach ($finalarray as $dqlw_links){ ?>
				<tr valign="top">
				<td scope="row">
				<?php if(!empty($dqlw_links[3])){ ?>
				<i class="fa fa-lg <?php echo $dqlw_links[3]; ?>" aria-hidden="true"></i> &nbsp;
				<?php } ?>
				<?php echo $dqlw_links[0]; ?></td>
				<td><a href="<?php echo $dqlw_links[1]; ?>"  class="button-primary skip-dashboard-link-widget-button" target="<?php if(trim(esc_attr(get_option('dashboard_quick_link_widget_open_link')))=='on'){ echo "_blank"; }?>"><?php echo $dqlw_links[2]; ?></a></td>
				</tr>
		<?php } ?>
			</table>
		<?php } ?>

		<div class="quick-dashboard-link-widget-footer"><?php echo html_entity_decode(esc_attr( get_option('dashboard_quick_link_widget_footer_notice') )); ?></div>
		<?php

	}
