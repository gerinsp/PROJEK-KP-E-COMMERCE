<div class="mt-4">
    <?php
    $success    = $this->session->flashdata('success');
    $error        = $this->session->flashdata('error');
    $warning    = $this->session->flashdata('warning');

    if ($success) {
        $alert_status    = 'alert-success';
        $status            = 'Success!';
        $message        = $success;
    }

    if ($error) {
        $alert_status    = 'alert-danger';
        $status            = 'Error!';
        $message        = $error;
    }

    if ($warning) {
        $alert_status    = 'alert-warning';
        $status            = 'Warning!';
        $message        = $warning;
    }
    ?>

    <?php if ($success || $error || $warning) : ?>
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
                    <strong><?= $status ?></strong> <?= $message ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>