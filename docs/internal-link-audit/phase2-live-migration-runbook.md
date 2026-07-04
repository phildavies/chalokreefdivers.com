# CRD Phase 2 Internal Links - Live Migration Runbook

This is for the approved English-only Phase 2 contextual internal-link edits.

## What The Temporary Tool Does

The MU plugin `wp-content/mu-plugins/crd-phase2-internal-links.php` adds:

- WordPress Admin -> Tools -> CRD Phase 2 Links
- Dry run by default
- Apply button for administrators only
- Nonce-protected POST apply
- One-time completion lock
- Backup option before applying: `crd_phase2_internal_links_backup`
- Completion option: `crd_phase2_internal_links_completed`

It targets only these approved English source slugs:

- `benefits-of-scuba-diving-koh-tao`
- `buoyancy-control`
- `cave-diving`
- `chalok-reef-diver-hostel`
- `aow-leuk-bay-koh-tao`
- `altitude-diving`
- `advanced-adventurer-course-on-koh-tao`
- `mango-bay-dive-site-koh-tao`
- `southwest-pinnacle-dive-site-koh-tao`
- `master-scuba-diver`

It applies exactly 15 approved contextual link actions. It updates both `post_content` and `_elementor_data`, then clears `_elementor_element_cache` only for changed posts/pages.

## Before Deploying The Tool

1. Take a restorable full live backup from hosting/cPanel.
2. Confirm the WordPress install path is still:

```text
/home/syjrr8jwazs0/public_html/chalokreefdivers.com/
```

3. Deploy only the approved MU plugin files via the narrow `.cpanel.yml`.
4. Confirm the old Phase 1 migration tool has been removed from live:

```text
wp-content/mu-plugins/crd-phase1-internal-links.php
```

## Dry Run On Live

Open:

```text
WordPress Admin -> Tools -> CRD Phase 2 Links
```

Expected before apply:

```text
ready: 10
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
failed: 0
```

The page should show 15 approved link actions across the 10 ready rows.

If any row is not `ready` or `skipped_already_applied`, stop and do not apply.

## Apply

Click:

```text
Apply Phase 2 Internal Links
```

Expected after apply:

```text
updated: 10
failed: 0
```

If some rows are already applied, `updated` may be lower and `already applied` may be higher.

## Live Verification

Check these source pages:

- `https://chalokreefdivers.com/benefits-of-scuba-diving-koh-tao/`
- `https://chalokreefdivers.com/buoyancy-control/`
- `https://chalokreefdivers.com/cave-diving/`
- `https://chalokreefdivers.com/chalok-reef-diver-hostel/`
- `https://chalokreefdivers.com/aow-leuk-bay-koh-tao/`
- `https://chalokreefdivers.com/altitude-diving/`
- `https://chalokreefdivers.com/advanced-adventurer-course-on-koh-tao/`
- `https://chalokreefdivers.com/mango-bay-dive-site-koh-tao/`
- `https://chalokreefdivers.com/southwest-pinnacle-dive-site-koh-tao/`
- `https://chalokreefdivers.com/master-scuba-diver/`

Confirm the approved targets:

- `/courses-on-koh-tao/`
- `/courses-on-koh-tao/try-scuba-diving/`
- `/courses-on-koh-tao/open-water-course/`
- `/courses-on-koh-tao/advanced-diving-course/`
- `/courses-on-koh-tao/stress-and-rescue-course/`
- `/courses-on-koh-tao/divemaster-course-koh-tao/`
- `/courses-on-koh-tao/nitrox-diving-specialty/`
- `/courses-on-koh-tao/ssi-deep-diving-specialty/`

Also confirm old legacy advanced links were removed from the Phase 2 CTA edits where applicable:

```text
/dive-courses-on-koh-tao/advanced-adventurer-course/
```

## Cache

After apply:

1. Regenerate Elementor CSS/files if needed.
2. Clear WordPress/LiteSpeed cache.
3. Clear Cloudflare/CDN cache if active.
4. Recheck the 10 live source URLs in a private browser.

## Cleanup

After live verification, remove the temporary Phase 2 file from live:

```text
wp-content/mu-plugins/crd-phase2-internal-links.php
```

Then remove it from `.cpanel.yml` before the next normal deployment.
