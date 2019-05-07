<?php

/**
 * Redirect to Getting Started page on theme activation
 */
function cvee_redirect_on_activation() {
	global $pagenow;

	if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

		wp_redirect( admin_url( "themes.php?page=cvee-getting-started" ) );

	}
}
add_action( 'admin_init', 'cvee_redirect_on_activation' );

function cvee_start_load_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	wp_register_style( 'cvee-getting-started', get_template_directory_uri() . '/inc/dashboard/cvee-info-dashboard.css', false, '1.0.0' );
	wp_enqueue_style( 'cvee-getting-started' );
}

add_action( 'admin_enqueue_scripts', 'cvee_start_load_admin_scripts' );


/* Hook a menu under Appearance */
function cvee_getting_started_menu() {
	add_theme_page(
		esc_attr__( 'Cvee: Get Started', 'cvee' ),
		esc_attr__( 'Cvee: Get Started', 'cvee' ),
		'manage_options',
		'cvee-getting-started',
		'cvee_getting_started'
	);
}

add_action( 'admin_menu', 'cvee_getting_started_menu' );



/**
 * Theme Info Page
 */
function cvee_getting_started() {

	// Theme info
	$theme = wp_get_theme( 'cvee' );
?>

		<div class="wrap getting-started">
		<div class="getting-started__header">
		<div class="row">
			<div class="col-md-5 intro">
				<h2><?php esc_html_e( 'Welcome to cvee', 'cvee' ); ?></h2>
				<p>Version: <?php echo $theme['Version'];?></p>
				<p class="intro__version">
				<?php esc_html_e( 'Thank you for installing cvee! You Can Now Build Your Own Online Professional CV', 'cvee' ); ?> 
				</p>


			<h3 class="dashboard__why_buy">Why Upgrade To Cvee Pro</h3>
			<div class="col-md-12 text-block" style="padding-top: 2%;">
			<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/print-ready.jpg'; ?>" alt="<?php esc_html_e( 'Why Upgrade To Cvee Pro', 'cvee' ); ?>" />	
				</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Print Ready CV</h2>
					<span class="dashboard-upgrade-button"><a href="https://asphaltthemes.com/cvee#buy_pro&utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link" target="_blank">Upgrade</a></span>
					<p>Without Plugin Print Your CV </p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>Print Your Website CV On The Fly</li>
						<li>Without Any Plugin or configuration</li>
						<li>Check out the <a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/cvee#demos&utm_source=dashboard&utm_medium=theme&utm_campaign=upsell_link'); ?>">Cvee Demo Templates</a></li>
					</ul>

					</div>
					</div>
			</div>
			</div>


			<div class="clearfix"></div>
			<div class="dashboard_div_divider"></div>
			<div class="col-md-12 text-block no-bottom-margin">
			<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/template.png'; ?>" alt="<?php esc_html_e( 'More CV Templates', 'cvee' ); ?>" />	
					
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title"><?php esc_attr_e('More CV Templates', 'cvee'); ?></h2>
					<span class="dashboard-upgrade-button"><a href="https://asphaltthemes.com/cvee#buy_pro&utm_source=org&utm_medium=resumetheme&utm_campaign=upsell_link" target="_blank">Upgrade</a></span>
					<p>One click demo import</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>Say Goodbye To Complicated Site Setup</li>
						<li>Lots Of Cvee Templates At Your Fingertip</li>
					</ul>

					</div>
					</div>
			</div>
			</div>


			<div class="clearfix"></div>
			<div class="dashboard_div_divider"></div>
			<div class="col-md-12 text-block no-bottom-margin">
			<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/professional-cv-look.jpg'; ?>" alt="<?php esc_html_e( 'Professional Look', 'cvee' ); ?>" />	
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Industry Standard CV</h2>
					<span class="dashboard-upgrade-button"><a href="https://asphaltthemes.com/cvee#buy_pro&utm_source=dashboard&utm_medium=resumetheme&utm_campaign=upsell_link" target="_blank">Upgrade</a></span>
					<p>Professional CV For Professional You</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>Professional Looking CV</li>
						<li>Plain & Simple Look</li>
						<li>No Flashy & Corny Stuffs</li>
						<li>Or Bloated Features </li>
					</ul>

					</div>
					</div>
			</div>
			</div>
			<div class="clearfix"></div><div class="dashboard_div_divider"></div>
			<div class="col-md-12 text-block no-bottom-margin">
				<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/widget.jpg'; ?>" alt="<?php esc_html_e( 'Advance widget options', 'cvee' ); ?>" />	
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Advance Widget Options</h2>
					<span class="dashboard-upgrade-button"><a href="https://asphaltthemes.com/cvee#buy_pro&utm_source=dashboard&utm_medium=resumetheme&utm_campaign=upsell_link" target="_blank">Upgrade</a></span>
					<p>With cvee Pro you get</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>20 Frontpage Widgets</li>
						<li>1000+ Font Awesome Icons</li>
						<li>Google Fonts</li>
						<li>Integrated SEO Schema Markup</li>
						<li>6 Widget Area</li>
						<li>9 Page Template</li>
						<li>Plugin Compatibility</li>
						<li>Social Share On Posts</li>
						<li>Dedicate Support Forum</li>
						<li>Extra Widget Options</li>
					</ul>

					</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div><div class="dashboard_div_divider"></div>

			<div class="col-md-12 text-block no-bottom-margin">
				<div class="row">
					<div class="col-md-7 dashboard-upgrade-left">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/clean.jpg'; ?>" alt="<?php esc_html_e( 'Clean Design', 'cvee' ); ?>" />	
					</div>
					<div class="col-md-5 dashboard-upgrade-right">
					<h2 class="dashboard-upgrade-title">Clean Design</h2>
					<span class="dashboard-upgrade-button"><a href="https://asphaltthemes.com/cvee#buy_pro&utm_source=org&utm_medium=resumetheme&utm_campaign=upsell_link" target="_blank">Upgrade</a></span>
					<p>Professional Design</p>
					<div class="dashboard-upgrade-benefit">
					<ul>
						<li>Pixel Perfect Design</li>
						<li>Perfect For Coporate CV</li>
						<li>Design That Compliment CV </li>
					</ul>

					</div>
					</div>
				</div>
			</div><div class="clearfix"></div>
			
			<div class="clearfix"></div><div class="dashboard_div_divider"></div>
		</div>
		</div>

			<div class="col-md-12 cvee__upgrade-info-box no-top-margin">
			<div class="row flexify--center">
				<div class="col-md-7">
					<h2>Upgrade To Get The Most Out Of Cvee Pro</h2>
					<p>Build your own clean & professional online resume with Cvee Pro. Upgrade now, comes with 7 refund policy.</p>
				</div>

				<div class="col-md-5 dashboard-cta-right">
					<a class="theme__cta--download--pro" href="<?php echo esc_url('https://asphaltthemes.com/cvee#buy_pro&utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">Upgrade Now</a>
					
				</div>
			</div>
			</div>



		<div class="dashboard__blocks">
			<div class="col-md-4">
				<h3>Get Support</h3>
				<ol>
					<li>Cvee <a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/docs/upgrading-to-cvee-pro/upgrading-to-cvee-pro/#utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">Documentation</a></li>
					<li>WordPress.org <a target="_blank" href="<?php echo esc_url('https://wordpress.org/support/theme/cvee'); ?>">Support Forum</a></li>
					<li><a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/contact/#utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">Email Support</a> (Pro Users)</li>
				</ol>
			</div>

			<div class="col-md-4">
				<h3>Getting Started</h3>
				<ol>
					<li>Start <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>">Customizing</a> your website</li>
					<li>Upgrade to Pro to unlock all features</li>
				</ol>
			</div>

			<div class="col-md-4">
				<h3>Theme Documentation</h3>
				<ol>
					<li><a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/docs/upgrading-to-cvee-pro/how-to-setup-front-page/#utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">How To Set up the Front Page</a></li>
					<li><a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/docs/upgrading-to-cvee-pro/upgrading-to-cvee-pro/#utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">Upgrading To Cvee Pro</a></li>
					<li><a target="_blank" href="<?php echo esc_url('https://asphaltthemes.com/docs/cvee/upgrading-to-cvee-pro/basic-site-settings/#utm_source=dashboard&utm_medium=cveetheme&utm_campaign=upsell_link'); ?>">Basic Site Settings</a></li>
				</ol>
			</div>
		</div>

		</div><!-- .getting-started -->

	<?php
}