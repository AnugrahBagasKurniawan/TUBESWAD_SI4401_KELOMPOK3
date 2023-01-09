<?php 
$conn = mysqli_connect("localhost", "root", "", "quiz2wad");
function tambah($data) {
    global $conn;
    $produk = $data["produk"];
    $nama = $data["nama"]; 
    $alamat = $data["alamat"];
    $no_hp = $data["no_hp"];
    $harga = $data["harga"];
    $jumlah = $data["jumlah"];
    $total = $data["harga"]*$data["jumlah"];
    
    $query= "INSERT INTO pesanan
    VALUES ('', '$produk', '$nama', '$alamat', '$no_hp', '$harga', '$jumlah', '$total' )    
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
<?php