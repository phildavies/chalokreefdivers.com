# CRD Phase 3A-1 Internal Links - Live Migration Runbook

This is for the approved English-only Phase 3A-1 blog-to-blog contextual internal-link edits.

## What The Temporary Tool Does

The MU plugin `wp-content/mu-plugins/crd-phase3a-internal-links.php` adds:

- WordPress Admin -> Tools -> CRD Phase 3A Links
- Dry run by default
- Apply button for administrators only
- Nonce-protected POST apply
- One-time completion lock
- Backup option before applying: `crd_phase3a_internal_links_backup`
- Completion option: `crd_phase3a_internal_links_completed`

It targets only the approved Phase 3A-1 source slugs:

- `is-koh-tao-the-best-place-to-learn-scuba-diving`
- `beginner-divers`
- `snorkeling-vs-scuba-diving`
- `scuba-diving-certification`
- `scuba-diving-skills`
- `buoyancy-control`
- `underwater-navigation`
- `underwater-photography`
- `marine-life-photography`
- `advanced-adventurer-course-on-koh-tao`
- `diving-safety`
- `pre-dive-safety-check`
- `scuba-diving-and-mental-health`
- `how-to-equalize-your-ears-while-scuba-diving`

It applies exactly 15 approved blog-to-blog contextual body-link actions across 14 source posts. It updates both `post_content` and `_elementor_data`, then clears `_elementor_element_cache` only for changed posts.

Phase 3A-1 does not include:

- Phase 3A links #16-20
- Phase 3B content refreshes
- Course-page link changes
- Menu, footer, sidebar, heading, or repeated template edits

## Deployment Cleanup

The next narrow deploy should remove the completed Phase 2 temporary migration tool from live:

```text
wp-content/mu-plugins/crd-phase2-internal-links.php
```

The deploy should keep these live functionality plugins:

```text
wp-content/mu-plugins/crd-brand-link-colours.php
wp-content/mu-plugins/crd-low-season-offers.php
```

The deploy should install this temporary Phase 3A-1 tool:

```text
wp-content/mu-plugins/crd-phase3a-internal-links.php
```

## Before Deploying The Tool

1. Take a restorable full live backup from hosting/cPanel.
2. Confirm the WordPress install path is still:

```text
/home/syjrr8jwazs0/public_html/chalokreefdivers.com/
```

3. Deploy only the approved MU plugin files via the narrow `.cpanel.yml`.
4. Confirm the completed Phase 2 migration tool has been removed from live.

## Dry Run On Live

Open:

```text
WordPress Admin -> Tools -> CRD Phase 3A Links
```

Expected before apply:

```text
ready: 14
updated: 0
skipped_already_applied: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
failed: 0
```

The page should show 15 approved link actions across the 14 ready rows.

If any row is not `ready` or `skipped_already_applied`, stop and do not apply.

## Apply

Click:

```text
Apply Phase 3A Internal Links
```

Expected after apply:

```text
updated: 14
failed: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
```

The tool should then mark the migration complete and disable apply.

## Post-Apply Verification

After applying, verify the source pages render publicly and contain only the approved contextual body links:

| Source slug | Approved target |
|---|---|
| `is-koh-tao-the-best-place-to-learn-scuba-diving` | `/beginner-divers/` |
| `beginner-divers` | `/scuba-diving-skills/` |
| `snorkeling-vs-scuba-diving` | `/is-koh-tao-the-best-place-to-learn-scuba-diving/` |
| `scuba-diving-certification` | `/is-koh-tao-the-best-place-to-learn-scuba-diving/` |
| `scuba-diving-skills` | `/how-to-equalize-your-ears-while-scuba-diving/` |
| `buoyancy-control` | `/scuba-diving-skills/` |
| `underwater-navigation` | `/buoyancy-control/` |
| `underwater-photography` | `/buoyancy-control/` |
| `marine-life-photography` | `/underwater-photography/` |
| `advanced-adventurer-course-on-koh-tao` | `/underwater-navigation/` |
| `diving-safety` | `/pre-dive-safety-check/` and `/buoyancy-control/` |
| `pre-dive-safety-check` | `/diving-safety/` |
| `scuba-diving-and-mental-health` | `/benefits-of-scuba-diving-koh-tao/` |
| `how-to-equalize-your-ears-while-scuba-diving` | `/diving-safety/` |

If public HTML does not update but the admin tool reports completion, clear the page cache and Elementor cache, then verify again with cache-busting query strings.

## Cleanup After Verification

After Phase 3A-1 is applied and verified live, prepare a follow-up cleanup deploy that removes:

```text
wp-content/mu-plugins/crd-phase3a-internal-links.php
```

Keep this runbook and the audit records as historical documentation.
