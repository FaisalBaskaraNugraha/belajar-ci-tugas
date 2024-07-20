<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Data Transaksi</h1>

    <!-- Flash messages for success or failure -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('failed')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('failed') ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('transaksi/downloadTransactions') ?>" class="btn btn-success mb-3">Download PDF</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Total Harga</th>
                <th>Alamat</th>
                <th>Ongkir</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($transactions as $transaction): ?>
                <tr>
                    <td><?= $transaction['id'] ?></td>
                    <td><?= $transaction['username'] ?></td>
                    <td><?= number_to_currency($transaction['total_harga'], 'IDR') ?></td>
                    <td><?= $transaction['alamat'] ?></td>
                    <td><?= number_to_currency($transaction['ongkir'], 'IDR') ?></td>
                    <td>
                        <?= $transaction['status'] ?>
                    </td>
                    <td>
                        <form method="post" action="<?= base_url('transaksi/updateStatus/'.$transaction['id']) ?>">
                            <select name="status" class="form-select">
                                <option value="0" <?= $transaction['status'] == 0 ? 'selected' : '' ?>>0 (Pending)</option>
                                <option value="1" <?= $transaction['status'] == 1 ? 'selected' : '' ?>>1 (Completed)</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Ubah Data</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>


