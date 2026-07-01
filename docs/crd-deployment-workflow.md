# CRD Deployment Workflow

Use the same intended pattern as Site Skills:

1. Make local changes.
2. Commit to Git.
3. Push to GitHub.
4. Let cPanel Git deployment copy approved files to live.

For this first CRD pipeline, `.cpanel.yml` is intentionally narrow. It creates `wp-content/mu-plugins/` if needed and copies only:

```text
wp-content/mu-plugins/crd-low-season-offers.php
```

It does not run a full-site `rsync --delete`, does not overwrite WordPress core, does not overwrite themes/plugins/uploads, and does not edit the database.

## Required Live Confirmation

Before enabling cPanel Auto Deploy, confirm the live WordPress path in cPanel. The current `.cpanel.yml` uses:

```text
/home/syjrr8jwazs0/public_html/
```

If cPanel shows the CRD WordPress install is actually under a subfolder such as:

```text
/home/syjrr8jwazs0/public_html/chalokreefdivers.com/
```

update `DEPLOYPATH` before deploying.

## Elementor Shortcode Migration

Database changes should be repeatable and idempotent, not copied from local exports.

Luke's cPanel does not currently provide Terminal access, so the live migration is run through a temporary admin-only screen in the MU plugin:

```text
WordPress Admin -> Tools -> CRD Offer Migration
```

The default view is a dry run and makes no database changes. Review that it finds the correct 12 live pages by slug/title/language and reports only expected `ready` or `skipped_already_exists` rows.

Apply requires:

- a logged-in administrator
- `manage_options`
- a POST request
- a valid nonce
- the migration not already being marked complete

On apply, the tool creates a backup option containing the affected page IDs, titles, slugs, original `_elementor_data`, shortcode, and timestamp for pages it will change. It inserts one Elementor shortcode widget after the first top-level section and deletes `_elementor_element_cache` only for pages it changes.

After a successful apply, it marks itself complete so a second apply is blocked. Remove the temporary admin migration code after live verification, leaving the shortcode rendering code in place.

The WP-CLI helper at `tools/crd-low-season-offer-elementor-migration.php` remains available for environments with Terminal access, but the live CRD path is the admin screen unless Terminal becomes available later.

## Backups Before Migration

Take a full database backup first. Also export affected page rows after the dry run confirms live IDs:

```bash
wp db export backups/crd-before-low-season-offers-$(date +%Y%m%d-%H%M%S).sql
```

Then export the affected `wp_posts` and `wp_postmeta` rows using the live table prefix and confirmed page IDs.

## Cache After Migration

After applying the migration:

1. Regenerate Elementor CSS/files if needed.
2. Clear LiteSpeed or other WordPress cache.
3. Clear Cloudflare/CDN cache if active.
4. Review all 12 live URLs in a private browser.
