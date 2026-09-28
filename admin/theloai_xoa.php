<?php

include("../connect.php");

if (isset($_GET["idTL"])) {
    $key = $_GET["idTL"];

    $sql = "DELETE FROM theloai WHERE idTL = " . $key;

    if (mysqli_query($connect, $sql)) {
        echo "<script>
                alert('Xóa thành công');
                location.href='theloai.php';
              </script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}

?>