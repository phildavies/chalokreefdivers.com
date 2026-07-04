<?php
/**
 * Plugin Name: CRD Phase 3A Internal Link Migration
 * Description: Temporary admin-only dry-run/apply tool for Phase 3A-1 English blog-to-blog internal-link edits.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CRD_PHASE3A_LINKS_COMPLETED_OPTION', 'crd_phase3a_internal_links_completed' );
define( 'CRD_PHASE3A_LINKS_BACKUP_OPTION', 'crd_phase3a_internal_links_backup' );
define( 'CRD_PHASE3A_LINKS_NONCE_ACTION', 'crd_phase3a_internal_links_apply' );

function crd_phase3a_links_targets() {
	return array(
		array(
			'label'        => 'Is Koh Tao the Best Place to Learn Scuba Diving?',
			'slug'         => 'is-koh-tao-the-best-place-to-learn-scuba-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'beginners',
					'target' => '/beginner-divers/',
					'old'    => '<p>The majority of dive sites around Koh Tao are ideal for beginners, with gentle conditions and good visibility throughout most of the year.</p>',
					'new'    => '<p>The majority of dive sites around Koh Tao are ideal for <a href="/beginner-divers/">beginners</a>, with gentle conditions and good visibility throughout most of the year.</p>',
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
					'anchor' => 'essential diving theory and safety procedures',
					'target' => '/scuba-diving-skills/',
					'old'    => '<p>Before entering the water, you\'ll learn essential diving theory and safety procedures. Most beginners complete this through digital learning before starting their practical training.</p>',
					'new'    => '<p>Before entering the water, you\'ll learn <a href="/scuba-diving-skills/">essential diving theory and safety procedures</a>. Most beginners complete this through digital learning before starting their practical training.</p>',
				),
			),
		),
		array(
			'label'        => 'Snorkeling vs Scuba Diving',
			'slug'         => 'snorkeling-vs-scuba-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'one of the best places in the world to learn scuba diving',
					'target' => '/is-koh-tao-the-best-place-to-learn-scuba-diving/',
					'old'    => '<p>Koh Tao is one of the best places in the world to learn scuba diving because of its calm conditions, warm water, and abundance of marine life.</p>',
					'new'    => '<p>Koh Tao is <a href="/is-koh-tao-the-best-place-to-learn-scuba-diving/">one of the best places in the world to learn scuba diving</a> because of its calm conditions, warm water, and abundance of marine life.</p>',
				),
			),
		),
		array(
			'label'        => '7 Reasons Why SSI Scuba Diving Certification Is Worth It?',
			'slug'         => 'scuba-diving-certification',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'one of the best places to start this journey',
					'target' => '/is-koh-tao-the-best-place-to-learn-scuba-diving/',
					'old'    => 'One of the best places to start this journey is by obtaining an <a href="https://www.divessi.com/en/home" target="_blank" rel="noopener">SSI (Scuba Schools International)</a> Scuba Diving Certification.',
					'new'    => '<a href="/is-koh-tao-the-best-place-to-learn-scuba-diving/">One of the best places to start this journey</a> is by obtaining an <a href="https://www.divessi.com/en/home" target="_blank" rel="noopener">SSI (Scuba Schools International)</a> Scuba Diving Certification.',
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
					'anchor' => 'Proper equalisation',
					'target' => '/how-to-equalize-your-ears-while-scuba-diving/',
					'old'    => '<p>Proper equalisation is essential for safe descents. Learning to equalise early and often prevents discomfort and helps you dive confidently.</p>',
					'new'    => '<p><a href="/how-to-equalize-your-ears-while-scuba-diving/">Proper equalisation</a> is essential for safe descents. Learning to equalise early and often prevents discomfort and helps you dive confidently.</p>',
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
					'anchor' => 'key skill that all divers must master',
					'target' => '/scuba-diving-skills/',
					'old'    => 'It is a key skill that all divers must master for a smoother and safer diving experience.',
					'new'    => 'It is a <a href="/scuba-diving-skills/">key skill that all divers must master</a> for a smoother and safer diving experience.',
				),
			),
		),
		array(
			'label'        => 'Mastering Underwater Navigation',
			'slug'         => 'underwater-navigation',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'conserves air and energy',
					'target' => '/buoyancy-control/',
					'old'    => 'Navigating well also conserves air and energy.',
					'new'    => 'Navigating well also <a href="/buoyancy-control/">conserves air and energy</a>.',
				),
			),
		),
		array(
			'label'        => 'Underwater Photography Tips',
			'slug'         => 'underwater-photography',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'mastering buoyancy control',
					'target' => '/buoyancy-control/',
					'old'    => 'To capture sharp and well-composed underwater photos, mastering <a href="https://www.youtube.com/watch?v=qSDi_JPBTYU" target="_blank" rel="noopener">buoyancy control</a> and neutral buoyancy is crucial.',
					'new'    => 'To capture sharp and well-composed underwater photos, <a href="/buoyancy-control/">mastering buoyancy control</a> and neutral buoyancy is crucial.',
				),
			),
		),
		array(
			'label'        => 'Marine Life Photography',
			'slug'         => 'marine-life-photography',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Underwater photography',
					'target' => '/underwater-photography/',
					'old'    => 'Underwater photography is a mesmerizing art form that allows us to capture the enchanting world beneath the waves.',
					'new'    => '<a href="/underwater-photography/">Underwater photography</a> is a mesmerizing art form that allows us to capture the enchanting world beneath the waves.',
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
					'anchor' => 'navigation',
					'target' => '/underwater-navigation/',
					'old'    => 'Whether it\'s honing specific skills like underwater photography, navigation, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the Divemaster or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
					'new'    => 'Whether it\'s honing specific skills like underwater photography, <a href="/underwater-navigation/">navigation</a>, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the Divemaster or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
					'variants' => array(
						array(
							'old' => 'Whether it\'s honing specific skills like underwater photography, navigation, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the Divemaster or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
							'new' => 'Whether it\'s honing specific skills like underwater photography, <a href="/underwater-navigation/">navigation</a>, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the Divemaster or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
						),
						array(
							'old' => 'Whether it\'s honing specific skills like underwater photography, navigation, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the <a href="/courses-on-koh-tao/divemaster-course-koh-tao/">Divemaster course</a> or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
							'new' => 'Whether it\'s honing specific skills like underwater photography, <a href="/underwater-navigation/">navigation</a>, search and recovery, exploring specialized areas of diving, or preparing for professional-level certifications like the <a href="/courses-on-koh-tao/divemaster-course-koh-tao/">Divemaster course</a> or Instructor qualifications, there are courses tailored to meet the diverse needs of advanced adventurers.',
						),
					),
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
					'anchor' => 'dive planning',
					'target' => '/pre-dive-safety-check/',
					'old'    => 'Effective <a title="What is Dive Planning?" href="https://en.wikipedia.org/wiki/Dive_planning" target="_blank" rel="noopener">dive planning</a> is key to safety.',
					'new'    => 'Effective <a href="/pre-dive-safety-check/">dive planning</a> is key to safety.',
				),
				array(
					'anchor' => 'Good buoyancy control',
					'target' => '/buoyancy-control/',
					'old'    => 'Good buoyancy control is essential for every diver.',
					'new'    => '<a href="/buoyancy-control/">Good buoyancy control</a> is essential for every diver.',
				),
			),
		),
		array(
			'label'        => 'Pre-Dive Safety Check',
			'slug'         => 'pre-dive-safety-check',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'safety knowledge',
					'target' => '/diving-safety/',
					'old'    => 'Always consult your dive shop for guidance and training to enhance your diving skills and safety knowledge.',
					'new'    => 'Always consult your dive shop for guidance and training to enhance your diving skills and <a href="/diving-safety/">safety knowledge</a>.',
				),
			),
		),
		array(
			'label'        => 'Scuba Diving and Mental Health',
			'slug'         => 'scuba-diving-and-mental-health',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'mental health benefits of diving',
					'target' => '/benefits-of-scuba-diving-koh-tao/',
					'old'    => 'To fully enjoy the mental health benefits of diving, it\'s crucial to have the right equipment.',
					'new'    => 'To fully enjoy the <a href="/benefits-of-scuba-diving-koh-tao/">mental health benefits of diving</a>, it\'s crucial to have the right equipment.',
				),
			),
		),
		array(
			'label'        => 'How to Equalize Your Ears While Scuba Diving',
			'slug'         => 'how-to-equalize-your-ears-while-scuba-diving',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'comfortable and safe dive',
					'target' => '/diving-safety/',
					'old'    => 'Proper ear equalization is crucial to ensure a comfortable and safe dive.',
					'new'    => 'Proper ear equalization is crucial to ensure a <a href="/diving-safety/">comfortable and safe dive</a>.',
				),
			),
		),
	);
}

function crd_phase3a_links_page_has_language( $post_id, $lang ) {
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

function crd_phase3a_links_find_post( $target ) {
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
	if ( ! $post || ! crd_phase3a_links_page_has_language( $post->ID, $target['lang'] ) ) {
		return null;
	}

	return $post;
}

function crd_phase3a_links_replace_in_elementor_node( &$node, $replacements, &$counts ) {
	if ( ! is_array( $node ) ) {
		return;
	}

	foreach ( $node as &$value ) {
		if ( is_string( $value ) ) {
			foreach ( $replacements as $index => $replacement ) {
				foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
					if ( false !== strpos( $value, $variant['old'] ) ) {
						$value = str_replace( $variant['old'], $variant['new'], $value, $count );
						$counts[ $index ] += $count;
					}
				}
			}
		} elseif ( is_array( $value ) ) {
			crd_phase3a_links_replace_in_elementor_node( $value, $replacements, $counts );
		}
	}
	unset( $value );
}

function crd_phase3a_links_replacement_variants( $replacement ) {
	if ( isset( $replacement['variants'] ) && is_array( $replacement['variants'] ) ) {
		return $replacement['variants'];
	}

	return array(
		array(
			'old' => $replacement['old'],
			'new' => $replacement['new'],
		),
	);
}

function crd_phase3a_links_count_in_elementor_node( $node, $needle ) {
	$count = 0;

	if ( is_string( $node ) ) {
		return substr_count( $node, $needle );
	}

	if ( is_array( $node ) ) {
		foreach ( $node as $value ) {
			$count += crd_phase3a_links_count_in_elementor_node( $value, $needle );
		}
	}

	return $count;
}

function crd_phase3a_links_count_replacement_old_in_content( $content, $replacement ) {
	$count = 0;

	foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
		$count += substr_count( $content, $variant['old'] );
	}

	return $count;
}

function crd_phase3a_links_count_replacement_old_in_elementor( $elementor, $replacement ) {
	$count = 0;

	foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
		$count += crd_phase3a_links_count_in_elementor_node( $elementor, $variant['old'] );
	}

	return $count;
}

function crd_phase3a_links_count_already_in_content( $content, $replacement ) {
	if ( isset( $replacement['already'] ) ) {
		return substr_count( $content, $replacement['already'] );
	}

	$count = 0;
	foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
		$count += substr_count( $content, $variant['new'] );
	}

	return $count;
}

function crd_phase3a_links_count_already_in_elementor( $elementor, $replacement ) {
	if ( isset( $replacement['already'] ) ) {
		return crd_phase3a_links_count_in_elementor_node( $elementor, $replacement['already'] );
	}

	$count = 0;
	foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
		$count += crd_phase3a_links_count_in_elementor_node( $elementor, $variant['new'] );
	}

	return $count;
}

function crd_phase3a_links_apply_replacement_to_content( $content, $replacement, &$count ) {
	$count = 0;

	foreach ( crd_phase3a_links_replacement_variants( $replacement ) as $variant ) {
		$content = str_replace( $variant['old'], $variant['new'], $content, $variant_count );
		$count  += $variant_count;
	}

	return $content;
}

function crd_phase3a_links_scan_single_target( $target ) {
	$post = crd_phase3a_links_find_post( $target );
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
		$post_content_counts[ $index ] = crd_phase3a_links_count_replacement_old_in_content( $post->post_content, $replacement );
		$elementor_counts[ $index ]    = crd_phase3a_links_count_replacement_old_in_elementor( $elementor, $replacement );
		$already_counts[ $index ]      = min(
			crd_phase3a_links_count_already_in_content( $post->post_content, $replacement ),
			crd_phase3a_links_count_already_in_elementor( $elementor, $replacement )
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

function crd_phase3a_links_scan() {
	$results = array();

	foreach ( crd_phase3a_links_targets() as $target ) {
		$results[] = crd_phase3a_links_scan_single_target( $target );
	}

	return $results;
}

function crd_phase3a_links_status_counts( $results ) {
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

function crd_phase3a_links_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_phase3a_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_PHASE3A_LINKS_COMPLETED_OPTION ) ) {
		return new WP_Error( 'crd_phase3a_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_phase3a_links_scan();
	$counts  = crd_phase3a_links_status_counts( $results );

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

	update_option( CRD_PHASE3A_LINKS_BACKUP_OPTION, $backup, false );

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
			$post_content = crd_phase3a_links_apply_replacement_to_content( $post_content, $replacement, $count );
			if ( 1 !== $count ) {
				$results[ $index ]['status'] = 'failed';
				continue 2;
			}
		}

		$elementor_counts = array_fill( 0, count( $result['target']['replacements'] ), 0 );
		$elementor_data   = $result['json_data'];
		crd_phase3a_links_replace_in_elementor_node( $elementor_data, $result['target']['replacements'], $elementor_counts );
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

	$final_counts = crd_phase3a_links_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'] && 0 === $final_counts['text_not_found'] && 0 === $final_counts['partial_or_unexpected'];

	if ( $completed ) {
		update_option(
			CRD_PHASE3A_LINKS_COMPLETED_OPTION,
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

function crd_phase3a_links_add_admin_page() {
	add_management_page(
		'CRD Phase 3A Internal Links',
		'CRD Phase 3A Links',
		'manage_options',
		'crd-phase3a-internal-links',
		'crd_phase3a_links_render_admin_page'
	);
}

add_action( 'admin_menu', 'crd_phase3a_links_add_admin_page' );

function crd_phase3a_links_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_phase3a_links_apply'] ) ) {
		check_admin_referer( CRD_PHASE3A_LINKS_NONCE_ACTION );
		$apply_result = crd_phase3a_links_apply_migration();
	}

	$completed = get_option( CRD_PHASE3A_LINKS_COMPLETED_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_phase3a_links_scan();
	$counts    = crd_phase3a_links_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Phase 3A Internal Links</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>
		<p>This tool targets 15 approved English blog-to-blog contextual body-link actions across 14 source pages/posts.</p>

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
				<?php wp_nonce_field( CRD_PHASE3A_LINKS_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_phase3a_links_apply" value="1">
				<button type="submit" class="button button-primary">Apply Phase 3A Internal Links</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
