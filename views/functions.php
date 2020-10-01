<?php

$conn = mysqli_connect("localhost:3307", "root", "", "pelayanan_kesehatan");
// $conn = mysqli_connect("popay-apps.online", "popayapp_altafbeta", "Password11!!", "popayapp_pelayanan_kesehatan");

function query($query){
    global $conn;
   $result = mysqli_query($conn, $query);
   $rows = [];
   while($row = mysqli_fetch_assoc($result)){
       $rows[] = $row;
   }
   return $rows;
}

function cari($datas){
    if(empty($datas)){
        return false;
    }else{
    $nokk = $datas["nokk"];
    $nik = $datas["nik"];
    $query = "SELECT * FROM tb_pasien
                WHERE
                nik = '$nik' AND
                nokk = '$nokk'";

    return query($query);
    }          
}

function update($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    $email = htmlspecialchars(strtolower($datas["email"]));
    $password = mysqli_real_escape_string($conn,$datas["password"]);
    $cpassword = $datas["cpassword"];

    $querycek = "SELECT * FROM tb_pasien WHERE email = '$email'";

    $result = mysqli_query($conn, $querycek);

    if(mysqli_fetch_assoc($result)){
        // echo "<script>
        //         alert('Email ini sudah digunakan!');
        // </script>";
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE tb_pasien SET
                nama = '$nama',
                gender = '$gender',
                tempatlahir = '$tempatlahir',
                tgllahir = '$tgllahir',
                alamat = '$alamat',
                email = '$email',
                passwd = '$password'
            WHERE nokk = '$nokk' AND nik = '$nik'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function insertt($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    $email = htmlspecialchars(strtolower($datas["email"]));
    $password = mysqli_real_escape_string($conn,$datas["password"]);
    $cpassword = $datas["cpassword"];
    $faskes = $datas["faskes"];
    $namafaskes = $datas["namafaskes"];

    $querycek = "SELECT * FROM tb_pasien WHERE email = '$email'";

    $result = mysqli_query($conn, $querycek);

    // if(mysqli_fetch_assoc($result)){
    //     echo "<script>
    //             alert('Email ini sudah digunakan!');
    //     </script>";
    //     return false;
    // }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO tb_pasien VALUES
                ('$nik','$nokk','$nama','$gender','$tempatlahir','$tgllahir','$alamat','$email','$password','$faskes','$namafaskes')    
             ";
             

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function loginpasien($datas){
    global $conn;

    $email = $datas["email"];
    $password = $datas["password"];
    

    $query = "SELECT * FROM tb_pasien WHERE email = '$email'
                ";
    
    $result = mysqli_query($conn, $query);
    

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["passwd"])){
            return true;
        }else{
            return false;
        }
    }
}

function insertBerobat($datas){
    global $conn;
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $tglberobat = $datas["tglberobat"];
    $keluhan = htmlspecialchars(ucwords(strtolower($datas["keluhan"])));
    $faskes = $datas["faskes"];
    $namafaskes = $datas["namafaskes"];

    

    $querycek = "SELECT * FROM tb_pasien WHERE nik = '$nik'";
    
    $result = mysqli_query($conn, $querycek);
    $row = mysqli_fetch_assoc($result);
    

    $nama = $row["nama"];
    $gender = $row["gender"];
    $alamat = $row["alamat"];


    $query = "INSERT INTO tb_berobat VALUES
                ('','$nik','$nama','$gender','$keluhan','$tglberobat','$faskes','$namafaskes','$alamat')    
             ";

    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function updateProfil($datas){
    global $conn;
    $nokk = htmlspecialchars(str_replace(" ","",$datas["nokk"]));
    $nik = htmlspecialchars(str_replace(" ","",$datas["nik"]));
    $nama = htmlspecialchars(ucwords(strtolower($datas["nama"])));
    $gender = $datas["gender"];
    $tempatlahir = htmlspecialchars(ucwords(strtolower($datas["tempatlahir"])));
    $tgllahir = $datas["tgllahir"];
    $alamat = htmlspecialchars(ucwords(strtolower($datas["alamat"])));
    $email = htmlspecialchars(strtolower($datas["email"]));
    

    $querycek = "SELECT * FROM tb_pasien WHERE email = '$email'";

    $result = mysqli_query($conn, $querycek);
    
    $row = mysqli_fetch_assoc($result);

    if($result){  
        if($nik != $row["nik"]){
            return false;
        } 
    }
    
    // if($row > 0){

    // }else{

    // }

    // if(mysqli_fetch_assoc($result)){
        

    //     echo "<script>
    //             alert('Email ini sudah digunakan!');
    //     </script>";
    //     return false;
    // }


    $query = "UPDATE tb_pasien SET
                nama = '$nama',
                gender = '$gender',
                tempatlahir = '$tempatlahir',
                tgllahir = '$tgllahir',
                alamat = '$alamat',
                email = '$email'
            WHERE nokk = '$nokk' AND nik = '$nik'
    ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}



?>