<?php
/**
 * Plugin Name: CRD Brand Link Colours
 * Description: Refines content link colours so light sections use CRD blue while dark brand sections keep the sunset accent.
 * Version: 1.0.0
 * Author: Chalok Reef Divers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function crd_brand_link_colours_css() {
	$css = <<<CSS
:root {
	--crd-link-blue: #005fae;
	--crd-link-blue-hover: #003f7f;
	--crd-sunset-accent: #ffb52e;
	--crd-sunset-accent-hover: #ffd27a;
}

.entry-content :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]) {
	color: var(--crd-link-blue);
	text-decoration-color: currentColor;
}

.entry-content :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):hover,
.entry-content :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):focus {
	color: var(--crd-link-blue-hover);
}

.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]),
.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]) :is(b, strong, span, .PlaygroundEditorTheme__textBold) {
	color: var(--crd-link-blue) !important;
	text-decoration-color: currentColor !important;
}

.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):hover,
.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):focus,
.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):hover :is(b, strong, span, .PlaygroundEditorTheme__textBold),
.entry-content :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):focus :is(b, strong, span, .PlaygroundEditorTheme__textBold) {
	color: var(--crd-link-blue-hover) !important;
	text-decoration-color: currentColor !important;
}

.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]) {
	color: var(--crd-sunset-accent);
	text-decoration-color: currentColor;
}

.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):hover,
.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) :where(p, li, .elementor-widget-text-editor, .elementor-tab-content) a:not(.button):not(.elementor-button):not(.wp-block-button__link):not([class*="button"]):focus {
	color: var(--crd-sunset-accent-hover);
}
CSS;

	wp_register_style( 'crd-brand-link-colours', false, array(), '1.0.0' );
	wp_enqueue_style( 'crd-brand-link-colours' );
	wp_add_inline_style( 'crd-brand-link-colours', $css );
}

add_action( 'wp_enqueue_scripts', 'crd_brand_link_colours_css', 99 );

function crd_brand_link_colours_late_light_blue_css() {
	$css = <<<CSS
body.home .site-main .elementor-16 .elementor-element-a159948 .elementor-widget-wrap {
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
}

body.home .site-main .elementor-16 .elementor-element-168e00f {
	order: 1;
}

body.home .site-main .elementor-16 .elementor-element-294d9c4 {
	order: 2;
}

body.home .site-main .elementor-16 .elementor-element-e0e309b {
	order: 3;
}

body.home .site-main .elementor-16 .elementor-element-6fa24e7 {
	order: 4;
}

body.home .site-main .elementor-16 .elementor-element-6fa24e7 p:first-of-type {
	margin: 0 0 18px;
	color: #ffffff;
	text-align: center;
	text-shadow: 0 2px 14px rgba(0, 0, 0, 0.45);
}

body.home .site-main .elementor-16 .elementor-element-6fa24e7 p:nth-of-type(2) {
	display: none;
}

body.home .site-main .elementor-16 .elementor-element-b029249 {
	order: 5;
	margin-bottom: 18px;
}

body.home .site-main .elementor-16 .crd-home-hero-summary {
	order: 6;
	width: min(92vw, 720px);
	margin: 0 auto;
	padding: 15px 18px;
	border-radius: 8px;
	background: linear-gradient(135deg, rgba(3, 18, 31, 0.58), rgba(3, 18, 31, 0.34));
	color: #ffffff;
	line-height: 1.55;
	text-align: center;
	text-shadow: 0 1px 8px rgba(0, 0, 0, 0.55);
	backdrop-filter: blur(2px);
}

body.home .site-main .elementor-16 .elementor-element-a159948 .crd-home-hero-summary :is(a, a:visited, a *, strong a, strong a *) {
	color: #ffd24a !important;
	text-decoration-color: currentColor !important;
}

body.home .site-main .elementor-16 .elementor-element-a159948 .crd-home-hero-summary :is(a:hover, a:focus, a:hover *, a:focus *) {
	color: #fff3a3 !important;
	text-decoration-color: currentColor !important;
}

body.home .site-main .elementor-16 .elementor-element-46b1533 > .elementor-element-populated {
	position: relative;
	padding-bottom: 0;
}

body.home .site-main .elementor-16 .elementor-element-176bf9a {
	position: relative;
	z-index: 1;
}

body.home .site-main .elementor-16 .elementor-element-176bf9a img {
	width: 100%;
}

body.home .site-main .elementor-16 .elementor-element-6ada511 {
	top: 285px !important;
	right: 18px !important;
	bottom: auto !important;
	left: auto !important;
	width: 50% !important;
	max-width: 50% !important;
	z-index: 2;
}

body.home .site-main .elementor-16 .elementor-element-6ada511 img {
	max-width: 100% !important;
}

body.home .site-main .elementor-16 .elementor-element-c3cc435 {
	position: relative;
	z-index: 3;
	max-width: 52%;
	margin-left: auto;
	margin-top: 112px;
	padding-right: 18px;
}

body.home .site-main .elementor-16 .elementor-element-c3cc435 p {
	margin-bottom: 0;
	color: #133042;
	font-size: 0.95rem;
	line-height: 1.35;
}

body.home .site-main .elementor-16 :is(
	.elementor-widget-text-editor,
	.elementor-widget-theme-post-content
) :is(p, li, .PlaygroundEditorTheme__ul) :is(
	a,
	a:visited,
	a *,
	b a,
	b a *,
	strong a,
	strong a *,
	.PlaygroundEditorTheme__textBold,
	.PlaygroundEditorTheme__textBold *
):not(.elementor-button):not(.elementor-button *) {
	color: var(--crd-link-blue) !important;
	text-decoration-color: currentColor !important;
}

body.home .site-main .elementor-16 :is(
	.elementor-widget-text-editor,
	.elementor-widget-theme-post-content
) :is(p, li, .PlaygroundEditorTheme__ul) :is(
	a:hover,
	a:focus,
	a:hover *,
	a:focus *,
	b a:hover,
	b a:focus,
	b a:hover *,
	b a:focus *,
	strong a:hover,
	strong a:focus,
	strong a:hover *,
	strong a:focus *
):not(.elementor-button):not(.elementor-button *) {
	color: var(--crd-link-blue-hover) !important;
	text-decoration-color: currentColor !important;
}

.site-main .elementor .PlaygroundEditorTheme__ul a:not(.elementor-button),
.site-main .elementor .PlaygroundEditorTheme__ul a:visited:not(.elementor-button),
.site-main .elementor .PlaygroundEditorTheme__ul a:not(.elementor-button) *,
.site-main .elementor .PlaygroundEditorTheme__ul a:visited:not(.elementor-button) * {
	color: var(--crd-link-blue) !important;
	text-decoration-color: currentColor !important;
}

.site-main .elementor .PlaygroundEditorTheme__ul a:hover:not(.elementor-button),
.site-main .elementor .PlaygroundEditorTheme__ul a:focus:not(.elementor-button),
.site-main .elementor .PlaygroundEditorTheme__ul a:hover:not(.elementor-button) *,
.site-main .elementor .PlaygroundEditorTheme__ul a:focus:not(.elementor-button) * {
	color: var(--crd-link-blue-hover) !important;
	text-decoration-color: currentColor !important;
}

.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) .PlaygroundEditorTheme__ul a:not(.elementor-button),
.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) .PlaygroundEditorTheme__ul a:visited:not(.elementor-button) {
	color: var(--crd-sunset-accent) !important;
}

.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) .PlaygroundEditorTheme__ul a:hover:not(.elementor-button),
.entry-content :where(
	.elementor-element-e4bb933,
	.elementor-element-f9ef977,
	.elementor-element-c7461e7,
	.elementor-element-2f92e07,
	.elementor-element-f19a7bc,
	.elementor-element-c44e0a0,
	.elementor-element-ea2ced8,
	.elementor-element-df759d7,
	.elementor-element-8924c31,
	.has-theme-palette-1-background-color,
	.has-theme-palette-2-background-color,
	.has-theme-palette-3-background-color,
	.has-theme-palette-4-background-color,
	.has-theme-palette-5-background-color,
	.has-theme-palette-6-background-color
) .PlaygroundEditorTheme__ul a:focus:not(.elementor-button) {
	color: var(--crd-sunset-accent-hover) !important;
}

.site-main .elementor .dive-sites-section .PlaygroundEditorTheme__ul a:not(.elementor-button),
.site-main .elementor .dive-sites-section .PlaygroundEditorTheme__ul a:visited:not(.elementor-button),
.site-main .elementor .dive-sites-section :is(p, li) a:not(.elementor-button),
.site-main .elementor .dive-sites-section :is(p, li) a:visited:not(.elementor-button) {
	color: #FFD24A !important;
}

.site-main .elementor .dive-sites-section .PlaygroundEditorTheme__ul a:hover:not(.elementor-button),
.site-main .elementor .dive-sites-section .PlaygroundEditorTheme__ul a:focus:not(.elementor-button),
.site-main .elementor .dive-sites-section :is(p, li) a:hover:not(.elementor-button),
.site-main .elementor .dive-sites-section :is(p, li) a:focus:not(.elementor-button) {
	color: var(--crd-sunset-accent-hover) !important;
}

.site-main .elementor :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) .elementor-widget-text-editor :is(p, li) :is(
	a,
	a *,
	b a,
	b a *,
	strong a,
	strong a *,
	.PlaygroundEditorTheme__textBold,
	.PlaygroundEditorTheme__textBold *
) {
	color: var(--crd-link-blue) !important;
	text-decoration-color: currentColor !important;
}

.site-main .elementor :is(
	.has-theme-palette-8-background-color,
	.has-background.has-theme-palette-8-background-color,
	[style*="--e-global-color-kadence8"],
	[style*="--global-palette8"],
	[style*="#BBE6F9;"],
	[style*="#bbe6f9;"],
	[style*="#BBE6F9 "],
	[style*="#bbe6f9 "],
	.elementor-element-a792cf2,
	.elementor-element-8e14d5d,
	.elementor-element-c837610,
	.elementor-element-0aaaf26,
	.elementor-element-13552cf,
	.elementor-element-b872b50,
	.elementor-element-dc9f5a9,
	.elementor-element-a6a7b77,
	.elementor-element-0e74d65,
	.elementor-element-c32017c,
	.elementor-element-3586330,
	.elementor-element-4eea088,
	.elementor-element-91465a3,
	.elementor-element-e52fce9,
	.elementor-element-f67ec28
) .elementor-widget-text-editor :is(p, li) :is(
	a:hover,
	a:focus,
	a:hover *,
	a:focus *,
	b a:hover,
	b a:focus,
	b a:hover *,
	b a:focus *,
	strong a:hover,
	strong a:focus,
	strong a:hover *,
	strong a:focus *
) {
	color: var(--crd-link-blue-hover) !important;
	text-decoration-color: currentColor !important;
}

@media (max-width: 1024px) {
	body.home .site-main .elementor-16 .crd-home-hero-summary {
		width: min(88vw, 640px);
	}

	body.home .site-main .elementor-16 .elementor-element-46b1533 > .elementor-element-populated {
		padding-bottom: 0;
	}

	body.home .site-main .elementor-16 .elementor-element-6ada511 {
		top: 255px !important;
		right: 8px !important;
		bottom: auto !important;
		width: 44% !important;
		max-width: 44% !important;
	}

	body.home .site-main .elementor-16 .elementor-element-c3cc435 {
		max-width: 52%;
		margin-top: 88px;
		padding-right: 8px;
	}
}

@media (max-width: 767px) {
	body.home .site-main .elementor-16 .elementor-element-a159948 > .elementor-container {
		min-height: 620px;
	}

	body.home .site-main .elementor-16 .elementor-element-294d9c4 .elementor-heading-title {
		font-size: 60px !important;
		line-height: 1.12em !important;
		white-space: nowrap;
	}

	body.home .site-main .elementor-16 .elementor-element-6fa24e7 p:first-of-type {
		margin-bottom: 14px;
		padding: 0 12px;
	}

	body.home .site-main .elementor-16 .elementor-element-b029249 {
		margin-bottom: 14px;
	}

	body.home .site-main .elementor-16 .crd-home-hero-summary {
		width: min(90vw, 360px);
		padding: 12px 14px;
		font-size: 0.94rem;
		line-height: 1.45;
	}

	body.home .site-main .elementor-16 .elementor-element-46b1533 > .elementor-element-populated {
		padding-bottom: 10px;
	}

	body.home .site-main .elementor-16 .elementor-element-6ada511 {
		position: relative !important;
		top: auto !important;
		right: auto !important;
		bottom: auto !important;
		left: auto !important;
		width: 100% !important;
		max-width: 100% !important;
		margin-top: 18px;
		text-align: center;
	}

	body.home .site-main .elementor-16 .elementor-element-6ada511 img {
		max-width: 78% !important;
	}

	body.home .site-main .elementor-16 .elementor-element-c3cc435 {
		max-width: 78%;
		margin: 10px auto 0;
		padding-right: 0;
	}
}
CSS;
	printf( "\n<style id=\"crd-brand-link-colours-late-inline-css\">\n%s\n</style>\n", $css );
}

add_action( 'wp_head', 'crd_brand_link_colours_late_light_blue_css', 999 );

function crd_brand_home_hero_paragraph_script() {
	if ( ! is_front_page() && ! is_home() ) {
		return;
	}

	?>
	<script id="crd-home-hero-paragraph-layout">
	(function() {
		function moveHeroSummary() {
			var hero = document.querySelector('body.home .site-main .elementor-16 .elementor-element-a159948');
			var summary = hero ? hero.querySelector('.elementor-element-6fa24e7 .elementor-widget-container p:nth-of-type(2)') : null;
			var button = hero ? hero.querySelector('.elementor-element-b029249') : null;

			if (!summary || !button || summary.classList.contains('crd-home-hero-summary')) {
				return;
			}

			summary.classList.add('crd-home-hero-summary');
			button.insertAdjacentElement('afterend', summary);
		}

		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', moveHeroSummary);
		} else {
			moveHeroSummary();
		}
	})();
	</script>
	<?php
}

add_action( 'wp_footer', 'crd_brand_home_hero_paragraph_script', 30 );
