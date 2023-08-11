<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"set names 'utf8'");

$Phim = $_GET['maPhimBL'];
//$Phim = "PH01";

$query ="select maKhachHang,noiDungBinhLuan from binhluan where maPhim = '$Phim'";

$data = mysqli_query($connect,$query);
$mangBL = array();
while($row = mysqli_fetch_assoc($data)){
	$ct = array("maKhachHang"=>$row['maKhachHang'],"noiDungBinhLuan"=>$row['noiDungBinhLuan']);
    //echo json_encode($ct);
    array_push($mangBL,$ct);
}

echo json_encode($mangBL);

?>