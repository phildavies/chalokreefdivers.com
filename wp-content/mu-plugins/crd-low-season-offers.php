<?php
/**
 * Plugin Name: CRD Low Season Offers
 * Description: Temporary local low-season offer shortcode blocks for Chalok Reef Divers.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function crd_low_season_offer_is_active() {
	$timezone = new DateTimeZone( 'Asia/Bangkok' );
	$now      = new DateTimeImmutable( 'now', $timezone );
	$expires  = new DateTimeImmutable( '2026-07-20 18:30:00', $timezone );

	return $now <= $expires;
}

function crd_low_season_offer_styles() {
	static $printed = false;

	if ( $printed ) {
		return '';
	}

	$printed = true;

	return '<style>
		.crd-low-season-offer {
			--crd-blue: #0878bd;
			--crd-blue-dark: #035f98;
			--crd-gold: #f4c542;
			--crd-ink: #133042;
			--crd-muted: #5b7280;
			box-sizing: border-box;
			width: min(100%, 1120px);
			margin: 28px auto;
			padding: 0 18px;
			font-family: inherit;
		}

		.crd-low-season-offer *,
		.crd-low-season-offer *::before,
		.crd-low-season-offer *::after {
			box-sizing: border-box;
		}

		.crd-low-season-offer__inner {
			position: relative;
			overflow: hidden;
			background: #ffffff;
			border: 1px solid rgba(8, 120, 189, 0.18);
			border-top: 5px solid var(--crd-blue);
			border-radius: 8px;
			box-shadow: 0 16px 42px rgba(19, 48, 66, 0.12);
			color: var(--crd-ink);
			padding: 26px;
		}

		.crd-low-season-offer__badge {
			display: inline-flex;
			align-items: center;
			width: fit-content;
			max-width: 100%;
			margin: 0 0 14px;
			padding: 7px 12px;
			border-radius: 999px;
			background: var(--crd-gold);
			color: #22313a;
			font-size: 0.78rem;
			font-weight: 800;
			line-height: 1.2;
			letter-spacing: 0.04em;
			text-transform: uppercase;
		}

		.crd-low-season-offer__title {
			margin: 0 0 9px;
			color: var(--crd-ink);
			font-size: clamp(1.35rem, 2.4vw, 2rem);
			line-height: 1.18;
			font-weight: 800;
			letter-spacing: 0;
		}

		.crd-low-season-offer__summary,
		.crd-low-season-offer__detail {
			margin: 0;
			color: var(--crd-muted);
			font-size: 1rem;
			line-height: 1.55;
		}

		.crd-low-season-offer__body {
			display: grid;
			grid-template-columns: 1fr auto;
			gap: 22px;
			align-items: center;
		}

		.crd-low-season-offer__prices {
			display: flex;
			flex-wrap: wrap;
			align-items: baseline;
			gap: 8px 14px;
			margin: 16px 0 10px;
		}

		.crd-low-season-offer__price {
			color: var(--crd-blue-dark);
			font-size: clamp(2rem, 4vw, 3.1rem);
			font-weight: 900;
			line-height: 1;
			letter-spacing: 0;
		}

		.crd-low-season-offer__normal {
			color: var(--crd-muted);
			font-size: 0.98rem;
			font-weight: 700;
		}

		.crd-low-season-offer__normal del {
			text-decoration-thickness: 2px;
		}

		.crd-low-season-offer__button {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			min-height: 46px;
			padding: 12px 20px;
			border-radius: 6px;
			background: var(--crd-blue);
			color: #ffffff;
			font-size: 0.98rem;
			font-weight: 800;
			line-height: 1.2;
			text-decoration: none;
			white-space: nowrap;
			box-shadow: 0 10px 22px rgba(8, 120, 189, 0.24);
			transition: background-color 160ms ease, transform 160ms ease;
		}

		.crd-low-season-offer__button:hover,
		.crd-low-season-offer__button:focus {
			background: var(--crd-blue-dark);
			color: #ffffff;
			transform: translateY(-1px);
		}

		.crd-low-season-offer--homepage .crd-low-season-offer__deals {
			display: grid;
			grid-template-columns: repeat(2, minmax(0, 1fr));
			gap: 14px;
			margin: 18px 0 18px;
		}

		.crd-low-season-offer__deal {
			border: 1px solid rgba(8, 120, 189, 0.16);
			border-radius: 8px;
			background: #f7fbfe;
			padding: 16px;
		}

		.crd-low-season-offer__deal-name {
			margin: 0 0 8px;
			color: var(--crd-ink);
			font-size: 1rem;
			font-weight: 800;
			line-height: 1.25;
		}

		.crd-low-season-offer__deal-price {
			color: var(--crd-blue-dark);
			font-size: 1.75rem;
			font-weight: 900;
			line-height: 1;
		}

		.crd-low-season-offer__footer {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 18px;
		}

		@media (max-width: 760px) {
			.crd-low-season-offer {
				margin: 22px auto;
				padding: 0 14px;
			}

			.crd-low-season-offer__inner {
				padding: 20px;
			}

			.crd-low-season-offer__body,
			.crd-low-season-offer__footer,
			.crd-low-season-offer--homepage .crd-low-season-offer__deals {
				grid-template-columns: 1fr;
				flex-direction: column;
				align-items: stretch;
			}

			.crd-low-season-offer__button {
				width: 100%;
				white-space: normal;
				text-align: center;
			}
		}
	</style>';
}

function crd_low_season_offer_shortcode( $atts ) {
	if ( ! crd_low_season_offer_is_active() ) {
		return '';
	}

	$atts = shortcode_atts(
		array(
			'type' => 'homepage',
			'lang' => 'en',
		),
		$atts,
		'crd_low_season_offer'
	);

	$type     = sanitize_key( $atts['type'] );
	$lang     = sanitize_key( $atts['lang'] );
	$book_url = home_url( '/book-now/' );
	$styles   = crd_low_season_offer_styles();

	$course_copy = array(
		'open_water' => array(
			'en' => array(
				'label'  => 'Low Season Special',
				'title'  => 'SSI Open Water Diver Course',
				'price'  => '&#3647;9,850',
				'normal' => 'Normally',
				'was'    => '&#3647;10,950',
				'line_1' => 'Special price available until 20 July.',
				'line_2' => 'Includes 3 days, 6 dives, equipment and SSI certification.',
				'button' => 'Book Open Water',
			),
			'fr' => array(
				'label'  => 'Offre basse saison',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,850',
				'normal' => 'Normalement',
				'was'    => '&#3647;10,950',
				'line_1' => 'Tarif spécial disponible jusqu’au 20 juillet.',
				'line_2' => 'Inclut 3 jours, 6 plongées, l’équipement et la certification SSI.',
				'button' => 'Réserver Open Water',
			),
			'de' => array(
				'label'  => 'Nebensaison-Angebot',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,850',
				'normal' => 'Normalerweise',
				'was'    => '&#3647;10,950',
				'line_1' => 'Sonderpreis verfügbar bis zum 20. Juli.',
				'line_2' => 'Inklusive 3 Tage, 6 Tauchgänge, Ausrüstung und SSI-Zertifizierung.',
				'button' => 'Open Water buchen',
			),
			'es' => array(
				'label'  => 'Oferta de temporada baja',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,850',
				'normal' => 'Normalmente',
				'was'    => '&#3647;10,950',
				'line_1' => 'Precio especial disponible hasta el 20 de julio.',
				'line_2' => 'Incluye 3 días, 6 inmersiones, equipo y certificación SSI.',
				'button' => 'Reservar Open Water',
			),
		),
		'advanced' => array(
			'en' => array(
				'label'  => 'Low Season Special',
				'title'  => 'SSI Advanced Open Water Course',
				'price'  => '&#3647;8,950',
				'normal' => 'Normally',
				'was'    => '&#3647;9,950',
				'line_1' => 'Special price available until 20 July.',
				'line_2' => 'Includes 5 adventure dives and SSI certification.',
				'button' => 'Book Advanced',
			),
			'fr' => array(
				'label'  => 'Offre basse saison',
				'title'  => 'Advanced Open Water',
				'price'  => '&#3647;8,950',
				'normal' => 'Normalement',
				'was'    => '&#3647;9,950',
				'line_1' => 'Tarif spécial disponible jusqu’au 20 juillet.',
				'line_2' => 'Inclut 5 plongées aventure et la certification SSI.',
				'button' => 'Réserver Advanced',
			),
			'de' => array(
				'label'  => 'Nebensaison-Angebot',
				'title'  => 'Advanced Open Water',
				'price'  => '&#3647;8,950',
				'normal' => 'Normalerweise',
				'was'    => '&#3647;9,950',
				'line_1' => 'Sonderpreis verfügbar bis zum 20. Juli.',
				'line_2' => 'Inklusive 5 Adventure-Tauchgänge und SSI-Zertifizierung.',
				'button' => 'Advanced buchen',
			),
			'es' => array(
				'label'  => 'Oferta de temporada baja',
				'title'  => 'Advanced Open Water',
				'price'  => '&#3647;8,950',
				'normal' => 'Normalmente',
				'was'    => '&#3647;9,950',
				'line_1' => 'Precio especial disponible hasta el 20 de julio.',
				'line_2' => 'Incluye 5 inmersiones de aventura y certificación SSI.',
				'button' => 'Reservar Advanced',
			),
		),
	);

	if ( 'open_water' === $type ) {
		$copy = isset( $course_copy['open_water'][ $lang ] ) ? $course_copy['open_water'][ $lang ] : $course_copy['open_water']['en'];

		return $styles . '<section class="crd-low-season-offer crd-low-season-offer--course" aria-label="' . esc_attr( $copy['label'] ) . '">
			<div class="crd-low-season-offer__inner">
				<div class="crd-low-season-offer__body">
					<div>
						<div class="crd-low-season-offer__badge">' . esc_html( $copy['label'] ) . '</div>
						<h2 class="crd-low-season-offer__title">' . esc_html( $copy['title'] ) . '</h2>
						<div class="crd-low-season-offer__prices">
							<span class="crd-low-season-offer__price">' . wp_kses_post( $copy['price'] ) . '</span>
							<span class="crd-low-season-offer__normal">' . esc_html( $copy['normal'] ) . ' <del>' . wp_kses_post( $copy['was'] ) . '</del></span>
						</div>
						<p class="crd-low-season-offer__summary">' . esc_html( $copy['line_1'] ) . '</p>
						<p class="crd-low-season-offer__detail">' . esc_html( $copy['line_2'] ) . '</p>
					</div>
					<a class="crd-low-season-offer__button" href="' . esc_url( $book_url ) . '">' . esc_html( $copy['button'] ) . '</a>
				</div>
			</div>
		</section>';
	}

	if ( 'advanced' === $type ) {
		$copy = isset( $course_copy['advanced'][ $lang ] ) ? $course_copy['advanced'][ $lang ] : $course_copy['advanced']['en'];

		return $styles . '<section class="crd-low-season-offer crd-low-season-offer--course" aria-label="' . esc_attr( $copy['label'] ) . '">
			<div class="crd-low-season-offer__inner">
				<div class="crd-low-season-offer__body">
					<div>
						<div class="crd-low-season-offer__badge">' . esc_html( $copy['label'] ) . '</div>
						<h2 class="crd-low-season-offer__title">' . esc_html( $copy['title'] ) . '</h2>
						<div class="crd-low-season-offer__prices">
							<span class="crd-low-season-offer__price">' . wp_kses_post( $copy['price'] ) . '</span>
							<span class="crd-low-season-offer__normal">' . esc_html( $copy['normal'] ) . ' <del>' . wp_kses_post( $copy['was'] ) . '</del></span>
						</div>
						<p class="crd-low-season-offer__summary">' . esc_html( $copy['line_1'] ) . '</p>
						<p class="crd-low-season-offer__detail">' . esc_html( $copy['line_2'] ) . '</p>
					</div>
					<a class="crd-low-season-offer__button" href="' . esc_url( $book_url ) . '">' . esc_html( $copy['button'] ) . '</a>
				</div>
			</div>
		</section>';
	}

	$homepage_copy = array(
		'en' => array(
			'label'    => 'Low Season Special',
			'title'    => 'Low Season Dive Offers',
			'ow'       => 'Open Water Diver now',
			'advanced' => 'Advanced Open Water now',
			'summary'  => 'Special prices until 20 July. Limited spaces this low season.',
			'button'   => 'Book Your Course',
		),
		'es' => array(
			'label'    => 'Especial temporada baja',
			'title'    => 'Ofertas de buceo de temporada baja',
			'ow'       => 'Open Water Diver ahora',
			'advanced' => 'Advanced Open Water ahora',
			'summary'  => 'Precios especiales hasta el 20 de julio. Plazas limitadas esta temporada baja.',
			'button'   => 'Reserva tu curso',
		),
		'de' => array(
			'label'    => 'Nebensaison-Special',
			'title'    => 'Tauchangebote in der Nebensaison',
			'ow'       => 'Open Water Diver jetzt',
			'advanced' => 'Advanced Open Water jetzt',
			'summary'  => 'Spezialpreise bis 20. Juli. Begrenzte Plaetze in dieser Nebensaison.',
			'button'   => 'Kurs buchen',
		),
		'fr' => array(
			'label'    => 'Special basse saison',
			'title'    => 'Offres de plongee basse saison',
			'ow'       => 'Open Water Diver maintenant',
			'advanced' => 'Advanced Open Water maintenant',
			'summary'  => 'Prix speciaux jusqu au 20 juillet. Places limitees cette basse saison.',
			'button'   => 'Reserver votre cours',
		),
	);
	$copy = isset( $homepage_copy[ $lang ] ) ? $homepage_copy[ $lang ] : $homepage_copy['en'];

	return $styles . '<section class="crd-low-season-offer crd-low-season-offer--homepage" aria-label="' . esc_attr( $copy['title'] ) . '">
		<div class="crd-low-season-offer__inner">
			<div class="crd-low-season-offer__badge">' . esc_html( $copy['label'] ) . '</div>
			<h2 class="crd-low-season-offer__title">' . esc_html( $copy['title'] ) . '</h2>
			<div class="crd-low-season-offer__deals">
				<div class="crd-low-season-offer__deal">
					<p class="crd-low-season-offer__deal-name">' . esc_html( $copy['ow'] ) . '</p>
					<div class="crd-low-season-offer__deal-price">&#3647;9,850</div>
				</div>
				<div class="crd-low-season-offer__deal">
					<p class="crd-low-season-offer__deal-name">' . esc_html( $copy['advanced'] ) . '</p>
					<div class="crd-low-season-offer__deal-price">&#3647;8,950</div>
				</div>
			</div>
			<div class="crd-low-season-offer__footer">
				<p class="crd-low-season-offer__summary">' . esc_html( $copy['summary'] ) . '</p>
				<a class="crd-low-season-offer__button" href="' . esc_url( $book_url ) . '">' . esc_html( $copy['button'] ) . '</a>
			</div>
		</div>
	</section>';
}

add_shortcode( 'crd_low_season_offer', 'crd_low_season_offer_shortcode' );

define( 'CRD_LOW_SEASON_MIGRATION_OPTION', 'crd_low_season_offer_migration_completed' );
define( 'CRD_LOW_SEASON_MIGRATION_BACKUP_OPTION', 'crd_low_season_offer_migration_backup' );
define( 'CRD_LOW_SEASON_MIGRATION_NONCE_ACTION', 'crd_low_season_offer_apply_migration' );

function crd_low_season_offer_migration_targets() {
	return array(
		array(
			'label'                 => 'English homepage',
			'lang'                  => 'en',
			'slugs'                 => array( 'home-2' ),
			'frontpage'             => true,
			'shortcode'             => '[crd_low_season_offer type="homepage" lang="en"]',
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
}

function crd_low_season_offer_page_has_language( $post_id, $lang ) {
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

function crd_low_season_offer_find_migration_page( $target ) {
	global $wpdb;

	if ( ! empty( $target['frontpage'] ) ) {
		$front_id = (int) get_option( 'page_on_front' );
		if ( $front_id && crd_low_season_offer_page_has_language( $front_id, $target['lang'] ) ) {
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
		$post    = $post_id ? get_post( (int) $post_id ) : null;

		if ( $post && crd_low_season_offer_page_has_language( $post->ID, $target['lang'] ) ) {
			return $post;
		}
	}

	return null;
}

function crd_low_season_offer_find_shortcode_paths( $nodes, $shortcode, $path = '' ) {
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
			$found = array_merge( $found, crd_low_season_offer_find_shortcode_paths( $node['elements'], $shortcode, $current . '.elements' ) );
		}
	}

	return $found;
}

function crd_low_season_offer_migration_section( $shortcode ) {
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

function crd_low_season_offer_migration_scan() {
	$results = array();

	foreach ( crd_low_season_offer_migration_targets() as $target ) {
		$post = crd_low_season_offer_find_migration_page( $target );

		if ( ! $post ) {
			$results[] = array(
				'status'    => 'not_found',
				'target'    => $target,
				'post'      => null,
				'paths'     => array(),
				'raw_data'  => '',
				'json_data' => null,
			);
			continue;
		}

		$raw  = get_post_meta( $post->ID, '_elementor_data', true );
		$data = json_decode( $raw, true );

		if ( '' === $raw || ! is_array( $data ) ) {
			$results[] = array(
				'status'    => 'bad_elementor_data',
				'target'    => $target,
				'post'      => $post,
				'paths'     => array(),
				'raw_data'  => $raw,
				'json_data' => null,
			);
			continue;
		}

		$shortcodes_to_check = array_merge( array( $target['shortcode'] ), isset( $target['equivalent_shortcodes'] ) ? $target['equivalent_shortcodes'] : array() );
		$paths               = array();

		foreach ( $shortcodes_to_check as $shortcode_to_check ) {
			$paths = array_merge( $paths, crd_low_season_offer_find_shortcode_paths( $data, $shortcode_to_check ) );
		}

		$results[] = array(
			'status'    => $paths ? 'skipped_already_exists' : 'ready',
			'target'    => $target,
			'post'      => $post,
			'paths'     => $paths,
			'raw_data'  => $raw,
			'json_data' => $data,
		);
	}

	return $results;
}

function crd_low_season_offer_migration_status_counts( $results ) {
	$counts = array(
		'updated'                => 0,
		'skipped_already_exists' => 0,
		'not_found'              => 0,
		'bad_elementor_data'     => 0,
		'failed'                 => 0,
		'ready'                  => 0,
	);

	foreach ( $results as $result ) {
		if ( isset( $counts[ $result['status'] ] ) ) {
			$counts[ $result['status'] ]++;
		}
	}

	return $counts;
}

function crd_low_season_offer_apply_migration() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return new WP_Error( 'crd_offer_forbidden', 'Only administrators can run this migration.' );
	}

	if ( get_option( CRD_LOW_SEASON_MIGRATION_OPTION ) ) {
		return new WP_Error( 'crd_offer_completed', 'Migration has already been marked complete.' );
	}

	$results = crd_low_season_offer_migration_scan();
	$counts  = crd_low_season_offer_migration_status_counts( $results );

	if ( $counts['not_found'] || $counts['bad_elementor_data'] ) {
		return array(
			'completed' => false,
			'results'   => $results,
			'message'   => 'Apply blocked because one or more target pages were not found or had bad Elementor data.',
		);
	}

	$backup = array(
		'timestamp' => current_time( 'mysql' ),
		'pages'     => array(),
	);

	foreach ( $results as $result ) {
		if ( 'ready' !== $result['status'] || ! $result['post'] ) {
			continue;
		}

		$backup['pages'][] = array(
			'ID'              => $result['post']->ID,
			'post_title'      => $result['post']->post_title,
			'post_name'       => $result['post']->post_name,
			'shortcode'       => $result['target']['shortcode'],
			'_elementor_data' => $result['raw_data'],
		);
	}

	update_option( CRD_LOW_SEASON_MIGRATION_BACKUP_OPTION, $backup, false );

	foreach ( $results as $index => $result ) {
		if ( 'ready' !== $result['status'] || ! $result['post'] ) {
			continue;
		}

		$data = $result['json_data'];
		array_splice( $data, 1, 0, array( crd_low_season_offer_migration_section( $result['target']['shortcode'] ) ) );

		$updated = update_post_meta( $result['post']->ID, '_elementor_data', wp_slash( wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) ) );

		if ( false === $updated ) {
			$results[ $index ]['status'] = 'failed';
			continue;
		}

		delete_post_meta( $result['post']->ID, '_elementor_element_cache' );
		wp_update_post( array( 'ID' => $result['post']->ID ) );
		$results[ $index ]['status'] = 'updated';
	}

	$final_counts = crd_low_season_offer_migration_status_counts( $results );
	$completed    = 0 === $final_counts['failed'] && 0 === $final_counts['not_found'] && 0 === $final_counts['bad_elementor_data'];

	if ( $completed ) {
		update_option(
			CRD_LOW_SEASON_MIGRATION_OPTION,
			array(
				'completed_at' => current_time( 'mysql' ),
				'updated'      => $final_counts['updated'],
				'skipped'      => $final_counts['skipped_already_exists'],
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

function crd_low_season_offer_add_migration_admin_page() {
	add_management_page(
		'CRD Offer Migration',
		'CRD Offer Migration',
		'manage_options',
		'crd-offer-migration',
		'crd_low_season_offer_render_migration_admin_page'
	);
}

add_action( 'admin_menu', 'crd_low_season_offer_add_migration_admin_page' );

function crd_low_season_offer_render_migration_admin_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to access this page.', 'default' ) );
	}

	$apply_result = null;
	if ( 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_POST['crd_low_season_offer_apply'] ) ) {
		check_admin_referer( CRD_LOW_SEASON_MIGRATION_NONCE_ACTION );
		$apply_result = crd_low_season_offer_apply_migration();
	}

	$completed = get_option( CRD_LOW_SEASON_MIGRATION_OPTION );
	$results   = $apply_result && ! is_wp_error( $apply_result ) ? $apply_result['results'] : crd_low_season_offer_migration_scan();
	$counts    = crd_low_season_offer_migration_status_counts( $results );
	?>
	<div class="wrap">
		<h1>CRD Offer Migration</h1>
		<p><strong>Temporary admin-only tool.</strong> Dry-run is the default view and makes no database changes.</p>

		<?php if ( is_wp_error( $apply_result ) ) : ?>
			<div class="notice notice-error"><p><?php echo esc_html( $apply_result->get_error_message() ); ?></p></div>
		<?php elseif ( is_array( $apply_result ) ) : ?>
			<div class="notice <?php echo $apply_result['completed'] ? 'notice-success' : 'notice-error'; ?>">
				<p><?php echo esc_html( $apply_result['message'] ); ?></p>
			</div>
		<?php endif; ?>

		<?php if ( $completed ) : ?>
			<div class="notice notice-info">
				<p>Migration is marked complete. Apply is disabled.</p>
			</div>
		<?php endif; ?>

		<p>
			Updated: <?php echo esc_html( (string) $counts['updated'] ); ?> |
			Ready: <?php echo esc_html( (string) $counts['ready'] ); ?> |
			Skipped already exists: <?php echo esc_html( (string) $counts['skipped_already_exists'] ); ?> |
			Not found: <?php echo esc_html( (string) $counts['not_found'] ); ?> |
			Bad Elementor data: <?php echo esc_html( (string) $counts['bad_elementor_data'] ); ?> |
			Failed: <?php echo esc_html( (string) $counts['failed'] ); ?>
		</p>

		<table class="widefat striped">
			<thead>
				<tr>
					<th>Status</th>
					<th>Target</th>
					<th>Page ID</th>
					<th>Title</th>
					<th>Slug</th>
					<th>Shortcode</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $results as $result ) : ?>
					<tr>
						<td><code><?php echo esc_html( $result['status'] ); ?></code></td>
						<td><?php echo esc_html( $result['target']['label'] ); ?></td>
						<td><?php echo $result['post'] ? esc_html( (string) $result['post']->ID ) : '&mdash;'; ?></td>
						<td><?php echo $result['post'] ? esc_html( $result['post']->post_title ) : '&mdash;'; ?></td>
						<td><?php echo $result['post'] ? esc_html( $result['post']->post_name ) : '&mdash;'; ?></td>
						<td><code><?php echo esc_html( $result['target']['shortcode'] ); ?></code></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<?php if ( ! $completed ) : ?>
			<form method="post" style="margin-top: 20px;">
				<?php wp_nonce_field( CRD_LOW_SEASON_MIGRATION_NONCE_ACTION ); ?>
				<input type="hidden" name="crd_low_season_offer_apply" value="1">
				<button type="submit" class="button button-primary">Apply Migration</button>
			</form>
		<?php endif; ?>
	</div>
	<?php
}
