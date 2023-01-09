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
function loginpegawai($data) {
    global $conn;
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM datapengguna WHERE email = '$email'");

    if( mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {

            $_SESSION["login"] = true;
            if (isset($_POST['remember'])) {
                setcookie('id', $row['id'], time() +60);
                setcookie('nama', $row['nama'], time() +60);
            }
            echo "<script>
            alert('Login Berhasil')
            document.location.href = 'Pegawai.php';
            </script>
        ";
            exit;
        } else {
            echo "<script>
                alert('Password Salah')
                document.location.href = 'LoginPegawai.php';
                </script>
            ";
        }
    }


}


?>