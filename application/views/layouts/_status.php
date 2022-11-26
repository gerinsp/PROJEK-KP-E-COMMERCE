<?php
if ($status == 'waiting') {
    $badge_status    = 'badge bg-primary';
    $status            = 'Menunggu Pembayaran';
}

if ($status == 'verify') {
    $badge_status    = 'badge bg-warning';
    $status            = 'Verifikasi Pembayaran';
}

if ($status == 'paid') {
    $badge_status    = 'badge bg-secondary';
    $status            = 'Dibayar';
}

if ($status == 'delivered') {
    $badge_status    = 'badge bg-success';
    $status            = 'Dikirim';
}

if ($status == 'accepted') {
    $badge_status    = 'badge bg-info';
    $status            = 'Diterima';
}

if ($status == 'cancel') {
    $badge_status    = 'badge bg-danger';
    $status            = 'Dibatalkan';
}
?>

<?php if ($status) : ?>
    <span class="badge rounded-pill <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>