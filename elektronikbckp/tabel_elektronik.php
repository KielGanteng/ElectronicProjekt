<h3>tabel elektronik</h3>
<hr/>
<form action="tabel_elektronik.php" method="post" enctype="multipart/form-data">
<table>
    
    <tr>
        <td>Nama Barang</td>
        <td><input type="text" name="Nama_barang"></td>
    </tr>
    <tr>
        <td>Stock</td>
        <td><input type="text" name="Stock"></td>
    </tr>
    <tr>
        <td>Berapa Penjualan</td>
        <td><input type="text" name="Berapa_penjualan"></td>
    </tr>
    <tr>
    <tr>
        <td>Harga Barang</td>
        <td><input type="text" name="Harga_barang"></td>
    </tr>
    <tr>
        <td>Gambar</td>
        <td><input type="file" name="Gambar"><td>
    </tr>
    <tr>    
        <td></td>
        <td><input type="submit" value="Simpan" name="proses"></td>
    </tr>
</table>
</form>

<?php
include "elektronik.php";

if (isset($_POST['proses'])) {
    $nama   = $_POST['Nama_barang'];
    $stok   = $_POST['Stock'];
    $berapa = $_POST['Berapa_penjualan'];
    $harga  = $_POST['Harga_barang'];

    // Upload file
    $target_dir = "GAMBAR/";
    $filename = basename($_FILES['Gambar']['name']);
    $target_file = $target_dir . $filename;
    $file_tmp = $_FILES['Gambar']['tmp_name'];

    // Cek dan pindahkan file
    if (move_uploaded_file($file_tmp, $target_file)) {
        $sql = "INSERT INTO elektronik 
                (Nama_barang, Stock, Berapa_penjualan, Harga_barang, Gambar) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $elektronik->prepare($sql);
        $stmt->bind_param("siids", $nama, $stok, $berapa, $harga, $filename);

        if ($stmt->execute()) {
            echo "Data berhasil disimpan!";
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {        
        echo "Upload gambar gagal.";
    }
}
?>
<p></p>
<a href="penjualan.php">DATA<a>