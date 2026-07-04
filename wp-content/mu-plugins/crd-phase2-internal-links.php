<?php
/**
 * Plugin Name: CRD Phase 2 Internal Link Migration
 * Description: Temporary admin-only dry-run/apply tool for Phase 2 English internal-link edits.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CRD_PHASE2_LINKS_COMPLETED_OPTION', 'crd_phase2_internal_links_completed' );
define( 'CRD_PHASE2_LINKS_BACKUP_OPTION', 'crd_phase2_internal_links_backup' );
define( 'CRD_PHASE2_LINKS_NONCE_ACTION', 'crd_phase2_internal_links_apply' );

function crd_phase2_links_targets() {
	return array(
		array(
			'label'        => 'Benefits of Scuba Diving Koh Tao',
			'slug'         => 'benefits-of-scuba-diving-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Open Water course',
					'target' => '/courses-on-koh-tao/open-water-course/',
					'old'    => 'The <a title="SSI Open Water Course" href="https://www.divessi.com/en/get-certified/scuba-diving/open-water-diver" target="_blank" rel="noopener">Open Water course</a> Koh Tao is a popular starting point for many divers, offering thorough training and unforgettable experiences.',
					'new'    => 'The <a href="/courses-on-koh-tao/open-water-course/">Open Water course</a> Koh Tao is a popular starting point for many divers, offering thorough training and unforgettable experiences.',
				),
				array(
					'anchor' => 'Stress & Rescue course',
					'target' => '/courses-on-koh-tao/stress-and-rescue-course/',
					'old'    => '<p>One of the primary psychological benefits of scuba diving is its ability to reduce stress. The serene underwater environment and the slow and controlled breathing required during diving can help calm your mind. Open water Koh Tao is known for its clear waters and vibrant marine life, making it an ideal spot for stress relief. The rhythmic breathing helps lower your heart rate and reduce anxiety, allowing you to feel more relaxed and at peace.</p>',
					'new'    => '<p>One of the primary psychological benefits of scuba diving is its ability to reduce stress. The serene underwater environment and the slow and controlled breathing required during diving can help calm your mind. Open water Koh Tao is known for its clear waters and vibrant marine life, making it an ideal spot for stress relief. The rhythmic breathing helps lower your heart rate and reduce anxiety, allowing you to feel more relaxed and at peace.</p><p>Divers who want to build more confidence in handling problems underwater can continue into the <a href="/courses-on-koh-tao/stress-and-rescue-course/">Stress &amp; Rescue course</a>.</p>',
				),
			),
		),
		array(
			'label'        => 'Buoyancy Control Mastery',
			'slug'         => 'buoyancy-control',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Looking to enhance your diving skills? Check out our <a href="https://chalokreefdivers.com/courses-on-koh-tao/advanced-diving-course/"><strong>Advanced Diver course</strong></a> and take your diving experience to the next level!</p>',
					'new'    => '<p>Looking to enhance your diving skills? Check out our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> and take your diving experience to the next level!</p>',
				),
			),
		),
		array(
			'label'        => 'Cave Diving',
			'slug'         => 'cave-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => 'The Advanced Open Water course Koh Tao (AOW Koh Tao) provides essential training on deep diving and underwater navigation, which are critical skills for cave diving.',
					'new'    => 'The <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> provides essential training on deep diving and underwater navigation, which are critical skills for cave diving.',
				),
				array(
					'anchor' => 'Stress & Rescue course',
					'target' => '/courses-on-koh-tao/stress-and-rescue-course/',
					'old'    => '<p>Prepare for emergencies by practising procedures regularly. Know how to handle equipment failure, loss of visibility, or getting lost. Familiarize yourself with the cave\'s layout and have an emergency exit strategy.</p>',
					'new'    => '<p>Prepare for emergencies by practising procedures regularly. Know how to handle equipment failure, loss of visibility, or getting lost. Familiarize yourself with the cave\'s layout and have an emergency exit strategy.</p><p>For divers who want stronger emergency awareness before more challenging dives, the <a href="/courses-on-koh-tao/stress-and-rescue-course/">Stress &amp; Rescue course</a> is a sensible next step.</p>',
				),
			),
		),
		array(
			'label'        => 'Chalok Reef Diver Hostel',
			'slug'         => 'chalok-reef-diver-hostel',
			'post_type'    => 'page',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'scuba diving course',
					'target' => '/courses-on-koh-tao/',
					'old'    => 'full scuba diving course',
					'new'    => 'full <a href="/courses-on-koh-tao/">scuba diving course</a>',
				),
				array(
					'anchor' => 'Open Water Diver Course',
					'target' => '/courses-on-koh-tao/open-water-course/',
					'old'    => 'SSI Open Water Diver Course in Koh Tao',
					'new'    => 'Open Water Diver Course',
					'already' => 'Open Water Diver Course</strong>',
				),
			),
		),
		array(
			'label'        => 'Aow Leuk Bay',
			'slug'         => 'aow-leuk-bay-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Try Scuba Diving',
					'target' => '/courses-on-koh-tao/try-scuba-diving/',
					'old'    => '<p>Hidden on Koh Tao\'s eastern coast, Aow Leuk Bay is the island\'s best-kept secret. Unlike busier beaches, this crescent-shaped bay mixes powder-soft sand with water so transparent you can see the bottom from shore. With over 80% of measured locations exhibiting great coral cover, the coral reefs here are among Koh Tao\'s healthiest. Aow Leuk offers an underwater experience that is both accessible and amazing whether you are logging your hundredth dive or snorkeling for the first time. Let\'s look at what distinguishes this bay.</p>',
					'new'    => '<p>Hidden on Koh Tao\'s eastern coast, Aow Leuk Bay is the island\'s best-kept secret. Unlike busier beaches, this crescent-shaped bay mixes powder-soft sand with water so transparent you can see the bottom from shore. With over 80% of measured locations exhibiting great coral cover, the coral reefs here are among Koh Tao\'s healthiest. Aow Leuk offers an underwater experience that is both accessible and amazing whether you are logging your hundredth dive or snorkeling for the first time. Let\'s look at what distinguishes this bay.</p><p>If you are not certified yet, <a href="/courses-on-koh-tao/try-scuba-diving/">Try Scuba Diving</a> is a relaxed way to experience a calm Koh Tao dive site for the first time.</p>',
				),
				array(
					'anchor' => 'Open Water course',
					'target' => '/courses-on-koh-tao/open-water-course/',
					'old'    => 'Several diving schools use the western shore of the bay for open-water certification; its consistent conditions and gradual slope enable 90% of pupils to accomplish skills on their first try.',
					'new'    => 'Several diving schools use the western shore of the bay for the <a href="/courses-on-koh-tao/open-water-course/">Open Water course</a>; its consistent conditions and gradual slope enable 90% of pupils to accomplish skills on their first try.',
				),
			),
		),
		array(
			'label'        => 'Altitude Diving',
			'slug'         => 'altitude-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Ready to explore the wonders of altitude diving? Join our <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Adventure Diver course</strong></a> to ensure a safe and thrilling high-altitude diving experience!</p>',
					'new'    => '<p>Ready to explore the wonders of altitude diving? Join our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> to ensure a safe and thrilling high-altitude diving experience!</p>',
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
					'anchor' => 'Deep Diving specialty',
					'target' => '/courses-on-koh-tao/ssi-deep-diving-specialty/',
					'old'    => 'Koh Tao offers a variety of advanced diving courses, including the Advanced Open Water Diver course, specialty courses such as deep diving and wreck diving, and professional-level training for those looking to become dive instructors.',
					'new'    => 'Koh Tao offers a variety of advanced diving courses, including the Advanced Open Water Diver course, specialty courses such as the <a href="/courses-on-koh-tao/ssi-deep-diving-specialty/">Deep Diving specialty</a> and wreck diving, and professional-level training for those looking to become dive instructors.',
				),
				array(
					'anchor' => 'Divemaster course',
					'target' => '/courses-on-koh-tao/divemaster-course-koh-tao/',
					'old'    => 'Whether it\'s honing specific skills like underwater photography, navigation, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the Divemaster or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
					'new'    => 'Whether it\'s honing specific skills like underwater photography, navigation, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the <a href="/courses-on-koh-tao/divemaster-course-koh-tao/">Divemaster course</a> or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
				),
			),
		),
		array(
			'label'        => 'Mango Bay Dive Site',
			'slug'         => 'mango-bay-dive-site-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Try Scuba Diving',
					'target' => '/courses-on-koh-tao/try-scuba-diving/',
					'old'    => 'Mango Bay is where countless scuba divers take their first breaths underwater in the ocean on a <a title="SSI Try Diving Experience" href="https://chalokreefdivers.com/courses-on-koh-tao/try-scuba-diving/">Try Diving Experience</a> or the <a title="SSI Open Water Course on Koh Tao" href="https://chalokreefdivers.com/courses-on-koh-tao/open-water-course/">Open Water course</a>.',
					'new'    => 'Mango Bay is where countless scuba divers take their first breaths underwater in the ocean on <a href="/courses-on-koh-tao/try-scuba-diving/">Try Scuba Diving</a> or the <a title="SSI Open Water Course on Koh Tao" href="https://chalokreefdivers.com/courses-on-koh-tao/open-water-course/">Open Water course</a>.',
				),
			),
		),
		array(
			'label'        => 'Southwest Pinnacle Dive Site',
			'slug'         => 'southwest-pinnacle-dive-site-koh-tao',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Nitrox specialty',
					'target' => '/courses-on-koh-tao/nitrox-diving-specialty/',
					'old'    => 'It\'s commonly used for deep dive training, Nitrox specialty courses, and safety stop practice.',
					'new'    => 'It\'s commonly used for deep dive training, <a href="/courses-on-koh-tao/nitrox-diving-specialty/">Nitrox specialty</a> courses, and safety stop practice.',
				),
			),
		),
		array(
			'label'        => 'Master Scuba Diver',
			'slug'         => 'master-scuba-diver',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Rescue Diver course',
					'target' => '/courses-on-koh-tao/stress-and-rescue-course/',
					'old'    => 'The Rescue Diver course is important to becoming a Master Scuba Diver.',
					'new'    => 'The <a href="/courses-on-koh-tao/stress-and-rescue-course/">Rescue Diver course</a> is important to becoming a Master Scuba Diver.',
				),
			),
		),
	);
}

function crd_phase2_links_page_has_language( $post_id, $lang ) {
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

function crd_phase2_links_find_post( $target ) {
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
	if ( ! $post || ! crd_phase2_links_page_has_language( $post->ID, $target['lang'] ) ) {
		return null;
	}

	return $post;
}

function crd_phase2_links_replace_in_elementor_node( &$node, $replacements, &$counts ) {
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
			crd_phase2_links_replace_in_elementor_node( $value, $replacements, $counts );
		}
	}
	unset( $value );
}

function crd_phase2_links_count_in_elementor_node( $node, $needle ) {
	$count = 0;

	if ( is_string( $node ) ) {
		return substr_count( $node, $needle );
	}

	if ( is_array( $node ) ) {
		foreach ( $node as $value ) {
			$count += crd_phase2_links_count_in_elementor_node( $value, $needle );
		}
	}

	return $count;
}

function crd_phase2_links_scan_single_target( $target ) {
	$post = crd_phase2_links_find_post( $target );
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
		$elementor_counts[ $index ]    = crd_phase2_links_count_in_elementor_node( $elementor, $replacement['old'] );
		$already_counts[ $index ]      = min(
			substr_count( $post->post_content, $already_needle ),
			crd_phase2_links_count_in_elementor_node( $elementor, $already_needle )
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

function crd_phase2_links_scan() {
	$results = array();

	foreach ( crd_phase2_links_targets() as $target ) {
		$results[] = crd_phase2_links_scan_single_target( $target );
	}

	return $results;
}

function crd_phase2_links_status_counts( $results ) {
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

function crd_phase2_links_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_phase2_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_PHASE2_LINKS_COMPLETED_OPTION ) ) {
		return new WP_Error( 'crd_phase2_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_phase2_links_scan();
	$counts  = crd_phase2_links_status_counts( $results );

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

	update_option( CRD_PHASE2_LINKS_BACKUP_OPTION, $backup, false );

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
		crd_phase2_links_replace_in_elementor_node( $elementor_data, $result['target']['replacements'], $elementor_counts );
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

	$final_counts = crd_phase2_links_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'] && 0 === $final_counts['text_not_found'] && 0 === $final_counts['partial_or_unexpected'];

	if ( $completed ) {
		update_option(
			CRD_PHASE2_LINKS_COMPLETED_OPTION,
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

function crd_phase2_links_add_admin_page() {
	add_management_page(
		'CRD Phase 2 Internal Links',
		'CRD Phase 2 Links',
		'manage_options',
		'crd-phase2-internal-links',
		'crd_phase2_links_render_admin_page'
	);
}

add_action( 'admin_menu', 'crd_phase2_links_add_admin_page' );

function crd_phase2_links_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_phase2_links_apply'] ) ) {
		check_admin_referer( CRD_PHASE2_LINKS_NONCE_ACTION );
		$apply_result = crd_phase2_links_apply_migration();
	}

	$completed = get_option( CRD_PHASE2_LINKS_COMPLETED_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_phase2_links_scan();
	$counts    = crd_phase2_links_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Phase 2 Internal Links</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>
		<p>This tool targets 10 approved English source pages/posts and applies exactly 15 contextual body-link actions.</p>

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
				<?php wp_nonce_field( CRD_PHASE2_LINKS_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_phase2_links_apply" value="1">
				<button type="submit" class="button button-primary">Apply Phase 2 Internal Links</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
