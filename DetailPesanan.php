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
    .navbar img{
        width: 25px;
    }
    .progressbar{
        padding: 20px 20px;
    }
</style>
<?php
 session_start();

 if (!isset($_SESSION["login"])){
     header("Location: LoginPegawai.php");
     exit;
 } 
 require 'config/pesanan.php';
 $id = $_GET["id"];
 $pesanan = query("SELECT * FROM pesanan WHERE id=$id")[0];
 if(isset($_POST["submit"])) {
    
    //cek data berhasil ditambahkan atau tidak
    if(update($_POST) > 0){
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
            <li><a href="Pegawai.php" class="active">Home</a></li>
            <li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="./user.png" alt="">Kevin Iskandar</a>
                <ul class="dropdown-menu">
                    <li><a href="HomePage.html" class="dropdown-item">Logout</a></li>
                </ul>
            </li>
        </ul>
        <img src="https://www.spaceroastery.com/img/logo.png" alt="" class="logo">
        <a href="DataPesanan.php"><img src="./add.png" alt="" class="cart"></a>
    </div>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $pesanan["id"];?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Produk</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= $pesanan["produk"];?>" name="produk" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" value="<?= $pesanan["nama"];?>" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $pesanan["alamat"];?>" name="alamat">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Handphone</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $pesanan["no_hp"];?>" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                <input class="form-control" type="text" id="formFile" name="harga" value="<?= $pesanan["harga"];?>">
            </div>  
            <div class="mb-3">
                <select class="form-select" name="jumlah" value="<?= $pesanan["jumlah"];?>">
                    <option value="<?= $pesanan["jumlah"];?>">Jumlah</option>
                    <?php for($x=1;$x<=50;$x++){
                    ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Harga</label>
                <input class="form-control" type="text" id="formFile" name="total" value="<?= $pesanan["total"];?>">
            </div>  
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Kirim"
                <?php if($pesanan["status"] == 'Kirim') echo 'checked'?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    Dikirim
                </label>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
</div>
</body>
</html>