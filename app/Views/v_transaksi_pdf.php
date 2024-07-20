<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Total Harga</th>
                <th>Alamat</th>
                <th>Ongkir</th>
                <th>Status</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
