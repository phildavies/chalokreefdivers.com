# CRD Phase 1 Internal Links - Live Migration Runbook

This is for the approved English-only Phase 1 contextual internal-link edits.

## What The Temporary Tool Does

The MU plugin `wp-content/mu-plugins/crd-phase1-internal-links.php` adds:

- WordPress Admin -> Tools -> CRD Phase 1 Links
- Dry run by default
- Apply button for administrators only
- Nonce-protected POST apply
- One-time completion lock
- Backup option before applying: `crd_phase1_internal_links_backup`
- Completion option: `crd_phase1_internal_links_completed`

It targets only these published English post slugs:

- `beginner-divers`
- `scuba-diving-certification`
- `koh-tao-diving-on-a-budget`
- `pre-dive-safety-check`
- `underwater-navigation`

It updates both `post_content` and `_elementor_data`, then clears `_elementor_element_cache` only for changed posts.

## Before Deploying The Tool

1. Take a restorable full live backup from hosting/cPanel.
2. Confirm the WordPress install path is still:

```text
/home/syjrr8jwazs0/public_html/chalokreefdivers.com/
```

3. Deploy only the approved MU plugin files via the narrow `.cpanel.yml`.

## Dry Run On Live

Open:

```text
WordPress Admin -> Tools -> CRD Phase 1 Links
```

Expected before apply:

```text
ready: 5
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
failed: 0
```

If any row is not `ready` or `skipped_already_applied`, stop and do not apply.

## Apply

Click:

```text
Apply Phase 1 Internal Links
```

Expected after apply:

```text
updated: 5
failed: 0
```

If some rows are already applied, `updated` may be lower and `already applied` may be higher.

## Live Verification

Check these source pages:

- `https://chalokreefdivers.com/beginner-divers/`
- `https://chalokreefdivers.com/scuba-diving-certification/`
- `https://chalokreefdivers.com/koh-tao-diving-on-a-budget/`
- `https://chalokreefdivers.com/pre-dive-safety-check/`
- `https://chalokreefdivers.com/underwater-navigation/`

Confirm the approved links:

- `Try Scuba Diving` -> `/courses-on-koh-tao/try-scuba-diving/`
- `diving course on Koh Tao` -> `/courses-on-koh-tao/`
- `Open Water course` -> `/courses-on-koh-tao/open-water-course/`
- `Stress & Rescue course` -> `/courses-on-koh-tao/stress-and-rescue-course/`
- `Advanced diving course` -> `/courses-on-koh-tao/advanced-diving-course/`

Also confirm the old URL is gone from `underwater-navigation`:

```text
/dive-courses-on-koh-tao/advanced-adventurer-course/
```

## Cache

After apply:

1. Regenerate Elementor CSS/files if needed.
2. Clear WordPress/LiteSpeed cache.
3. Clear Cloudflare/CDN cache if active.
4. Recheck the five live source URLs in a private browser.

## Cleanup

After live verification, remove the temporary file from live:

```text
wp-content/mu-plugins/crd-phase1-internal-links.php
```

Then remove it from `.cpanel.yml` before the next normal deployment.
