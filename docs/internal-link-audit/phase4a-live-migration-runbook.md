# CRD Phase 4A SEO Polish - Live Migration Runbook

This is for the approved English-only Phase 4A title, heading, meta-description, and small readability polish batch.

## What The Temporary Tool Does

The MU plugin `wp-content/mu-plugins/crd-phase4a-seo-polish.php` adds:

- WordPress Admin -> Tools -> CRD Phase 4A SEO Polish
- Dry run by default
- Apply button for administrators only
- Nonce-protected POST apply
- One-time completion lock
- Backup option before applying: `crd_phase4a_seo_polish_backup`
- Completion option: `crd_phase4a_seo_polish_completed`

It targets only these approved English source slugs:

- `underwater-photography`
- `buoyancy-control`
- `scuba-diving-certification`
- `snorkeling-vs-scuba-diving`

It applies exactly five approved checks/actions:

- Improve the Rank Math SEO title on `underwater-photography`
- Fix the trailing typo `surrounds you.f` on `underwater-photography`
- Shorten the likely H1/post title on `buoyancy-control`
- Shorten the opening H2 on `scuba-diving-certification`
- Trim the Rank Math meta description on `snorkeling-vs-scuba-diving`

All source posts are Elementor-backed where content is changed, so the tool updates both `post_content` and `_elementor_data`, then clears `_elementor_element_cache` for changed posts. Rank Math meta updates are stored in post meta.

## Deployment Cleanup

The next narrow deploy should keep removing completed temporary tools:

```text
wp-content/mu-plugins/crd-phase1-internal-links.php
wp-content/mu-plugins/crd-phase2-internal-links.php
wp-content/mu-plugins/crd-phase3a-internal-links.php
wp-content/mu-plugins/crd-phase3bc-content-refresh.php
```

The deploy should keep these live functionality plugins:

```text
wp-content/mu-plugins/crd-brand-link-colours.php
wp-content/mu-plugins/crd-low-season-offers.php
```

The deploy should install this temporary Phase 4A tool:

```text
wp-content/mu-plugins/crd-phase4a-seo-polish.php
```

## Dry Run On Live

Open:

```text
WordPress Admin -> Tools -> CRD Phase 4A SEO Polish
```

Expected before apply:

```text
ready: 4
updated: 0
skipped_already_applied: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
failed: 0
```

The page should show five checks/actions across the four ready rows.

If any row is not `ready` or `skipped_already_applied`, stop and do not apply.

## Apply

Click:

```text
Apply Phase 4A SEO Polish
```

Expected after apply:

```text
updated: 4
failed: 0
not_found: 0
bad_elementor_data: 0
text_not_found: 0
partial_or_unexpected: 0
```

The tool should then mark the migration complete and disable apply.

## Post-Apply Verification

After applying, verify:

- `underwater-photography` has the improved Rank Math SEO title and no longer contains `surrounds you.f`.
- `buoyancy-control` has the shorter post title / visible H1.
- `scuba-diving-certification` has the shorter opening H2.
- `snorkeling-vs-scuba-diving` has the trimmed Rank Math meta description.

If public HTML does not update but the admin tool reports completion, clear the page cache and Elementor cache, then verify again with cache-busting query strings.

## Cleanup After Verification

After Phase 4A is applied and verified live, prepare a follow-up cleanup deploy that removes:

```text
wp-content/mu-plugins/crd-phase4a-seo-polish.php
```

Keep this runbook and the audit records as historical documentation.
