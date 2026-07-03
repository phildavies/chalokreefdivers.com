<?php
/**
 * Plugin Name: CRD Phase 1 Internal Link Migration
 * Description: Temporary admin-only dry-run/apply tool for Phase 1 English internal-link edits.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CRD_PHASE1_LINKS_COMPLETED_OPTION', 'crd_phase1_internal_links_completed' );
define( 'CRD_PHASE1_LINKS_BACKUP_OPTION', 'crd_phase1_internal_links_backup' );
define( 'CRD_PHASE1_LINKS_NONCE_ACTION', 'crd_phase1_internal_links_apply' );

function crd_phase1_links_targets() {
	return array(
		array(
			'label'        => '10 Essential Tips for Beginner Divers',
			'slug'         => 'beginner-divers',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Try Scuba Diving',
					'target' => '/courses-on-koh-tao/try-scuba-diving/',
					'old'    => '<p>Starting your scuba diving journey is an exciting experience, especially in a place like Koh Tao. Whether you\'re completely new to diving or preparing for your first course, understanding the basics will help you feel more confident and get the most out of your experience.</p>',
					'new'    => '<p>Starting your scuba diving journey is an exciting experience, especially in a place like Koh Tao. Whether you\'re completely new to diving or preparing for your first course, understanding the basics will help you feel more confident and get the most out of your experience.</p>' . "\n" . '<p>If you are not ready for a full certification yet, <a href="/courses-on-koh-tao/try-scuba-diving/">Try Scuba Diving</a> is a relaxed first step before choosing a full course.</p>',
				),
			),
		),
		array(
			'label'        => '7 Reasons Why SSI Scuba Diving Certification Is Worth It',
			'slug'         => 'scuba-diving-certification',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'diving course on Koh Tao',
					'target' => '/courses-on-koh-tao/',
					'old'    => '<h2>Introduction To Scuba Diving And Getting Your Diving Certification On Koh Tao</h2><p>Scuba diving is not just a sport; it\'s an adventure into an unknown world. It\'s where you and your family can explore the underwater realm\'s mysteries, seeing things beyond the ordinary. One of the best places to start this journey is by obtaining an <a href="https://www.divessi.com/en/home" target="_blank" rel="noopener">SSI (Scuba Schools International)</a> Scuba Diving Certification.</p>',
					'new'    => '<h2>Introduction To Scuba Diving And Getting Your Diving Certification On Koh Tao</h2><p>Scuba diving is not just a sport; it\'s an adventure into an unknown world. It\'s where you and your family can explore the underwater realm\'s mysteries, seeing things beyond the ordinary. One of the best places to start this journey is by obtaining an <a href="https://www.divessi.com/en/home" target="_blank" rel="noopener">SSI (Scuba Schools International)</a> Scuba Diving Certification.</p><p>If you are comparing certification options, our <a href="/courses-on-koh-tao/">diving course on Koh Tao</a> overview is a useful place to see the main beginner and continuing-education routes.</p>',
				),
			),
		),
		array(
			'label'        => 'Koh Tao Diving on a Budget',
			'slug'         => 'koh-tao-diving-on-a-budget',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Open Water course',
					'target' => '/courses-on-koh-tao/open-water-course/',
					'old'    => 'For example, if you want to do the Open Water course at Koh Tao, look for dive shops that offer packages that include equipment rental, certification fees, and accommodation.',
					'new'    => 'For example, if you want to do the <a href="/courses-on-koh-tao/open-water-course/">Open Water course</a> at Koh Tao, look for dive shops that offer packages that include equipment rental, certification fees, and accommodation.',
				),
				array(
					'anchor' => 'Try Scuba Diving',
					'target' => '/courses-on-koh-tao/try-scuba-diving/',
					'old'    => 'Whether you\'re a beginner looking to try scuba diving on Koh Tao for the first time or an experienced diver aiming to complete the <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced course</strong></a>, Koh Tao offers affordable options for every budget.',
					'new'    => 'Whether you\'re a beginner looking to <a href="/courses-on-koh-tao/try-scuba-diving/">Try Scuba Diving</a> on Koh Tao for the first time or an experienced diver aiming to complete the <a href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced course</strong></a>, Koh Tao offers affordable options for every budget.',
				),
			),
		),
		array(
			'label'        => 'Pre-Dive Safety Checks',
			'slug'         => 'pre-dive-safety-check',
			'post_type'    => 'post',
			'lang'         => 'en',
			'replacements' => array(
				array(
					'anchor' => 'Stress & Rescue course',
					'target' => '/courses-on-koh-tao/stress-and-rescue-course/',
					'old'    => '<p>Engaging in scuba diving without proper checks can lead to hazardous situations. The pre-dive safety check is a diver\'s first defense against potential underwater emergencies. It ensures that all diving equipment is functioning correctly and that divers are prepared to handle any situation that may arise during the dive.</p>',
					'new'    => '<p>Engaging in scuba diving without proper checks can lead to hazardous situations. The pre-dive safety check is a diver\'s first defense against potential underwater emergencies. It ensures that all diving equipment is functioning correctly and that divers are prepared to handle any situation that may arise during the dive.</p><p>Divers who want to build stronger emergency awareness can continue into the <a href="/courses-on-koh-tao/stress-and-rescue-course/">Stress &amp; Rescue course</a>.</p>',
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
					'anchor' => 'Advanced diving course',
					'target' => '/courses-on-koh-tao/advanced-diving-course/',
					'old'    => '<p>Want to improve your underwater navigation skills? Check out our <a title="Advanced Diver Course on Koh Tao" href="https://chalokreefdivers.com/dive-courses-on-koh-tao/advanced-adventurer-course/"><strong>Advanced Diver course</strong></a> to take your skills to the next level or if you are already an Open Water or Advanced diver you can take the <a href="https://www.divessi.com/en/advanced-training/scuba-diving/navigation" target="_blank" rel="noopener">Navigation Specialty</a> Diver course!</p>',
					'new'    => '<p>Want to improve your underwater navigation skills? Check out our <a href="/courses-on-koh-tao/advanced-diving-course/">Advanced diving course</a> to take your skills to the next level.</p>',
				),
			),
		),
	);
}

function crd_phase1_links_page_has_language( $post_id, $lang ) {
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

function crd_phase1_links_find_post( $target ) {
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
	if ( ! $post || ! crd_phase1_links_page_has_language( $post->ID, $target['lang'] ) ) {
		return null;
	}

	return $post;
}

function crd_phase1_links_replace_in_elementor_node( &$node, $replacements, &$counts ) {
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
			crd_phase1_links_replace_in_elementor_node( $value, $replacements, $counts );
		}
	}
	unset( $value );
}

function crd_phase1_links_count_in_elementor_node( $node, $needle ) {
	$count = 0;

	if ( is_string( $node ) ) {
		return substr_count( $node, $needle );
	}

	if ( is_array( $node ) ) {
		foreach ( $node as $value ) {
			$count += crd_phase1_links_count_in_elementor_node( $value, $needle );
		}
	}

	return $count;
}

function crd_phase1_links_scan_single_target( $target ) {
	$post = crd_phase1_links_find_post( $target );
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
		$post_content_counts[ $index ] = substr_count( $post->post_content, $replacement['old'] );
		$elementor_counts[ $index ]    = crd_phase1_links_count_in_elementor_node( $elementor, $replacement['old'] );
		$already_counts[ $index ]      = min(
			substr_count( $post->post_content, $replacement['new'] ),
			crd_phase1_links_count_in_elementor_node( $elementor, $replacement['new'] )
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

function crd_phase1_links_scan() {
	$results = array();

	foreach ( crd_phase1_links_targets() as $target ) {
		$results[] = crd_phase1_links_scan_single_target( $target );
	}

	return $results;
}

function crd_phase1_links_status_counts( $results ) {
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

function crd_phase1_links_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_phase1_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_PHASE1_LINKS_COMPLETED_OPTION ) ) {
		return new WP_Error( 'crd_phase1_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_phase1_links_scan();
	$counts  = crd_phase1_links_status_counts( $results );

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

	update_option( CRD_PHASE1_LINKS_BACKUP_OPTION, $backup, false );

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
		crd_phase1_links_replace_in_elementor_node( $elementor_data, $result['target']['replacements'], $elementor_counts );
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

	$final_counts = crd_phase1_links_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'] && 0 === $final_counts['text_not_found'] && 0 === $final_counts['partial_or_unexpected'];

	if ( $completed ) {
		update_option(
			CRD_PHASE1_LINKS_COMPLETED_OPTION,
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

function crd_phase1_links_add_admin_page() {
	add_management_page(
		'CRD Phase 1 Internal Links',
		'CRD Phase 1 Links',
		'manage_options',
		'crd-phase1-internal-links',
		'crd_phase1_links_render_admin_page'
	);
}

add_action( 'admin_menu', 'crd_phase1_links_add_admin_page' );

function crd_phase1_links_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_phase1_links_apply'] ) ) {
		check_admin_referer( CRD_PHASE1_LINKS_NONCE_ACTION );
		$apply_result = crd_phase1_links_apply_migration();
	}

	$completed = get_option( CRD_PHASE1_LINKS_COMPLETED_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_phase1_links_scan();
	$counts    = crd_phase1_links_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Phase 1 Internal Links</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>
		<p>This tool only targets five published English posts by slug and updates both <code>post_content</code> and <code>_elementor_data</code>.</p>

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
					<th>Post</th>
					<th>Slug</th>
					<th>Links</th>
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
				<?php wp_nonce_field( CRD_PHASE1_LINKS_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_phase1_links_apply" value="1">
				<button type="submit" class="button button-primary">Apply Phase 1 Internal Links</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
