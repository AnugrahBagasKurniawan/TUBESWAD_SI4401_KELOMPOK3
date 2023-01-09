<?php
$conn = mysqli_connect("localhost", "root", "", "quiz2wad");
function daftar($data){
    global $conn;

    $nama = $data["nama"];
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT email FROM datapengguna WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar')
                document.location.href = 'registrasi.php';
                </script>      
        ";
        return false;
    }



    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password salah')
                document.location.href = 'registrasi.php';
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO datapengguna VALUES('', '$nama', '$email', '$password')");
    return mysqli_affected_rows($conn);

}
?>