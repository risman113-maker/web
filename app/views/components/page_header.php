<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            <?= $page_title ?? 'Halaman'; ?>
        </h3>

        <?php if (!empty($page_subtitle)) : ?>
            <p class="text-muted mb-0">
                <?= $page_subtitle; ?>
            </p>
        <?php endif; ?>
    </div>

    <?php if (!empty($page_action)) : ?>
        <?= $page_action; ?>
    <?php endif; ?>

</div>