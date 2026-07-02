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

