<?php
include_once('../connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản lý thể loại</title>
</head>

<body>

<?php
include_once('../connect.php');
?>

<table align="center" border="1" width="700">

    <tr align="center">
        <th>Tên thể loại</th>
        <th>Thứ tự</th>
        <th>Ẩn hiện</th>
        <th>Biểu tượng</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>

<?php

$sql = "SELECT * FROM theloai";

$results = mysqli_query($connect, $sql);

while (($rows = mysqli_fetch_assoc($results)) != NULL) {

?>

    <tr align="center">

        <td>
            <?php echo $rows['TenTL']; ?>
        </td>

        <td>
            <?php echo $rows['ThuTu']; ?>
        </td>

        <td>
            <?php
            if ($rows['AnHien'] == 1) {
                echo "Hiện";
            } else {
                echo "Ẩn";
            }
            ?>
        </td>

        <td>
            <img
                src="../image/<?php echo $rows['icon']; ?>"
                width="40"
                height="40"
            >
        </td>

        <td>
            <a href="theloai_sua.php?idTL=<?php echo $rows['idTL']; ?>">
                Sửa
            </a>
        </td>

        <td>
            <a
                href="theloai_xoa.php?idTL=<?php echo $rows['idTL']; ?>"
                onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
            >
                Xóa
            </a>
        </td>

    </tr>

<?php
}

mysqli_close($connect);
?>

</table>

<br>

<center>
    <a href="theloai_them.php">Thêm thể loại</a>
</center>

</body>
</html>