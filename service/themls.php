<?php
$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"set names 'utf8'");

$maPhim = $_POST['maP'];
$maKhachHang = $_POST['maKH'];
$thoiGian = $_POST['thoiGian'];

$query ="Insert Into LICHSUXEMPHIM (ngayGioXem,maKhachHang,maPhim) Values ('$thoiGian','$maKhachHang','$maPhim')";

if(mysqli_query($connect,$query)){
    echo "success";
}
else{
    echo "error";
}

?>