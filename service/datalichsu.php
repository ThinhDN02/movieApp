<?php
$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"SET NAMES 'utf8'");
$makh=$_GET['maKhachHang'];
$sql="SELECT ngayGioXem,lichsuxemphim.maKhachHang,lichsuxemphim.maPhim,soDiemDanhGia FROM lichsuxemphim,danhgia WHERE lichsuxemphim.maPhim=danhgia.maPhim AND lichsuxemphim.maKhachHang=danhgia.maKhachHang AND lichsuxemphim.makhachHang= '$makh'";

$data = mysqli_query($connect,$sql);

$mangls_phim = array();
while($row = mysqli_fetch_assoc($data)){
    array_push($mangls_phim, array("ngayGioXem"=>$row['ngayGioXem'],"maKhachHang"=>$row['maKhachHang'],"maPhim"=>$row['maPhim'],"soDiemDanhGia"=>$row['soDiemDanhGia']));
}

echo json_encode($mangls_phim);
?>