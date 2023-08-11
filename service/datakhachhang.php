<?php
$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"SET NAMES 'utf8'");
$makh=$_GET['maKhachHang'];
$sql="SELECT * FROM khachhang WHERE maKhachHang= '$makh'";

$data = mysqli_query($connect,$sql);

$mangkhachhang = array();
while($row = mysqli_fetch_assoc($data)){
    array_push($mangkhachhang, array("maKhachHang"=>$row['maKhachHang'],"tenKhachHang"=>$row['tenKhachHang'],"SDT"=>$row['SDT'],"email"=>$row['email'],"matKhau"=>$row['matKhau']));
}

echo json_encode($mangkhachhang);
?>