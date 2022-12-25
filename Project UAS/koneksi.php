<?php

$conn = mysqli_connect("localhost","root","","ikon_lagu_db");

if(!$conn){
    die('Connection Failed'. mysqli_connect_error());
}

$result=mysqli_query($conn,"SELECT * FROM songs"); 

function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn; 
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;    
    }
    return $rows;
}

?>
