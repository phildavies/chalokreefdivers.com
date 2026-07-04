<?php
/**
 * Plugin Name: CRD Phase 4A SEO Polish Migration
 * Description: Temporary admin-only dry-run/apply tool for approved Phase 4A English title, heading, meta, and small readability fixes.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CRD_PHASE4A_POLISH_COMPLETED_OPTION', 'crd_phase4a_seo_polish_completed' );
define( 'CRD_PHASE4A_POLISH_BACKUP_OPTION', 'crd_phase4a_seo_polish_backup' );
define( 'CRD_PHASE4A_POLISH_NONCE_ACTION', 'crd_phase4a_seo_polish_apply' );

function crd_phase4a_polish_targets() {
	return array(
		array(
			'label'     => 'Underwater Photography',
			'slug'      => 'underwater-photography',
			'post_type' => 'post',
			'lang'      => 'en',
			'title_meta' => array(
				array(
					'label' => 'Rank Math SEO title',
					'key'   => 'rank_math_title',
					'old'   => 'Underwater Photography %page% %sep% %sitename%',
					'new'   => 'Underwater Photography Tips for Better Dive Photos',
				),
			),
			'replacements' => array(
				array(
					'label' => 'Fix trailing typo',
					'old'   => 'surrounds you.f',
					'new'   => 'surrounds you.',
					'already' => 'surrounds you.</p>',
				),
			),
		),
		array(
			'label'      => 'Buoyancy Control',
			'slug'       => 'buoyancy-control',
			'post_type'  => 'post',
			'lang'       => 'en',
			'post_title' => array(
				'old' => 'Buoyancy Control Mastery: Enhance Your Diving Skills for Better Underwater Control',
				'new' => 'Buoyancy Control for Scuba Divers',
			),
		),
		array(
			'label'     => 'Scuba Diving Certification',
			'slug'      => 'scuba-diving-certification',
			'post_type' => 'post',
			'lang'      => 'en',
			'replacements' => array(
				array(
					'label' => 'Shorten opening H2',
					'old'   => '<h2>Introduction To Scuba Diving And Getting Your Diving Certification On Koh Tao</h2>',
					'new'   => '<h2>Getting Your Scuba Diving Certification on Koh Tao</h2>',
				),
			),
		),
		array(
			'label'     => 'Snorkeling vs Scuba Diving',
			'slug'      => 'snorkeling-vs-scuba-diving',
			'post_type' => 'post',
			'lang'      => 'en',
			'title_meta' => array(
				array(
					'label' => 'Rank Math meta description',
					'key'   => 'rank_math_description',
					'old'   => 'Discover the key differences between snorkeling vs scuba diving, including gear, training, and depth levels, to choose the best underwater adventure for you.',
					'new'   => 'Compare snorkeling vs scuba diving in Koh Tao, including gear, training, depth, and the best option for first-time divers.',
				),
			),
		),
	);
}

function crd_phase4a_polish_page_has_language( $post_id, $lang ) {
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

function crd_phase4a_polish_find_post( $target ) {
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

	$post = $post_id ? get_post( (int) $post_id ) : null;
	if ( ! $post || ! crd_phase4a_polish_page_has_language( $post->ID, $target['lang'] ) ) {
		return null;
	}

	return $post;
}

function crd_phase4a_polish_replace_in_elementor_node( &$node, $replacements, &$counts ) {
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
			crd_phase4a_polish_replace_in_elementor_node( $value, $replacements, $counts );
		}
	}
	unset( $value );
}

function crd_phase4a_polish_count_in_elementor_node( $node, $needle ) {
	$count = 0;

	if ( is_string( $node ) ) {
		return substr_count( $node, $needle );
	}

	if ( is_array( $node ) ) {
		foreach ( $node as $value ) {
			$count += crd_phase4a_polish_count_in_elementor_node( $value, $needle );
		}
	}

	return $count;
}

function crd_phase4a_polish_scan_single_target( $target ) {
	$post = crd_phase4a_polish_find_post( $target );
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

	$checks = array();

	if ( isset( $target['post_title'] ) ) {
		$checks[] = array(
			'type'    => 'post_title',
			'label'   => 'Post title',
			'old_hit' => $post->post_title === $target['post_title']['old'] ? 1 : 0,
			'new_hit' => $post->post_title === $target['post_title']['new'] ? 1 : 0,
		);
	}

	foreach ( isset( $target['title_meta'] ) ? $target['title_meta'] : array() as $meta ) {
		$value = get_post_meta( $post->ID, $meta['key'], true );
		$checks[] = array(
			'type'    => 'meta',
			'label'   => $meta['label'],
			'key'     => $meta['key'],
			'old_hit' => $value === $meta['old'] ? 1 : 0,
			'new_hit' => $value === $meta['new'] ? 1 : 0,
		);
	}

	foreach ( isset( $target['replacements'] ) ? $target['replacements'] : array() as $replacement ) {
		$post_count      = substr_count( $post->post_content, $replacement['old'] );
		$elementor_count = crd_phase4a_polish_count_in_elementor_node( $elementor, $replacement['old'] );
		$already_count   = min(
			substr_count( $post->post_content, isset( $replacement['already'] ) ? $replacement['already'] : $replacement['new'] ),
			crd_phase4a_polish_count_in_elementor_node( $elementor, isset( $replacement['already'] ) ? $replacement['already'] : $replacement['new'] )
		);

		$checks[] = array(
			'type'            => 'content',
			'label'           => $replacement['label'],
			'old_hit'         => 1 === $post_count && 1 === $elementor_count ? 1 : 0,
			'new_hit'         => $already_count,
			'post_count'      => $post_count,
			'elementor_count' => $elementor_count,
		);
	}

	$ready         = true;
	$already_done  = true;
	$partial_state = false;

	foreach ( $checks as $check ) {
		if ( 1 !== $check['old_hit'] ) {
			$ready = false;
		}
		if ( $check['new_hit'] < 1 ) {
			$already_done = false;
		}
		if ( ( $check['old_hit'] || $check['new_hit'] ) && ( 1 !== $check['old_hit'] || $check['new_hit'] ) ) {
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
		'status'        => $status,
		'target'        => $target,
		'post'          => $post,
		'raw_elementor' => $raw_elementor,
		'json_data'     => $elementor,
		'checks'        => $checks,
	);
}

function crd_phase4a_polish_scan() {
	$results = array();

	foreach ( crd_phase4a_polish_targets() as $target ) {
		$results[] = crd_phase4a_polish_scan_single_target( $target );
	}

	return $results;
}

function crd_phase4a_polish_status_counts( $results ) {
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

function crd_phase4a_polish_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_phase4a_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_PHASE4A_POLISH_COMPLETED_OPTION ) ) {
		return new WP_Error( 'crd_phase4a_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_phase4a_polish_scan();
	$counts  = crd_phase4a_polish_status_counts( $results );

	if ( $counts['not_found'] || $counts['bad_elementor_data'] || $counts['text_not_found'] || $counts['partial_or_unexpected'] ) {
		return array(
			'completed' => false,
			'results'   => $results,
			'message'   => 'Migration was not applied because one or more targets are missing, changed, or already partially edited.',
		);
	}

	$backup = array(
		'created_at' => current_time( 'mysql' ),
		'targets'    => array(),
	);

	foreach ( $results as $result ) {
		if ( empty( $result['post'] ) || 'skipped_already_applied' === $result['status'] ) {
			continue;
		}

		$backup['targets'][] = array(
			'post_id'       => $result['post']->ID,
			'post_title'    => $result['post']->post_title,
			'post_name'     => $result['post']->post_name,
			'post_content'  => $result['post']->post_content,
			'raw_elementor' => $result['raw_elementor'],
			'meta'          => array(
				'rank_math_title'       => get_post_meta( $result['post']->ID, 'rank_math_title', true ),
				'rank_math_description' => get_post_meta( $result['post']->ID, 'rank_math_description', true ),
			),
		);
	}

	update_option( CRD_PHASE4A_POLISH_BACKUP_OPTION, $backup, false );

	foreach ( $results as $index => $result ) {
		if ( 'skipped_already_applied' === $result['status'] ) {
			continue;
		}

		if ( 'ready' !== $result['status'] || ! $result['post'] ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		$post_update = array( 'ID' => $result['post']->ID );
		if ( isset( $result['target']['post_title'] ) ) {
			$post_update['post_title'] = $result['target']['post_title']['new'];
		}

		$post_content = $result['post']->post_content;
		foreach ( isset( $result['target']['replacements'] ) ? $result['target']['replacements'] : array() as $replacement ) {
			$post_content = str_replace( $replacement['old'], $replacement['new'], $post_content, $count );
			if ( 1 !== $count ) {
				$results[ $index ]['status'] = 'failed';
				continue 2;
			}
		}
		$post_update['post_content'] = $post_content;

		$updated_post = wp_update_post( $post_update, true );
		if ( is_wp_error( $updated_post ) ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		foreach ( isset( $result['target']['title_meta'] ) ? $result['target']['title_meta'] : array() as $meta ) {
			update_post_meta( $result['post']->ID, $meta['key'], $meta['new'] );
		}

		$elementor_counts = array_fill( 0, count( isset( $result['target']['replacements'] ) ? $result['target']['replacements'] : array() ), 0 );
		$elementor_data   = $result['json_data'];
		crd_phase4a_polish_replace_in_elementor_node( $elementor_data, isset( $result['target']['replacements'] ) ? $result['target']['replacements'] : array(), $elementor_counts );
		foreach ( $elementor_counts as $count ) {
			if ( 1 !== $count ) {
				$results[ $index ]['status'] = 'failed';
				continue 2;
			}
		}

		update_post_meta( $result['post']->ID, '_elementor_data', wp_slash( wp_json_encode( $elementor_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ) );
		delete_post_meta( $result['post']->ID, '_elementor_element_cache' );
		clean_post_cache( $result['post']->ID );

		$results[ $index ]['status'] = 'updated';
	}

	$final_counts = crd_phase4a_polish_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'] && 0 === $final_counts['text_not_found'] && 0 === $final_counts['partial_or_unexpected'];

	if ( $completed ) {
		update_option(
			CRD_PHASE4A_POLISH_COMPLETED_OPTION,
			array(
				'completed_at' => current_time( 'mysql' ),
				'updated'      => $final_counts['updated'],
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

function crd_phase4a_polish_add_admin_page() {
	add_management_page(
		'CRD Phase 4A SEO Polish',
		'CRD Phase 4A SEO Polish',
		'manage_options',
		'crd-phase4a-seo-polish',
		'crd_phase4a_polish_render_admin_page'
	);
}

add_action( 'admin_menu', 'crd_phase4a_polish_add_admin_page' );

function crd_phase4a_polish_render_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_phase4a_polish_apply'] ) ) {
		check_admin_referer( CRD_PHASE4A_POLISH_NONCE_ACTION );
		$apply_result = crd_phase4a_polish_apply_migration();
	}

	$completed = get_option( CRD_PHASE4A_POLISH_COMPLETED_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_phase4a_polish_scan();
	$counts    = crd_phase4a_polish_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Phase 4A SEO Polish</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>
		<p>This tool targets four approved English Elementor-backed posts.</p>

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
					<th>Checks</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $results as $result ) : ?>
					<tr>
						<td><code><?php echo esc_html( $result['status'] ); ?></code></td>
						<td><?php echo ! empty( $result['post'] ) ? esc_html( $result['post']->post_title ) . ' (#' . esc_html( $result['post']->ID ) . ')' : esc_html( $result['target']['label'] ); ?></td>
						<td><code><?php echo esc_html( $result['target']['slug'] ); ?></code></td>
						<td>
							<?php if ( isset( $result['checks'] ) ) : ?>
								<?php foreach ( $result['checks'] as $check ) : ?>
									<div><?php echo esc_html( $check['label'] ); ?>: old <code><?php echo esc_html( $check['old_hit'] ); ?></code> / new <code><?php echo esc_html( $check['new_hit'] ); ?></code></div>
								<?php endforeach; ?>
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
				<?php wp_nonce_field( CRD_PHASE4A_POLISH_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_phase4a_polish_apply" value="1">
				<button type="submit" class="button button-primary">Apply Phase 4A SEO Polish</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
