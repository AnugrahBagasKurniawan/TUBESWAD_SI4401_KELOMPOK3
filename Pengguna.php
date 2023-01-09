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
    $_SESSION['nama'] = $nama;
    $_SESSION['id'] = $id;
    header("Location: LoginPengguna.php");
    exit;

}
require 'config/insert.php';
require 'config/insertkatalog.php';

$katalog = query1("SELECT * FROM katalog");

//udah pernah disubmit belom
if(isset($_POST["submit"])) {
    


    //cek data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0){
        echo "
        <script>
            alert('data berhasil ditambahkan');
            
        </script>

        ";
        
    } else {
        echo "        
        <script>
            alert('data gagal ditambahkan');
            
        </script>
    ";
    }

}
?>
<body>
    <div class="header">
        <ul class="navbar">
            <li><a href="" class="active">Home</a></li>
            <li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="./user.png" alt=""><?php echo $_SESSION['nama']?></a>
                <ul class="dropdown-menu">
                    <li><a href="config/logout.php" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
        </ul>
        <img src="https://www.spaceroastery.com/img/logo.png" alt="" class="logo">
        <a href="shopcart.php"><img src="./add.png" alt="" class="cart"></a>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="https://migrate-repo.spaceroastery.com/index.php/img/banners/8c1e56fe91ce9d93ae230a45c2532de2tyfonspaceBNR20190318-000.jpg" class="d-block w-100" alt="...">
        
            </div>
            <div class="carousel-item active">
                <img src="https://migrate-repo.spaceroastery.com/index.php/img/banners/a665a09292685099d162e06efbf288b4tyfonspaceBNR20170925-000.jpg" class="d-block w-100" alt="...">
        
            </div>
            <div class="carousel-item">
                <img src="https://migrate-repo.spaceroastery.com/index.php/img/banners/b54be36a9b67a0888d485b20aa2877cctyfonspaceBNR20190906-000.jpg" class="d-block w-100" alt="...">
        
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section id="produk">
        <h2>PRODUK KAMI</h2>
        <div class="card1">
            <?php foreach ($katalog as $row) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="image/<?= $row["foto_produk"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["nama_produk"]?></h5>
                        <p class="card-text">starts from</p>
                        <p class="card-text">IDR <?= $row["harga_produk"]?> </p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi Pesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Produk</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="Lintong Honey Lemon" name="produk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" name="nama">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Jalan Terusan Buah Batu Gg Pa Edo no 39, Bojongsoang, Lengkong, Bandung, Jawa Barat" name="alamat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nomor Handphone</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="089680007674" name="no_hp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                                            <input class="form-control" type="text" id="formFile" name="harga" value="75000">
                                        </div>  
                                        <div class="mb-3">
                                            <select class="form-select" name="jumlah">
                                                <option value="">Jumlah</option>
                                                <?php for($x=1;$x<=50;$x++){
                                                ?>
                                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="total">
                                        <div class="mb-3">
                                            <button type="submit" name="submit" class="btn btn-primary">Pesan</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section id="lokasi">
        <h2>LOKASI KAMI</h2>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15812.896254859266!2d110.3606993!3d-7.7660474!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x92012d15e3dd6d9f!2sSpace%20Coffee%20Roastery!5e0!3m2!1sen!2sid!4v1667378593138!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <section id="footer">
        <div class="kiri">
            <p>
            Address:
            <br>
            Gang Loncang 88, Jalan Magelang, Yogyakarta
            <br>
            Opening Hour:
            <br>
            Office: 8:00-16:00
            <br>
            Slow Bar & Shop: 8:00-24:00
            <br>
            Phone: +6282288909088
            <br>
            E-Mail: info@spaceroastery.com</p>
        </div>
        <div class="kanan">
            <p>INFORMATION</p>
            <p>contact us</p>
        </div>
    </section>
    <div class="tengah">
        <p>Space Roastery © 2022</p>
    </div>
</body>
</html>
