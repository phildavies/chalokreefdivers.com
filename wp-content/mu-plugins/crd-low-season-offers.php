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

		.crd-low-season-offer__save {
			display: inline-flex;
			align-items: center;
			width: fit-content;
			max-width: 100%;
			padding: 5px 9px;
			border-radius: 999px;
			background: rgba(244, 197, 66, 0.28);
			color: #7a5a05;
			font-size: 0.86rem;
			font-weight: 900;
			line-height: 1.2;
		}

		.crd-low-season-offer__action {
			display: grid;
			gap: 10px;
			justify-items: end;
			max-width: 300px;
		}

		.crd-low-season-offer__warning {
			margin: 0;
			color: #a44716;
			font-size: 0.92rem;
			font-weight: 800;
			line-height: 1.38;
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

		.crd-low-season-offer__deal .crd-low-season-offer__save {
			margin-top: 8px;
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

			.crd-low-season-offer__action {
				justify-items: stretch;
				max-width: none;
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
				'price'  => '&#3647;9,950',
				'normal' => 'Normally',
				'was'    => '&#3647;10,950',
				'save'   => 'Save &#3647;1,000',
				'line_1' => 'Special price available until 20 July.',
				'line_2' => 'Includes 3 days, 6 dives, equipment and SSI certification.',
				'warning' => 'Please WhatsApp us before booking to confirm availability for your preferred start date. Spaces are limited and some dates may already be full.',
				'button' => 'WhatsApp to Confirm Availability',
			),
			'fr' => array(
				'label'  => 'Offre basse saison',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,950',
				'normal' => 'Normalement',
				'was'    => '&#3647;10,950',
				'save'   => 'Economisez &#3647;1,000',
				'line_1' => 'Tarif spÃ©cial disponible jusquâ€™au 20 juillet.',
				'line_2' => 'Inclut 3 jours, 6 plongÃ©es, lâ€™Ã©quipement et la certification SSI.',
				'warning' => 'Veuillez nous contacter sur WhatsApp avant de reserver afin de confirmer la disponibilite pour votre date de depart preferee. Les places sont limitees et certaines dates peuvent deja etre completes.',
				'button' => 'Confirmer sur WhatsApp',
			),
			'de' => array(
				'label'  => 'Nebensaison-Angebot',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,950',
				'normal' => 'Normalerweise',
				'was'    => '&#3647;10,950',
				'save'   => '&#3647;1,000 sparen',
				'line_1' => 'Sonderpreis verfÃ¼gbar bis zum 20. Juli.',
				'line_2' => 'Inklusive 3 Tage, 6 TauchgÃ¤nge, AusrÃ¼stung und SSI-Zertifizierung.',
				'warning' => 'Bitte kontaktiere uns vor der Buchung per WhatsApp, um die Verfuegbarkeit fuer dein bevorzugtes Startdatum zu bestaetigen. Die Plaetze sind begrenzt und einige Daten koennen bereits ausgebucht sein.',
				'button' => 'Auf WhatsApp bestaetigen',
			),
			'es' => array(
				'label'  => 'Oferta de temporada baja',
				'title'  => 'Open Water Diver',
				'price'  => '&#3647;9,950',
				'normal' => 'Normalmente',
				'was'    => '&#3647;10,950',
				'save'   => 'Ahorra &#3647;1,000',
				'line_1' => 'Precio especial disponible hasta el 20 de julio.',
				'line_2' => 'Incluye 3 dÃ­as, 6 inmersiones, equipo y certificaciÃ³n SSI.',
				'warning' => 'Por favor escribenos por WhatsApp antes de reservar para confirmar disponibilidad en tu fecha de inicio preferida. Las plazas son limitadas y algunas fechas pueden estar completas.',
				'button' => 'Confirmar por WhatsApp',
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
				'line_1' => 'Tarif spÃ©cial disponible jusquâ€™au 20 juillet.',
				'line_2' => 'Inclut 5 plongÃ©es aventure et la certification SSI.',
				'button' => 'RÃ©server Advanced',
			),
			'de' => array(
				'label'  => 'Nebensaison-Angebot',
				'title'  => 'Advanced Open Water',
				'price'  => '&#3647;8,950',
				'normal' => 'Normalerweise',
				'was'    => '&#3647;9,950',
				'line_1' => 'Sonderpreis verfÃ¼gbar bis zum 20. Juli.',
				'line_2' => 'Inklusive 5 Adventure-TauchgÃ¤nge und SSI-Zertifizierung.',
				'button' => 'Advanced buchen',
			),
			'es' => array(
				'label'  => 'Oferta de temporada baja',
				'title'  => 'Advanced Open Water',
				'price'  => '&#3647;8,950',
				'normal' => 'Normalmente',
				'was'    => '&#3647;9,950',
				'line_1' => 'Precio especial disponible hasta el 20 de julio.',
				'line_2' => 'Incluye 5 inmersiones de aventura y certificaciÃ³n SSI.',
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
							<span class="crd-low-season-offer__save">' . wp_kses_post( $copy['save'] ) . '</span>
						</div>
						<p class="crd-low-season-offer__summary">' . esc_html( $copy['line_1'] ) . '</p>
						<p class="crd-low-season-offer__detail">' . esc_html( $copy['line_2'] ) . '</p>
					</div>
					<div class="crd-low-season-offer__action">
						<p class="crd-low-season-offer__warning">' . esc_html( $copy['warning'] ) . '</p>
						<a class="crd-low-season-offer__button" href="' . esc_url( $book_url ) . '">' . esc_html( $copy['button'] ) . '</a>
					</div>
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
			'ow_save'  => 'Save &#3647;1,000',
			'summary'  => 'Special prices until 20 July. Please WhatsApp us before booking to confirm availability for your preferred start date. Spaces are limited and some dates may already be full.',
			'button'   => 'WhatsApp to Confirm Availability',
		),
		'es' => array(
			'label'    => 'Especial temporada baja',
			'title'    => 'Ofertas de buceo de temporada baja',
			'ow'       => 'Open Water Diver ahora',
			'advanced' => 'Advanced Open Water ahora',
			'ow_save'  => 'Ahorra &#3647;1,000',
			'summary'  => 'Precios especiales hasta el 20 de julio. Por favor escribenos por WhatsApp antes de reservar para confirmar disponibilidad. Las plazas son limitadas y algunas fechas pueden estar completas.',
			'button'   => 'Confirmar por WhatsApp',
		),
		'de' => array(
			'label'    => 'Nebensaison-Special',
			'title'    => 'Tauchangebote in der Nebensaison',
			'ow'       => 'Open Water Diver jetzt',
			'advanced' => 'Advanced Open Water jetzt',
			'ow_save'  => '&#3647;1,000 sparen',
			'summary'  => 'Spezialpreise bis 20. Juli. Bitte kontaktiere uns vor der Buchung per WhatsApp, um die Verfuegbarkeit zu bestaetigen. Die Plaetze sind begrenzt und einige Daten koennen bereits ausgebucht sein.',
			'button'   => 'Auf WhatsApp bestaetigen',
		),
		'fr' => array(
			'label'    => 'Special basse saison',
			'title'    => 'Offres de plongee basse saison',
			'ow'       => 'Open Water Diver maintenant',
			'advanced' => 'Advanced Open Water maintenant',
			'ow_save'  => 'Economisez &#3647;1,000',
			'summary'  => 'Prix speciaux jusqu au 20 juillet. Veuillez nous contacter sur WhatsApp avant de reserver afin de confirmer la disponibilite. Les places sont limitees et certaines dates peuvent deja etre completes.',
			'button'   => 'Confirmer sur WhatsApp',
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
					<div class="crd-low-season-offer__deal-price">&#3647;9,950</div>
					<div class="crd-low-season-offer__save">' . wp_kses_post( $copy['ow_save'] ) . '</div>
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
