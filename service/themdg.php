<?php
$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"set names 'utf8'");

$maPhim = $_POST['maP'];
$maKhachHang = $_POST['maKH'];
$diem = $_POST['soDiem'];

$query ="Insert  Into  DANHGIA (maPhim,maKhachHang,soDiemDanhGia)Values ('$maPhim','$maKhachHang',$diem)";

if(mysqli_query($connect,$query)){
    echo "success";
}
else{
    echo "error";
}

?>