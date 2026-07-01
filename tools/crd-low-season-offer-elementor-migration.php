<?php
/**
 * Idempotent Elementor shortcode insertion helper for the CRD low-season offers.
 *
 * Run from the WordPress root with WP-CLI:
 *   wp eval-file tools/crd-low-season-offer-elementor-migration.php
 *   wp eval-file tools/crd-low-season-offer-elementor-migration.php -- --apply
 *
 * The default run is a dry run. It reports matching pages and planned changes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	fwrite( STDERR, "Run this through WP-CLI from the WordPress root.\n" );
	exit( 1 );
}

global $wpdb;

$apply = in_array( '--apply', $_SERVER['argv'], true );

$targets = array(
	array(
		'label'     => 'English homepage',
		'lang'      => 'en',
		'slugs'     => array( 'home-2' ),
		'frontpage' => true,
		'shortcode' => '[crd_low_season_offer type="homepage" lang="en"]',
		'equivalent_shortcodes' => array( '[crd_low_season_offer type="homepage"]' ),
	),
	array(
		'label'     => 'French homepage',
		'lang'      => 'fr',
		'slugs'     => array( 'home', 'home-of-diving-at-chalok-reef-divers-koh-tao-francais' ),
		'shortcode' => '[crd_low_season_offer type="homepage" lang="fr"]',
	),
	array(
		'label'     => 'German homepage',
		'lang'      => 'de',
		'slugs'     => array( 'home-of-diving-at-chalok-reef-divers-koh-tao-deutsch' ),
		'shortcode' => '[crd_low_season_offer type="homepage" lang="de"]',
	),
	array(
		'label'     => 'Spanish homepage',
		'lang'      => 'es',
		'slugs'     => array( 'home-es' ),
		'shortcode' => '[crd_low_season_offer type="homepage" lang="es"]',
	),
	array(
		'label'     => 'English Open Water',
		'lang'      => 'en',
		'slugs'     => array( 'open-water-course' ),
		'shortcode' => '[crd_low_season_offer type="open_water"]',
		'equivalent_shortcodes' => array(),
	),
	array(
		'label'     => 'French Open Water',
		'lang'      => 'fr',
		'slugs'     => array( 'license-de-plongee' ),
		'shortcode' => '[crd_low_season_offer type="open_water" lang="fr"]',
	),
	array(
		'label'     => 'German Open Water',
		'lang'      => 'de',
		'slugs'     => array( 'open-water-kurs-koh-tao' ),
		'shortcode' => '[crd_low_season_offer type="open_water" lang="de"]',
	),
	array(
		'label'     => 'Spanish Open Water',
		'lang'      => 'es',
		'slugs'     => array( 'curso-open-water-en-koh-tao' ),
		'shortcode' => '[crd_low_season_offer type="open_water" lang="es"]',
	),
	array(
		'label'     => 'English Advanced',
		'lang'      => 'en',
		'slugs'     => array( 'advanced-diving-course' ),
		'shortcode' => '[crd_low_season_offer type="advanced"]',
		'equivalent_shortcodes' => array(),
	),
	array(
		'label'     => 'French Advanced',
		'lang'      => 'fr',
		'slugs'     => array( 'plongee-avancee', 'cours-de-plongee-avance' ),
		'shortcode' => '[crd_low_season_offer type="advanced" lang="fr"]',
	),
	array(
		'label'     => 'German Advanced',
		'lang'      => 'de',
		'slugs'     => array( 'fortgeschrittener' ),
		'shortcode' => '[crd_low_season_offer type="advanced" lang="de"]',
	),
	array(
		'label'     => 'Spanish Advanced',
		'lang'      => 'es',
		'slugs'     => array( 'curso-de-buceo-avanzado' ),
		'shortcode' => '[crd_low_season_offer type="advanced" lang="es"]',
	),
);

function crd_offer_find_shortcode_paths( $nodes, $shortcode, $path = '' ) {
	$found = array();

	foreach ( $nodes as $index => $node ) {
		$current = '' === $path ? (string) $index : $path . '.' . $index;

		if (
			isset( $node['elType'], $node['widgetType'], $node['settings']['shortcode'] )
			&& 'widget' === $node['elType']
			&& 'shortcode' === $node['widgetType']
			&& $shortcode === $node['settings']['shortcode']
		) {
			$found[] = $current;
		}

		if ( ! empty( $node['elements'] ) && is_array( $node['elements'] ) ) {
			$found = array_merge( $found, crd_offer_find_shortcode_paths( $node['elements'], $shortcode, $current . '.elements' ) );
		}
	}

	return $found;
}

function crd_offer_section( $shortcode ) {
	return array(
		'id'       => substr( md5( $shortcode . microtime( true ) ), 0, 7 ),
		'elType'   => 'section',
		'settings' => array(
			'content_width'  => array( 'unit' => 'px', 'size' => 1180, 'sizes' => array() ),
			'gap'            => 'no',
			'padding'        => array( 'unit' => 'px', 'top' => '12', 'right' => '0', 'bottom' => '12', 'left' => '0', 'isLinked' => false ),
			'padding_tablet' => array( 'unit' => 'px', 'top' => '8', 'right' => '0', 'bottom' => '8', 'left' => '0', 'isLinked' => false ),
			'padding_mobile' => array( 'unit' => 'px', 'top' => '6', 'right' => '0', 'bottom' => '6', 'left' => '0', 'isLinked' => false ),
		),
		'elements' => array(
			array(
				'id'       => substr( md5( 'column' . $shortcode . microtime( true ) ), 0, 7 ),
				'elType'   => 'column',
				'settings' => array( '_column_size' => 100, '_inline_size' => null ),
				'elements' => array(
					array(
						'id'         => substr( md5( 'widget' . $shortcode . microtime( true ) ), 0, 7 ),
						'elType'     => 'widget',
						'settings'   => array( 'shortcode' => $shortcode ),
						'elements'   => array(),
						'widgetType' => 'shortcode',
					),
				),
				'isInner'  => false,
			),
		),
		'isInner'  => false,
	);
}

function crd_offer_page_has_language( $post_id, $lang ) {
	global $wpdb;

	$found = $wpdb->get_var(
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

	return $found === $lang;
}

function crd_offer_find_page( $target ) {
	global $wpdb;

	if ( ! empty( $target['frontpage'] ) ) {
		$front_id = (int) get_option( 'page_on_front' );
		if ( $front_id && crd_offer_page_has_language( $front_id, $target['lang'] ) ) {
			return get_post( $front_id );
		}
	}

	foreach ( $target['slugs'] as $slug ) {
		$post_id = $wpdb->get_var(
			$wpdb->prepare(
				"SELECT ID FROM {$wpdb->posts}
				WHERE post_type = 'page'
				AND post_status = 'publish'
				AND post_name = %s
				ORDER BY ID ASC
				LIMIT 1",
				$slug
			)
		);
		$post = $post_id ? get_post( (int) $post_id ) : null;
		if ( $post && 'publish' === $post->post_status && crd_offer_page_has_language( $post->ID, $target['lang'] ) ) {
			return $post;
		}
	}

	return null;
}

echo $apply ? "Mode: APPLY\n" : "Mode: DRY RUN\n";

foreach ( $targets as $target ) {
	$post = crd_offer_find_page( $target );
	if ( ! $post ) {
		echo "MISSING\t{$target['label']}\t{$target['shortcode']}\n";
		continue;
	}

	$raw = get_post_meta( $post->ID, '_elementor_data', true );
	if ( '' === $raw ) {
		echo "NO_ELEMENTOR_DATA\t{$post->ID}\t{$post->post_name}\t{$target['label']}\n";
		continue;
	}

	$data = json_decode( $raw, true );
	if ( ! is_array( $data ) ) {
		echo "BAD_JSON\t{$post->ID}\t{$post->post_name}\t" . json_last_error_msg() . "\n";
		continue;
	}

	$shortcodes_to_check = array_merge( array( $target['shortcode'] ), isset( $target['equivalent_shortcodes'] ) ? $target['equivalent_shortcodes'] : array() );
	$paths               = array();
	foreach ( $shortcodes_to_check as $shortcode_to_check ) {
		$paths = array_merge( $paths, crd_offer_find_shortcode_paths( $data, $shortcode_to_check ) );
	}
	if ( $paths ) {
		echo "SKIP_EXISTS\t{$post->ID}\t{$post->post_name}\t{$target['label']}\t" . implode( ',', $paths ) . "\n";
		continue;
	}

	echo "INSERT\t{$post->ID}\t{$post->post_name}\t{$target['label']}\t{$target['shortcode']}\n";

	if ( $apply ) {
		array_splice( $data, 1, 0, array( crd_offer_section( $target['shortcode'] ) ) );
		update_post_meta( $post->ID, '_elementor_data', wp_slash( wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ) );
		delete_post_meta( $post->ID, '_elementor_element_cache' );
		wp_update_post( array( 'ID' => $post->ID ) );
	}
}
