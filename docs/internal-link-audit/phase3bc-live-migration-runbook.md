# CRD Phase 3B+3C Content Refresh - Live Migration Runbook

This is for the approved English-only Phase 3B light refresh fixes and Phase 3C related-guide / mini-hub additions.

## What The Temporary Tool Does

The MU plugin `wp-content/mu-plugins/crd-phase3bc-content-refresh.php` adds:

- WordPress Admin -> Tools -> CRD Phase 3B+3C
- Dry run by default
- Apply button for administrators only
- Nonce-protected POST apply
- One-time completion lock
- Backup option before applying: `crd_phase3bc_content_refresh_backup`
- Completion option: `crd_phase3bc_content_refresh_completed`

It targets only these approved English source slugs:

- `altitude-diving`
- `search-and-recovery-diving`
- `family-scuba-diving`
- `koh-tao-dive-center`
- `drift-diving`
- `wreck-diving`
- `night-diving`
- `sail-rock-dive-site-koh-tao`
- `koh-tao-diving-sites`
- `diving-safety`
- `beginner-divers`
- `scuba-diving-skills`
- `advanced-adventurer-course-on-koh-tao`

The approved batch contains 15 plan items:

- 10 Phase 3B light refresh fixes
- 5 Phase 3C related-guide / mini-hub additions

The tool performs 16 exact replacement operations because Phase 3B fix 9 for `koh-tao-diving-sites` contains two separate awkward wording corrections. It updates both `post_content` and `_elementor_data`, then clears `_elementor_element_cache` only for changed posts.

It does not include future backlog items, large rewrites, menus, footer, sidebar, repeated templates, unrelated layout edits, or live database changes outside the approved post content fields.

## Deployment Cleanup

The next narrow deploy should keep removing completed temporary tools:

```text
wp-content/mu-plugins/crd-phase1-internal-links.php
wp-content/mu-plugins/crd-phase2-internal-links.php
wp-content/mu-plugins/crd-phase3a-internal-links.php
```

The deploy should keep these live functionality plugins:

```text
wp-content/mu-plugins/crd-brand-link-colours.php
wp-content/mu-plugins/crd-low-season-offers.php
```

The deploy should install this temporary Phase 3B+3C tool:

```text
wp-content/mu-plugins/crd-phase3bc-content-refresh.php
```

## Before Deploying The Tool

1. Take a restorable full live backup from hosting/cPanel.
2. Confirm the WordPress install path is still:

```text
/home/syjrr8jwazs0/public_html/chalokreefdivers.com/
```

3. Deploy only the approved MU plugin files via the narrow `.cpanel.yml`.
4. Confirm the completed Phase 3A migration tool has been removed from live.

## Dry Run On Live

Open:

```text
WordPress Admin -> Tools -> CRD Phase 3B+3C
```

Expected before apply:

```text
ready: 13
updated: 0
skipped_already_applied: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
failed: 0
```

The page should show 15 approved plan items across 13 source rows. The detailed replacement count is 16 because one approved wording fix has two exact text replacements.

If any row is not `ready` or `skipped_already_applied`, stop and do not apply.

## Apply

Click:

```text
Apply Phase 3B+3C Content Refresh
```

Expected after apply:

```text
updated: 13
failed: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
```

The tool should then mark the migration complete and disable apply.

## Post-Apply Verification

After applying, verify the public rendered pages contain the approved changes:

- Legacy Advanced course links corrected on `altitude-diving`, `search-and-recovery-diving`, `drift-diving`, `wreck-diving`, and `night-diving`.
- Family diving Try Dive and Open Water links point to CRD course pages.
- `koh-tao-dive-center` wording reads naturally and points to `/courses-on-koh-tao/`.
- Sail Rock typo reads `Open Water certification`.
- `koh-tao-diving-sites` awkward wording is corrected and related dive-site guide links render before the conclusion.
- `diving-safety` agency wording is updated and related safety-guide links render near the conclusion.
- `beginner-divers`, `scuba-diving-skills`, and `advanced-adventurer-course-on-koh-tao` related-guide additions render in body content.

If public HTML does not update but the admin tool reports completion, clear the page cache and Elementor cache, then verify again with cache-busting query strings.

## Cleanup After Verification

After Phase 3B+3C is applied and verified live, prepare a follow-up cleanup deploy that removes:

```text
wp-content/mu-plugins/crd-phase3bc-content-refresh.php
```

Keep this runbook and the audit records as historical documentation.
