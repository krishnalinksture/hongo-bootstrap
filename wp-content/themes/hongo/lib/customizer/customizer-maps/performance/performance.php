<?php
/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { 
	exit;
}

/* Wp emojis layout */
$wp_customize->add_setting(
	'hongo_perfomance_wp_emojis_separator',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);

$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_perfomance_wp_emojis_separator',
		[
			'label'    => esc_html__( 'WP Emojis', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_perfomance_wp_emojis_separator',
		],
	),
);

$wp_customize->add_setting(
	'hongo_wp_emojis',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);
$wp_customize->add_control(
	new hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_wp_emojis',
		[
			'label'       => esc_html__( 'Disable WP Emojis', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_wp_emojis',
			'description' => esc_html__( 'Switch ON to disable the Emoji script (wp-emoji-release.min.js).', 'hongo' ),
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
		]
	)
);
/* End Wp emojis settings */

/* Disable XML RPC */
$wp_customize->add_setting(
	'hongo_performance_disable_xmlrpc_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_disable_xmlrpc_sep',
		[
			'label'    => esc_html__( 'Disable XML RPC', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_disable_xmlrpc_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_disable_xmlrpc',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_disable_xmlrpc',
		[
			'label'       => esc_html__( 'Disable XML RPC', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_disable_xmlrpc',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to disable WordPress XML-RPC.', 'hongo' ),
		]
	)
);
/* END Disable XML RPC */

/* Hongo Disable RSS Feeds */
$wp_customize->add_setting(
	'hongo_performance_rss_feeds_separator',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);

$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_rss_feeds_separator',
		[
			'label'    => esc_html__( 'Disable RSS Feeds', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_rss_feeds_separator',
		],
	),
);

$wp_customize->add_setting(
	'hongo_disable_rss_feeds',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_disable_rss_feeds',
		[
			'label'       => esc_html__( 'Disable RSS Feeds', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'description' => esc_html__( 'Switch ON to disable RSS feeds.', 'hongo' ),
			'settings'    => 'hongo_disable_rss_feeds',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
		]
	)
);
/* Add setting for Disable RSS Feeds */

/* Remove RSD Link */
$wp_customize->add_setting(
	'hongo_performance_remove_rsd_link_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_remove_rsd_link_sep',
		[
			'label'    => esc_html__( 'Remove WLW and RSD Link', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_remove_rsd_link_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_remove_rsd_link',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_remove_rsd_link',
		[
			'label'       => esc_html__( 'Remove WLW and RSD Link', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_remove_rsd_link',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to remove WordPress WLW and RSD link.', 'hongo' ),
		]
	)
);
/* END Remove RSD Link */

/* Disable Dashicons Icons */
$wp_customize->add_setting(
	'hongo_performance_disable_dashicons_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_disable_dashicons_sep',
		[
			'label'    => esc_html__( 'Disable Dashicons', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_disable_dashicons_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_disable_dashicons',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_disable_dashicons',
		[
			'label'       => esc_html__( 'Disable Dashicons', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_disable_dashicons',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to disable dashicons which are used on WordPress admin and might not be used on frontend.', 'hongo' ),
		]
	)
);
/* END Disable Dashicons */

/* Disable Self Pings */
$wp_customize->add_setting(
	'hongo_performance_disable_self_pings_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_disable_self_pings_sep',
		[
			'label'    => esc_html__( 'Disable Self Pings', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_disable_self_pings_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_disable_self_pings',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_disable_self_pings',
		[
			'label'       => esc_html__( 'Disable Self Pingbacks', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_disable_self_pings',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to disable self pingbacks from the website.', 'hongo' ),
		]
	)
);
/* END Disable Self Pings */

/* Remove Shortlink */
$wp_customize->add_setting(
	'hongo_performance_remove_shortlink_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_remove_shortlink_sep',
		[
			'label'    => esc_html__( 'Remove Shortlink', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_remove_shortlink_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_remove_shortlink',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_remove_shortlink',
		[
			'label'       => esc_html__( 'Remove Shortlink', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_remove_shortlink',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to remove the rel=shortlink from site.', 'hongo' ),
		]
	)
);
/* END Remove Shortlink */

/* Remove WordPress Version */
$wp_customize->add_setting(
	'hongo_performance_remove_wp_version_sep',
	[
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	],
);
$wp_customize->add_control(
	new Hongo_Customize_Separator_Control(
		$wp_customize,
		'hongo_performance_remove_wp_version_sep',
		[
			'label'    => esc_html__( 'Remove WordPress Version', 'hongo' ),
			'type'     => 'hongo_separator',
			'section'  => 'hongo_bloat_settings_section',
			'settings' => 'hongo_performance_remove_wp_version_sep',
		],
	),
);

$wp_customize->add_setting(
	'hongo_remove_wp_version_generator',
	[
		'default'           => '0',
		'sanitize_callback' => 'esc_attr',
	]
);

$wp_customize->add_control(
	new Hongo_Customize_Switch_Control(
		$wp_customize,
		'hongo_remove_wp_version_generator',
		[
			'label'       => esc_html__( 'Remove WordPress Version', 'hongo' ),
			'section'     => 'hongo_bloat_settings_section',
			'settings'    => 'hongo_remove_wp_version_generator',
			'type'        => 'hongo_switch',
			'choices'     => array(
				'1' => esc_html__( 'On', 'hongo' ),
				'0' => esc_html__( 'Off', 'hongo' ),
			),
			'description' => esc_html__( 'Switch ON to remove the WordPress version generator from the site.', 'hongo' ),
		]
	)
);
/* END Remove WordPress Version */
