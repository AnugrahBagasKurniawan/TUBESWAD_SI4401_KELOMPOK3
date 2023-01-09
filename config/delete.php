<?php 
$id = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "quiz2wad");

$result = mysqli_query($conn, "DELETE FROM katalog WHERE id = $id");


if(($result) > 0){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href = '../Pegawai.php';   
    </script>
    ";
    
} else {
    "
    <script>
        alert('data gagal dihapus');
        document.location.href = '../Pegawai.php';   
    </script>

    ";
}

return mysqli_affected_rows($conn);
?>