<?php 
$conn = mysqli_connect("localhost", "root", "", "quiz2wad");
function add($data) {
    global $conn;
    $nama_produk = $data["nama_produk"]; 
    $harga_produk = $data["harga_produk"];
    
    $foto_produk = upload();
    if(!$foto_produk) {
        return false;
    }

    $query= "INSERT INTO katalog
    VALUES ('', '$foto_produk', '$nama_produk', '$harga_produk')    
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
 
function query1($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>
<?php
function upload() {
    $namaFile = $_FILES['foto_produk']['name'];
    $ukuranFile = $_FILES['foto_produk']['size'];
    $error = $_FILES['foto_produk']['error'];
    $tmpName = $_FILES['foto_produk']['tmp_name'];

    if($error === 4 ) {
        echo " 
            <script>
                alert('Pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    //cek jenis file gambar
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png', 'webp'];
    $ekstensigambar= explode('.', $namaFile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if(!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo " 
        <script>
            alert('Jenis File salah');
        </script>
        ";
        return false;
    }
    //siap upload
    //generate nama gambar baru

    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensigambar;

    move_uploaded_file($tmpName, 'image/' . $namaFilebaru);
    return $namaFilebaru;


}
function edit($data) {
    global $conn;
    $id = $data["id"];
    $nama_produk = $data["nama_produk"];
    $harga_produk = $data["harga_produk"];
    
    $foto_produk = upload();
    if(!$foto_produk) {
        return false;
    }

    

    $query= "UPDATE  showroom_bagas_table
    SET  
        nama_produk = '$nama_produk',
        harga_produk = '$harga_produk',
        foto_produk = '$foto_produk',

        WHERE id = $id
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
 }

?>