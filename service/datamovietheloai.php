<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"SET NAMES 'utf8'");
$theloai = $_GET['maTheLoai'];
$query= "SELECT * FROM phim where maTheLoai = '$theloai'";

$data = mysqli_query($connect,$query);


$mangls_phim = array();
while($row = mysqli_fetch_assoc($data)){
    array_push($mangls_phim, array("maPhim"=>$row['maPhim'],"tenPhim"=>$row['tenPhim'],"soDiemPhim"=>$row['soDiemPhim'],"anhBia"=>$row['anhBia'],"maTheLoai"=>$row['maTheLoai']));
}
echo json_encode($mangls_phim);
?>