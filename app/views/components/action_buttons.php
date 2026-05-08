<div class="btn-group btn-group-sm">

    <?php if (!empty($reset_url)) : ?>

        <a href="<?= $reset_url; ?>"
           class="btn btn-outline-secondary"

           onclick="return confirm('Reset password user ini?')">

            <i class="bi bi-arrow-clockwise"></i>

        </a>

    <?php endif; ?>

    <?php if (!empty($delete_url)) : ?>

        <a href="<?= $delete_url; ?>"
           class="btn btn-outline-danger"

           onclick="return confirm('Yakin ingin menghapus data ini?')">

            <i class="bi bi-trash"></i>

        </a>

    <?php endif; ?>

</div>