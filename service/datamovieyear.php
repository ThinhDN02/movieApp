<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"SET NAMES 'utf8'");
$nam = $_GET['namRaMat'];


if($nam < 2000){
    $query= "SELECT * FROM phim where namRaMat < 2000";
}else if($nam < 2010){
    $query= "SELECT * FROM phim where namRaMat >= 2000 and namRaMat < 2010";
}else if($nam < 2020){
    $query= "SELECT * FROM phim where namRaMat >= 2010 and namRaMat < 2020";
}else{
    $query= "SELECT * FROM phim where namRaMat >= 2020";
}


$data = mysqli_query($connect,$query);


$mangls_phim = array();
while($row = mysqli_fetch_assoc($data)){
    array_push($mangls_phim, array("maPhim"=>$row['maPhim'],"tenPhim"=>$row['tenPhim'],"soDiemPhim"=>$row['soDiemPhim'],"anhBia"=>$row['anhBia'],"maTheLoai"=>$row['maTheLoai']));
}
echo json_encode($mangls_phim);
?>