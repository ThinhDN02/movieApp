<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"set names 'utf8'");

$Phim = $_GET['maPhimCT'];
//$Phim = "PH07";

$query ="select * from phim where maPhim = '$Phim'";

$data = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($data)){
	$ct = array("maPhim"=>$row['maPhim'],"tenPhim"=>$row['tenPhim'],"nguonPhim"=>$row['nguonPhim'],"noiDungPhim"=>$row['noiDungPhim'],"soDiemPhim"=>$row['soDiemPhim'],"namRaMat"=>$row['namRaMat'],"anhBia"=>$row['anhBia'],"nguonTrailer"=>$row['nguonTrailer'],"maTheLoai"=>$row['maTheLoai'],"doTuoiChoPhep"=>$row['doTuoiChoPhep']);
}

echo json_encode($ct);

?>