<?php

$connect = mysqli_connect("localhost","root","","ql_phim");
mysqli_query($connect,"SET NAMES 'utf8'");

$query= "SELECT * FROM lichsuxemphim";

$data = mysqli_query($connect,$query);

class LichSuXemPhim{
    function LichSuXemPhim($ngayGioXem,$maKhachHang,$maPhim){
        $this->ngx = $ngayGioXem;
        $this->makh = $maKhachHang;
        $this->maph = $maPhim;
    }
}
$mangls_phim = array();
while($row = mysqli_fetch_assoc($data)){
    // echo $row['ngayGioXem'],'<br/>';
    // echo $row['maKhachHang'],'<br/>';
    // echo $row['maPhim'],'<br/>';
    array_push($mangls_phim, array("ngayGioXem"=>$row['ngayGioXem'],"maKhachHang"=>$row['maKhachHang'],"maPhim"=>$row['maPhim']));
}
echo json_encode($mangls_phim);
?>