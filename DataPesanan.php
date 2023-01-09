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
 $pesanan = query("SELECT * FROM pesanan");
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
        <a href=""><img src="./add.png" alt="" class="cart"></a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemasana</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col">Harga</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no= 1;?>
                <?php foreach($pesanan as $row) : ?>
                <th scope="row"><?= $no; ?></th>
                    <td><?= $row["nama"]?></td>
                    <td><?= $row["produk"]?></td>
                    <td><?= $row["jumlah"]?></td>
                    <td><?= $row["alamat"]?></td>
                    <td><?= $row["no_hp"]?></td>
                    <td><?= $row["harga"]?></td>
                    <td><?= $row["total"]?></td>
                    <td>
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="Kirim"
                            <?php //if($row["status"] == 'Kirim') echo 'checked'?>//>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Kirim
                            </label>
                        </div> -->
                    </td>
                    <td>
                        <div class="mb-3">
                            <a href="EditPesanan.php?id=<?= $row["id"]?>"><button class="btn btn-primary" type="submit" name="submit">Detail</button></a>
                        </div>
                    </td>
                </tr>
                <?php $no++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>
</html>