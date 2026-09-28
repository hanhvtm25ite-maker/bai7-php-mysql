<?php
include("../connect.php");

if (isset($_GET['idTL'])) {
    $idTL = $_GET['idTL'];

    $sql = "SELECT * FROM theloai WHERE idTL = $idTL";
    $result = mysqli_query($connect, $sql);
    $d = mysqli_fetch_assoc($result);
}

if (isset($_POST['Sua'])) {

    $idTL = $_POST['idTL'];
    $theloai = $_POST['TenTL'];
    $thutu = $_POST['ThuTu'];
    $an = $_POST['AnHien'];

    $icon = $_POST['ten_anh'];

    if ($_FILES['image']['name'] != '') {
        $icon = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../image/" . $icon
        );
    }

    $sql = "UPDATE theloai 
            SET TenTL='$theloai',
                ThuTu='$thutu',
                AnHien='$an',
                icon='$icon'
            WHERE idTL=$idTL";

    if (mysqli_query($connect, $sql)) {
        echo "<script>
                alert('Sửa thành công');
                location.href='theloai.php';
              </script>";
        exit;
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sửa thể loại</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">

<table align="left" width="400">

<tr>
    <td align="right">Tên thể loại</td>
    <td>
        <input type="text"
               name="TenTL"
               value="<?php echo $d['TenTL']; ?>">
    </td>
</tr>

<tr>
    <td align="right">Thứ tự</td>
    <td>
        <input type="text"
               name="ThuTu"
               value="<?php echo $d['ThuTu']; ?>">
    </td>
</tr>

<tr>
    <td align="right">Ẩn hiện</td>
    <td>
        <select name="AnHien">

            <option value="0"
                <?php if ($d['AnHien'] == 0) echo "selected"; ?>>
                Ẩn
            </option>

            <option value="1"
                <?php if ($d['AnHien'] == 1) echo "selected"; ?>>
                Hiện
            </option>

        </select>
    </td>
</tr>

<tr>
    <td align="right">Biểu tượng</td>
    <td>
        <img src="../image/<?php echo $d['icon']; ?>"
             width="40"
             height="40">
    </td>
</tr>

<tr>
    <td align="right">Chọn ảnh mới</td>
    <td>
        <input type="file" name="image">

        <input type="hidden"
               name="ten_anh"
               value="<?php echo $d['icon']; ?>">
    </td>
</tr>

<tr>
    <td>
        <input type="hidden"
               name="idTL"
               value="<?php echo $d['idTL']; ?>">

        <input type="submit"
               name="Sua"
               value="Sửa">
    </td>

    <td>
        <input type="reset"
               value="Hủy">
    </td>
</tr>

</table>

</form>

</body>
</html>