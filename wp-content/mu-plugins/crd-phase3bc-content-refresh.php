<?php
/**
 * Plugin Name: CRD Phase 3B and 3C Content Refresh Migration
 * Description: Temporary admin-only dry-run/apply tool for Phase 3B and 3C English content refreshes and mini-hub additions.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CRD_PHASE3BC_REFRESH_COMPLETED_OPTION', 'crd_phase3bc_content_refresh_completed' );
define( 'CRD_PHASE3BC_REFRESH_BACKUP_OPTION', 'crd_phase3bc_content_refresh_backup' );
define( 'CRD_PHASE3BC_REFRESH_NONCE_ACTION', 'crd_phase3bc_content_refresh_apply' );

function crd_phase3bc_refresh_targets() {
	return array(
		array(
			'label'        => 'Altitude Diving',
			'slug'         => 'altitude-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 1',
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Ready to explore the wonders of altitude diving? Join our <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Adventure Diver course</strong></a> to ensure a safe and thrilling high-altitude diving experience!</p>',
					'new'    => '<p>Ready to explore the wonders of altitude diving? Join our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> to ensure a safe and thrilling high-altitude diving experience!</p>',
				),
			),
		),
		array(
			'label'        => 'Search and Recovery Diving',
			'slug'         => 'search-and-recovery-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 2',
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Ready to enhance your search and recovery diving skills? Explore our <a title="Advanced Diving Course" href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Diver course</strong></a> and learn more about improving your underwater abilities!</p>',
					'new'    => '<p>Ready to enhance your search and recovery diving skills? Explore our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> and learn more about improving your underwater abilities!</p>',
				),
			),
		),
		array(
			'label'        => 'Family Scuba Diving',
			'slug'         => 'family-scuba-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 3',
					'anchor' => 'Try Dive experience / Open Water course',
					'target' => '/courses-on-koh-tao/try-scuba-diving/ and /courses-on-koh-tao/open-water-course/',
					'old'    => 'Start your family\'s diving adventure today with a <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/try-scuba-diving/">Try Dive experience</a> or the <a href="https://www.divessi.com/en/get-certified/scuba-diving/open-water-diver" target="_blank" rel="noopener">Open Water course</a> and discover a world of adventure, learning, and unforgettable memories beneath the waves.',
					'new'    => 'Start your family\'s diving adventure today with a <a href="/courses-on-koh-tao/try-scuba-diving/">Try Dive experience</a> or the <a href="/courses-on-koh-tao/open-water-course/">Open Water course</a> and discover a world of adventure, learning, and unforgettable memories beneath the waves.',
				),
			),
		),
		array(
			'label'        => 'Koh Tao Dive Center',
			'slug'         => 'koh-tao-dive-center',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 4',
					'anchor' => 'course overview',
					'target' => '/courses-on-koh-tao/',
					'old'    => 'To embark on your scuba diving adventure in Koh Tao, exploreour website to find which course to start with or if you are already a dive <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/">which course</a> is next.',
					'new'    => 'To embark on your scuba diving adventure in Koh Tao, explore our <a href="/courses-on-koh-tao/">course overview</a> to find which course to start with or which course is next.',
				),
			),
		),
		array(
			'label'        => 'Drift Diving',
			'slug'         => 'drift-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 5',
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Ready to take your drift diving to the next level? Explore our <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>AOWD course</strong></a> and find the best dive sites for your next adventure.</p>',
					'new'    => '<p>Ready to take your drift diving to the next level? Explore our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> and find the best dive sites for your next adventure.</p>',
				),
			),
		),
		array(
			'label'        => 'Wreck Diving',
			'slug'         => 'wreck-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 6',
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Ready to enhance your wreck diving skills? Enroll in our <a title="Advanced Diver Course" href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Diver course</strong></a> and visit our dive site pages to find the best spots for your next adventure.</p>',
					'new'    => '<p>Ready to enhance your wreck diving skills? Enroll in our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> and visit our dive site pages to find the best spots for your next adventure.</p>',
				),
			),
		),
		array(
			'label'        => 'Night Diving',
			'slug'         => 'night-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 7',
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>If you\'re ready to take your diving skills to the next level, consider enrolling in our <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Diver course</strong></a>, which offers guided dives and access to some of the best nocturnal dive sites.</p>',
					'new'    => '<p>If you\'re ready to take your diving skills to the next level, consider enrolling in our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a>, which offers guided dives and access to some of the best nocturnal dive sites.</p>',
				),
			),
		),
		array(
			'label'        => 'Sail Rock Dive Site',
			'slug'         => 'sail-rock-dive-site-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 8',
					'anchor' => '',
					'target' => '',
					'old'    => 'Open open-water certification',
					'new'    => 'Open Water certification',
				),
			),
		),
		array(
			'label'        => 'Koh Tao Diving Sites',
			'slug'         => 'koh-tao-diving-sites',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 9a',
					'anchor' => '',
					'target' => '',
					'old'    => 'The site\'s sites and the presence of a secret pinnacle make it a location where most divers opt for two dives to experience its beauty fully.',
					'new'    => 'The site\'s depth and secret pinnacle make it a location where most divers opt for two dives to experience its beauty fully.',
				),
				array(
					'label'  => 'Phase 3B fix 9b',
					'anchor' => '',
					'target' => '',
					'old'    => 'About 15 kilometres south of Koh Tao, the Southwest Pinnacle rises through the water column, presenting a teeming with life throughout the year.',
					'new'    => 'About 15 kilometres south of Koh Tao, Southwest Pinnacle rises through the water column and is teeming with life throughout the year.',
				),
				array(
					'label'  => 'Phase 3C addition 4',
					'anchor' => 'Mango Bay / Aow Leuk / Twins / Chumphon Pinnacle / Southwest Pinnacle / Sail Rock / HTMS Sattakut wreck',
					'target' => '/mango-bay-dive-site-koh-tao/ and related dive-site guides',
					'old'    => '<h2>Conclusion: Dive in Koh Tao</h2>',
					'new'    => '<p>Related dive-site guides: For easier conditions, compare <a href="/mango-bay-dive-site-koh-tao/">Mango Bay</a>, <a href="/aow-leuk-bay-koh-tao/">Aow Leuk</a>, and <a href="/twins-dive-site-koh-tao/">Twins</a>. For deeper or more advanced dives, compare <a href="/chumphon-pinnacle-koh-tao/">Chumphon Pinnacle</a>, <a href="/southwest-pinnacle-dive-site-koh-tao/">Southwest Pinnacle</a>, <a href="/sail-rock-dive-site-koh-tao/">Sail Rock</a>, and the <a href="/htms-sattakut-wreck-koh-tao/">HTMS Sattakut wreck</a>.</p><h2>Conclusion: Dive in Koh Tao</h2>',
				),
			),
		),
		array(
			'label'        => 'Diving Safety',
			'slug'         => 'diving-safety',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3B fix 10',
					'anchor' => '',
					'target' => '',
					'old'    => 'recognized agencies like PADI or NAUI',
					'new'    => 'recognised agencies such as SSI, PADI, RAID, or NAUI',
				),
				array(
					'label'  => 'Phase 3C addition 3',
					'anchor' => 'pre-dive safety check / buoyancy control guide / equalisation tips',
					'target' => '/pre-dive-safety-check/ and related safety guides',
					'old'    => "<h2>Conclusion</h2>\n<p>Scuba diving near Koh Tao offers thrilling experiences filled with marine wonders, but it comes with responsibilities.",
					'new'    => "<p>Related guides: Before your next dive, review our <a href=\"/pre-dive-safety-check/\">pre-dive safety check</a>, <a href=\"/buoyancy-control/\">buoyancy control guide</a>, and <a href=\"/how-to-equalize-your-ears-while-scuba-diving/\">equalisation tips</a>.</p>\n<h2>Conclusion</h2>\n<p>Scuba diving near Koh Tao offers thrilling experiences filled with marine wonders, but it comes with responsibilities.",
				),
			),
		),
		array(
			'label'        => '10 Essential Tips for Beginner Divers',
			'slug'         => 'beginner-divers',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3C addition 1',
					'anchor' => 'best places to learn scuba diving / scuba diving skills',
					'target' => '/is-koh-tao-the-best-place-to-learn-scuba-diving/ and /scuba-diving-skills/',
					'old'    => '<h3>Start Your Diving Journey Today</h3>',
					'new'    => '<p>Related guides: If you are comparing your first options, read our guide to why Koh Tao is one of the <a href="/is-koh-tao-the-best-place-to-learn-scuba-diving/">best places to learn scuba diving</a>, then review the core <a href="/scuba-diving-skills/">scuba diving skills</a> every new diver should build.</p> <h3>Start Your Diving Journey Today</h3>',
				),
			),
		),
		array(
			'label'        => 'Scuba Diving Skills Every Diver Should Master',
			'slug'         => 'scuba-diving-skills',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3C addition 2',
					'anchor' => 'buoyancy control / underwater navigation / ear equalisation guide',
					'target' => '/buoyancy-control/ and related skills guides',
					'old'    => '<p>Once you\'ve mastered these core skills, you can take your diving further with more advanced training and real dive experience.</p>',
					'new'    => '<p>Related guides: For deeper practice, read our <a href="/buoyancy-control/">buoyancy control</a> guide, <a href="/underwater-navigation/">underwater navigation</a> tips, and <a href="/how-to-equalize-your-ears-while-scuba-diving/">ear equalisation guide</a>.</p><p>Once you\'ve mastered these core skills, you can take your diving further with more advanced training and real dive experience.</p>',
				),
			),
		),
		array(
			'label'        => 'Advanced Adventurer Course on Koh Tao',
			'slug'         => 'advanced-adventurer-course-on-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'label'  => 'Phase 3C addition 5',
					'anchor' => 'underwater navigation / deep diving / wreck diving / buoyancy control',
					'target' => '/underwater-navigation/ and related advanced guides',
					'old'    => '<p>In conclusion, Koh Tao offers a wealth of opportunities for divers of all levels to expand their diving skills and experiences through a variety of courses, certifications, and licenses.',
					'new'    => '<p>Related skills: Advanced divers often benefit from focused guides on <a href="/underwater-navigation/">underwater navigation</a>, <a href="/deep-diving-adventures/">deep diving</a>, <a href="/wreck-diving/">wreck diving</a>, and <a href="/buoyancy-control/">buoyancy control</a> before choosing their next course.</p><p>In conclusion, Koh Tao offers a wealth of opportunities for divers of all levels to expand their diving skills and experiences through a variety of courses, certifications, and licenses.',
				),
			),
		),
	);
}

function crd_phase3bc_refresh_page_has_language( $post_id, $lang ) {
	global $wpdb;

	$language = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT t.slug
			FROM {$wpdb->term_relationships} tr
			JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
			JOIN {$wpdb->terms} t ON t.term_id = tt.term_id
			WHERE tr.object_id = %d
			AND tt.taxonomy = 'language'
			AND t.slug = %s
			LIMIT 1",
			$post_id,
			$lang
		)
	);

	return $language === $lang;
}

function crd_phase3bc_refresh_find_post( $target ) {
	global $wpdb;

	$post_id = $wpdb->get_var(
		$wpdb->prepare(
			"SELECT ID FROM {$wpdb->posts}
			WHERE post_type = %s
			AND post_status = 'publish'
			AND post_name = %s
			ORDER BY ID ASC
			LIMIT 1",
			$target['post_type'],
			$target['slug']
		)
	);

	if ( ! $post_id ) {
		return null;
	}

	$post = get_post( (int) $post_id );
	if ( ! $post || ! crd_phase3bc_refresh_page_has_language( $post->ID, $target['lang'] ) ) {
		return null;
	}

	return $post;
}

function crd_phase3bc_refresh_replace_in_elementor_node( &$node, $replacements, &$counts ) {
	if ( ! is_array( $node ) ) {
		return;
	}

	foreach ( $node as &$value ) {
		if ( is_string( $value ) ) {
			foreach ( $replacements as $index => $replacement ) {
				if ( false !== strpos( $value, $replacement['old'] ) ) {
					$value = str_replace( $replacement['old'], $replacement['new'], $value, $count );
					$counts[ $index ] += $count;
				}
			}
		} elseif ( is_array( $value ) ) {
			crd_phase3bc_refresh_replace_in_elementor_node( $value, $replacements, $counts );
		}
	}
	unset( $value );
}

function crd_phase3bc_refresh_count_in_elementor_node( $node, $needle ) {
	$count = 0;

	if ( is_string( $node ) ) {
		return substr_count( $node, $needle );
	}

	if ( is_array( $node ) ) {
		foreach ( $node as $value ) {
			$count += crd_phase3bc_refresh_count_in_elementor_node( $value, $needle );
		}
	}

	return $count;
}

function crd_phase3bc_refresh_scan_single_target( $target ) {
	$post = crd_phase3bc_refresh_find_post( $target );
	if ( ! $post ) {
		return array(
			'status' => 'not_found',
			'target' => $target,
			'post'   => null,
		);
	}

	$raw_elementor = get_post_meta( $post->ID, '_elementor_data', true );
	$elementor    = json_decode( $raw_elementor, true );
	if ( ! is_array( $elementor ) ) {
		return array(
			'status' => 'bad_elementor_data',
			'target' => $target,
			'post'   => $post,
		);
	}

	$post_content_counts = array();
	$elementor_counts    = array();
	$already_counts      = array();

	foreach ( $target['replacements'] as $index => $replacement ) {
		$already_needle = isset( $replacement['already'] ) ? $replacement['already'] : $replacement['new'];
		$post_content_counts[ $index ] = substr_count( $post->post_content, $replacement['old'] );
		$elementor_counts[ $index ]    = crd_phase3bc_refresh_count_in_elementor_node( $elementor, $replacement['old'] );
		$already_counts[ $index ]      = min(
			substr_count( $post->post_content, $already_needle ),
			crd_phase3bc_refresh_count_in_elementor_node( $elementor, $already_needle )
		);
	}

	$ready         = true;
	$already_done  = true;
	$partial_state = false;

	foreach ( $target['replacements'] as $index => $replacement ) {
		if ( 1 !== $post_content_counts[ $index ] || 1 !== $elementor_counts[ $index ] ) {
			$ready = false;
		}
		if ( $already_counts[ $index ] < 1 ) {
			$already_done = false;
		}
		if (
			( $post_content_counts[ $index ] || $elementor_counts[ $index ] )
			&& ( $already_counts[ $index ] || 1 !== $post_content_counts[ $index ] || 1 !== $elementor_counts[ $index ] )
		) {
			$partial_state = true;
		}
	}

	if ( $already_done ) {
		$status = 'skipped_already_applied';
	} elseif ( $ready ) {
		$status = 'ready';
	} elseif ( $partial_state ) {
		$status = 'partial_or_unexpected';
	} else {
		$status = 'text_not_found';
	}

	return array(
		'status'              => $status,
		'target'              => $target,
		'post'                => $post,
		'raw_elementor'       => $raw_elementor,
		'json_data'           => $elementor,
		'post_content_counts' => $post_content_counts,
		'elementor_counts'    => $elementor_counts,
		'already_counts'      => $already_counts,
	);
}

function crd_phase3bc_refresh_scan() {
	$results = array();

	foreach ( crd_phase3bc_refresh_targets() as $target ) {
		$results[] = crd_phase3bc_refresh_scan_single_target( $target );
	}

	return $results;
}

function crd_phase3bc_refresh_status_counts( $results ) {
	$counts = array(
		'ready'                   => 0,
		'updated'                 => 0,
		'skipped_already_applied' => 0,
		'not_found'               => 0,
		'bad_elementor_data'      => 0,
		'text_not_found'          => 0,
		'partial_or_unexpected'   => 0,
		'failed'                  => 0,
	);

	foreach ( $results as $result ) {
		if ( isset( $counts[ $result['status'] ] ) ) {
			$counts[ $result['status'] ]++;
		}
	}

	return $counts;
}

function crd_phase3bc_refresh_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_phase3bc_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_PHASE3BC_REFRESH_COMPLETED_OPTION ) ) {
		return new WP_Error( 'crd_phase3bc_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_phase3bc_refresh_scan();
	$counts  = crd_phase3bc_refresh_status_counts( $results );

	if ( $counts['not_found'] || $counts['bad_elementor_data'] || $counts['text_not_found'] || $counts['partial_or_unexpected'] ) {
		return array(
			'completed' => false,
			'results'   => $results,
			'message'   => 'Migration was not applied because one or more target posts are missing, changed, or already partially edited.',
		);
	}

	$backup = array(
		'created_at' => current_time( 'mysql' ),
		'targets'    => array(),
	);

	foreach ( $results as $result ) {
		if ( ! $result['post'] ) {
			continue;
		}

		$backup['targets'][] = array(
			'id'             => $result['post']->ID,
			'post_title'     => $result['post']->post_title,
			'post_name'      => $result['post']->post_name,
			'post_content'   => $result['post']->post_content,
			'elementor_data' => $result['raw_elementor'],
		);
	}

	update_option( CRD_PHASE3BC_REFRESH_BACKUP_OPTION, $backup, false );

	foreach ( $results as $index => $result ) {
		if ( 'skipped_already_applied' === $result['status'] ) {
			continue;
		}

		if ( 'ready' !== $result['status'] || ! $result['post'] ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		$post_content = $result['post']->post_content;
		foreach ( $result['target']['replacements'] as $replacement ) {
			$post_content = str_replace( $replacement['old'], $replacement['new'], $post_content, $count );
			if ( 1 !== $count ) {
				$results[ $index ]['status'] = 'failed';
				continue 2;
			}
		}

		$elementor_counts = array_fill( 0, count( $result['target']['replacements'] ), 0 );
		$elementor_data   = $result['json_data'];
		crd_phase3bc_refresh_replace_in_elementor_node( $elementor_data, $result['target']['replacements'], $elementor_counts );
		foreach ( $elementor_counts as $count ) {
			if ( 1 !== $count ) {
				$results[ $index ]['status'] = 'failed';
				continue 2;
			}
		}

		$updated_post = wp_update_post(
			array(
				'ID'           => $result['post']->ID,
				'post_content' => $post_content,
			),
			true
		);

		if ( is_wp_error( $updated_post ) ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		$updated_meta = update_post_meta( $result['post']->ID, '_elementor_data', wp_slash( wp_json_encode( $elementor_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ) );
		if ( false === $updated_meta ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		delete_post_meta( $result['post']->ID, '_elementor_element_cache' );
		clean_post_cache( $result['post']->ID );
		$results[ $index ]['status'] = 'updated';
	}

	$final_counts = crd_phase3bc_refresh_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'] && 0 === $final_counts['text_not_found'] && 0 === $final_counts['partial_or_unexpected'];

	if ( $completed ) {
		update_option(
			CRD_PHASE3BC_REFRESH_COMPLETED_OPTION,
			array(
				'completed_at' => current_time( 'mysql' ),
				'updated'      => $final_counts['updated'],
				'skipped'      => $final_counts['skipped_already_applied'],
			),
			false
		);
	}

	return array(
		'completed' => $completed,
		'results'   => $results,
		'message'   => $completed ? 'Migration completed.' : 'Migration did not complete because one or more updates failed.',
	);
}

function crd_phase3bc_refresh_add_admin_page() {
	add_management_page(
		'CRD Phase 3B+3C Content Refresh',
		'CRD Phase 3B+3C',
		'manage_options',
		'crd-phase3bc-content-refresh',
		'crd_phase3bc_refresh_render_admin_page'
	);
}

add_action( 'admin_menu', 'crd_phase3bc_refresh_add_admin_page' );

function crd_phase3bc_refresh_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_phase3bc_refresh_apply'] ) ) {
		check_admin_referer( CRD_PHASE3BC_REFRESH_NONCE_ACTION );
		$apply_result = crd_phase3bc_refresh_apply_migration();
	}

	$completed = get_option( CRD_PHASE3BC_REFRESH_COMPLETED_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_phase3bc_refresh_scan();
	$counts    = crd_phase3bc_refresh_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Phase 3B+3C Content Refresh</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>
		<p>This tool targets 13 approved English source posts and applies exactly 15 approved Phase 3B+3C items.</p>

		<?php if ( is_wp_error( $apply_result ) ) : ?>
			<div class="notice notice-error"><p><?php echo esc_html( $apply_result->get_error_message() ); ?></p></div>
		<?php elseif ( $apply_result ) : ?>
			<div class="<?php echo ! empty( $apply_result['completed'] ) ? 'notice notice-success' : 'notice notice-error'; ?>">
				<p><?php echo esc_html( $apply_result['message'] ); ?></p>
			</div>
		<?php endif; ?>

		<?php if ( $completed ) : ?>
			<div class="notice notice-info"><p>Migration is marked complete. Apply is disabled.</p></div>
		<?php endif; ?>

		<p>
			<strong>Counts:</strong>
			Ready <?php echo esc_html( $counts['ready'] ); ?> |
			Updated <?php echo esc_html( $counts['updated'] ); ?> |
			Already applied <?php echo esc_html( $counts['skipped_already_applied'] ); ?> |
			Not found <?php echo esc_html( $counts['not_found'] ); ?> |
			Bad Elementor data <?php echo esc_html( $counts['bad_elementor_data'] ); ?> |
			Text not found <?php echo esc_html( $counts['text_not_found'] ); ?> |
			Partial/unexpected <?php echo esc_html( $counts['partial_or_unexpected'] ); ?> |
			Failed <?php echo esc_html( $counts['failed'] ); ?>
		</p>

		<table class="widefat striped">
			<thead>
				<tr>
					<th>Status</th>
					<th>Post/Page</th>
					<th>Slug</th>
					<th>Approved Links</th>
					<th>Counts</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $results as $result ) : ?>
					<tr>
						<td><code><?php echo esc_html( $result['status'] ); ?></code></td>
						<td>
							<?php if ( ! empty( $result['post'] ) ) : ?>
								<?php echo esc_html( $result['post']->post_title ); ?> (#<?php echo esc_html( $result['post']->ID ); ?>)
							<?php else : ?>
								<?php echo esc_html( $result['target']['label'] ); ?>
							<?php endif; ?>
						</td>
						<td><code><?php echo esc_html( $result['target']['slug'] ); ?></code></td>
						<td>
							<?php foreach ( $result['target']['replacements'] as $replacement ) : ?>
								<div><?php echo esc_html( $replacement['anchor'] ); ?> -> <code><?php echo esc_html( $replacement['target'] ); ?></code></div>
							<?php endforeach; ?>
						</td>
						<td>
							<?php if ( isset( $result['post_content_counts'] ) ) : ?>
								<code>post_content <?php echo esc_html( implode( ',', $result['post_content_counts'] ) ); ?></code><br>
								<code>elementor <?php echo esc_html( implode( ',', $result['elementor_counts'] ) ); ?></code><br>
								<code>already <?php echo esc_html( implode( ',', $result['already_counts'] ) ); ?></code>
							<?php else : ?>
								&mdash;
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php if ( ! $completed ) : ?>
			<form method="post" style="margin-top: 20px;">
				<?php wp_nonce_field( CRD_PHASE3BC_REFRESH_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_phase3bc_refresh_apply" value="1">
				<button type="submit" class="button button-primary">Apply Phase 3B+3C Content Refresh</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
