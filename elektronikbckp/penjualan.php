<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f44336;
            color: white;
        }
        a {
            margin: 0 5px;
            text-decoration: none;
        }
        h2 {
            text-align: center;
        }
        .add-data {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>
<body>

    <div class="add-data">
        <a href="tabel_elektronik.php">TAMBAH DATA</a>
    </div>

    <h2>DATA BARANG PENJUALAN</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Stock</th>
            <th>Berapa Penjualan</th>
            <th>Harga Barang</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </tr>

        <!-- PHP Loop data di sini -->
        <?php
        include 'elektronik.php';
        $no = 1;
        $query = mysqli_query($elektronik, "SELECT * FROM elektronik");
        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                <td>$no</td>
                <td>{$data['Nama_barang']}</td>
                <td>{$data['Stock']}</td>
                <td>{$data['Berapa_penjualan']}</td>
                <td>{$data['Harga_barang']}</td>
                <td><img src='GAMBAR/{$data['Gambar']}' width='50'></td>
                <td><a href='edit.php?id={$data['No']}'>Edit</a> | <a href='hapus.php?id={$data['No']}'>Hapus</a></td>
            </tr>";
            $no++;
        }
        ?>
    </table>

</body>
</html>