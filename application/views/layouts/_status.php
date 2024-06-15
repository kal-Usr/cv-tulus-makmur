<?php
if ($status == 'waiting') {
    $badge_status = 'badge rounded-pill bg-warning';
    $status       = 'Menunggu Pembayaran';
}

if ($status == 'paid') {
    $badge_status = 'badge rounded-pill bg-primary';
    $status       = 'Dibayar';
}

if ($status == 'delivered') {
    $badge_status = 'badge rounded-pill bg-success';
    $status       = 'Dikirim';
}

if ($status == 'done') {
    $badge_status = 'badge rounded-pill bg-secondary';
    $status       = 'Selesai';
}

if ($status == 'cancel') {
    $badge_status = 'badge rounded-pill bg-danger';
    $status       = 'Dibatalkan';
}
?>

<?php if ($status) : ?>
    <span class="badge rounded-pill <?= $badge_status ?>"><?= $status ?></span>
<?php endif ?>