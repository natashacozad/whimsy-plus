<?php
/*
 * Plugin Name: Whimsy+ | Advanced Options
 * Version: 0.0.1
 * Plugin URI: http://www.whimsycreative.co/framework/plus
 * Description: A plugin packed with awesome features for Whimsy Framework.
 * Author: Whimsy Creative Co.
 * Author URI: http://www.whimsycreative.co
 * Requires at least: 4.0
 * Tested up to: 4.7.4
 *
 * Text Domain: whimsy-plus
 * Domain Path: /language/
 *
 * @package WordPress
 * @author Natasha Cozad
 * @since 1.0.0
 */

function whimsy_plus_advanced_init() {
	
	// Include advanced extensions
	include_once WHIMSY_PLUS_MODS . 'advanced/sharing.php';
	include_once WHIMSY_PLUS_MODS . 'advanced/twitter-mentions.php';
	
	if( class_exists( 'Kirki' ) ) {
		Kirki::add_config( 'whimsy_plus_advanced', array( //customize config name
			'option_type' => 'theme_mod',
			'capability'  => 'edit_theme_options',
		) );


		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'toggle',
			'settings'    => 'enable_breadcrumbs',
			'label'       => __( 'Show breadcrumbs?', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => false,
			'priority'    => 10,
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'toggle',
			'settings'    => 'whimsy_plus_enable_twitter_mentions',
			'label'       => __( 'Link @username Twitter mentions?', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => false,
			'priority'    => 10,
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'toggle',
			'settings'    => 'whimsy_plus_add_social_sharing_icons',
			'label'       => __( 'Show sharing icons on posts?', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => false,
			'priority'    => 10,
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'     => 'text',
			'settings' => 'whimsy_plus_social_sharing_custom',
			'label'    => __( 'Replace <b>Share</b> text.', 'whimsy-plus' ),
			'section'  => 'whimsy_plus_advanced',
			'priority' => 10,
			'active_callback'    => array(
				array(
					'setting'  => 'whimsy_plus_add_social_sharing_icons',
					'operator' => '==',
					'value'    => 1,
				),
			),
			'transport'    => 'refresh',
			'js_vars'      => array(
				array(
					'function' => 'html',
				),
			)
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'color',
			'settings'    => 'whimsy_plus_social_sharing_link',
			'label'       => __( 'Icon Link Color', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => '#52b0c1',
			'priority'    => 10,
			'choices'     => array(
				'alpha' => true,
			),
			'active_callback'  => array(
				array(
				'setting'  => 'whimsy_plus_add_social_sharing_icons',
				'operator' => '==',
				'value'    => true
				),
			),
			'output'      => array(
				array(
					'element'  => '#social-sharing a, #social-sharing a:visited',
					'property' => 'color'
				),
			),
			'transport'    => 'postMessage',
			'js_vars'      => array(
				array(
					'element'  => '#social-sharing a, #social-sharing a:visited',
					'property' => 'color',
					'function' => 'style',
				),
			)
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'color',
			'settings'    => 'whimsy_plus_social_sharing_link_hover',
			'label'       => __( 'Icon Hover Color', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => '#333333',
			'priority'    => 11,
			'choices'     => array(
				'alpha' => true,
			),
			'active_callback'  => array(
				array(
				'setting'  => 'whimsy_plus_add_social_sharing_icons',
				'operator' => '==',
				'value'    => true
				),
			),
			'output'      => array(
				array(
					'element'  => '#social-sharing a:hover',
					'property' => 'color'
				),
			),
			'transport'    => 'postMessage',
			'js_vars'      => array(
				array(
					'element'  => '#social-sharing a:hover',
					'property' => 'color',
					'function' => 'style',
				),
			)
		) );
		Kirki::add_field( 'whimsy_plus_advanced', array(
			'type'        => 'color',
			'settings'    => 'whimsy_plus_social_sharing_link_active',
			'label'       => __( 'Icon Active Color', 'whimsy-plus' ),
			'section'     => 'whimsy_plus_advanced',
			'default'     => '#aaaaaa',
			'priority'    => 12,
			'choices'     => array(
				'alpha' => true,
			),
			'active_callback'  => array(
				array(
				'setting'  => 'whimsy_plus_add_social_sharing_icons',
				'operator' => '==',
				'value'    => true
				),
			),
			'output'      => array(
				array(
					'element'  => '#social-sharing a:active,#social-sharing a:focus',
					'property' => 'color'
				),
			),
			'transport'    => 'postMessage',
			'js_vars'      => array(
				array(
					'element'  => '#social-sharing a:active,#social-sharing a:focus',
					'property' => 'color',
					'function' => 'style',
				),
			)
		) );
		
		//add fields
	}
}
add_action( 'init', 'whimsy_plus_advanced_init', 50 );