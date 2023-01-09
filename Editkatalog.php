<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyBooking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha3tg84-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<style>
    @import url(https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap);
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Spartan', sans-serif;
    }
    .kiri p{
        font-family: 'BrandonReguler',Helvetica,Arial,sans-serif;
        font-size: 13px;
    }
    .header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 50px;
    background-color: black;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
    }
    .navbar{
        display: flex;
    }
    .navbar li{
        list-style: none;
        padding: 0 20px;
        position: relative;
    }
    .navbar li a{
        text-decoration: none;
        color: #FA7070;
        font-size: 16px;
        font-weight: 600;

    }
    .cart{
        width: 40px;
    }
    .logo{
        width: 10%;
    }
    .navbar li a:hover,
    .navbar li a.active{
        color: #FA7070;
    }
    .navbar li a.active::after,
    .navbar li a:hover::after{
        content: "";
        width: 30%;
        height: 2px;
        background-color: #FA7070;
        position: absolute;
        bottom: -4px;
        left: 20px;
    }
    #produk{
        background-image: url("https://migrate-repo.spaceroastery.com/index.php/img/banners/a665a09292685099d162e06efbf288b4tyfonspaceBNR20170925-000.jpg");
        height: 90vh;
        width: 100%;
        background-size: cover;
    }
    #produk h2{
        font-size: 46px;
        line-height: 54px;
        color: #FA7070;
        padding: 30px 80px;
    }
    .card1 {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }
    #footer{
        display: flex;
        justify-content: space-around;
        background-color: black;
        padding: 20px 50px;
    }
    #footer p{
        color: white;
    }
    .tengah p{
        display: flex;
        align-items:center;
        justify-content:center;
        background-color: black;
        color: white;
        font-size: 8px;
        margin-bottom: 0;
        padding: 5px;
    }
    #lokasi{
        background-image: url("https://migrate-repo.spaceroastery.com/index.php/img/banners/b54be36a9b67a0888d485b20aa2877cctyfonspaceBNR20190906-000.jpg");
        height: 90vh;
        width: 100%;
        background-size: cover;
    }
    #lokasi h2{
        font-size: 46px;
        line-height: 54px;
        color: #FA7070;
        padding: 30px 80px;
        text-align: center;
    }
    .map{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .map iframe{
        border-radius: 10px;
    }
    .navbar img{
        width: 25px;
    }
</style>
<?php 
session_start();

if (!isset($_SESSION["login"])){
    header("Location: LoginPegawai.php");
    exit;
}
require 'config/update.php';
$id = $_GET["id"];
$katalog = query("SELECT * FROM katalog WHERE id=$id")[0];

//udah pernah disubmit belom
if(isset($_POST["submit"])) {
    


    //cek data berhasil ditambahkan atau tidak
    if(edit($_POST) > 0){
        echo "
        <script>
            alert('data berhasil diubah');
            
        </script>

        ";
        
    } else {
        echo "        
        <script>
            alert('data gagal diubah');
            
        </script>
    ";
    }

}
?>
<body>
    <div class="header">
        <ul class="navbar">
            <li><a href="Pegawai.php" class="">Home</a></li>
            <li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="./user.png" alt="">Kevin Iskandar</a>
                <ul class="dropdown-menu">
                    <li><a href="HomePage.html" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
            <li><a href="katalog.php">Katalog</a></li>
        </ul>
        <img src="https://www.spaceroastery.com/img/logo.png" alt="" class="logo">
        <a href="shopcart.html"><img src="./add.png" alt="" class="cart"></a>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $katalog["id"];?>">
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" type="file" id="formFile" name="foto_produk">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $katalog["nama_produk"];?>" name="nama_produk">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga Produk</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $katalog["harga_produk"];?>" name="harga_produk">
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</body>