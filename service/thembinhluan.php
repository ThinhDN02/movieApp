<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"set names 'utf8'");

$maPhim = $_POST['maP'];
$maKhachHang = $_POST['maKH'];
$noiDungBinhLuan =$_POST['noidungbl'];
$thoigian =$_POST['thoiGian'];

$query ="Insert  Into BINHLUAN (maPhim,maKhachHang,noiDungBinhLuan,thoiGianBinhLuan) Values ('$maPhim','$maKhachHang','$noiDungBinhLuan','$thoigian')";

if(mysqli_query($connect,$query)){
    echo "success";
}
else{
    echo "error";
}

?>