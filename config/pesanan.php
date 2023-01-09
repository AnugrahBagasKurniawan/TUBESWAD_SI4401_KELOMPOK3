<?php 
 $conn = mysqli_connect("localhost", "root", "", "quiz2wad");
 
 function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
 }
 function update($data) {
   global $conn;
   $id = $data["id"];
   $produk = $data["produk"];
   $nama = $data["nama"];
   $alamat = $data["alamat"];
   $no_hp = $data["no_hp"];
   $harga = $data["harga"];
   $jumlah = $data["jumlah"];
   $total = $data["total"];
   $status = $data["status"];

   

   $query= "UPDATE  pesanan
   SET  
       produk = '$produk',
       nama = '$nama',
       alamat = '$alamat',
       no_hp = '$no_hp',
       harga = '$harga',
       jumlah = '$jumlah',
       total = '$total',
       status = '$status'

       WHERE id = $id
       ";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}
?>