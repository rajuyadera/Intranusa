<?php

//connect database
$conn = mysqli_connect("localhost", "root", "", "Intranusa");


function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// create

function createCctv($post){
    global $conn;

    $judul = htmlspecialchars($post["judul"]);
    $harga = htmlspecialchars($post["harga"]);
    $specifikasi = htmlspecialchars($post["specifikasi"]);

    $query = "INSERT INTO cctv ( judul, harga, specifikasi) VALUES 
           ( '$judul', '$harga', '$specifikasi');
           ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function createPanel($post){
    global $conn;

    $judul = htmlspecialchars($post["judul"]);
    $harga = htmlspecialchars($post["harga"]);

    $query = "INSERT INTO panel ( judul, harga ) VALUES 
           ( '$judul', '$harga');
           ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function createIt($post){
    global $conn;

    $judul = htmlspecialchars($post["judul"]);
    $keterangan = htmlspecialchars($post["keterangan"]);
     

    $query = "INSERT INTO it ( judul, keterangan ) VALUES 
           ( '$judul', '$keterangan');
           ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function createPortofolio($post){
    global $conn;

    $judul = htmlspecialchars($post["judul"]);
    $alamat = htmlspecialchars($post["alamat"]);
    $keterangan = htmlspecialchars($post["keterangan"]);

    // upload gambar
    $gambar = upload();
    if ( !$gambar){
        return false;
    }

    $query = "INSERT INTO portofolio ( judul, alamat, keterangan, gambar) VALUES 
           ( '$judul', '$alamat', '$keterangan', '$gambar');
           ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

 function upload(){
    $nameFile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload

    if( $error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek user harus upload gambar

    $ekstensi = ['jpg', 'jpeg', 'png'];
    // $format = explode('.', $nameFile);
    // $format = strtolower(end($format));
    $ektensiGambar = strtolower(pathinfo( $nameFile, PATHINFO_EXTENSION ));

    if ( !in_array($ektensiGambar, $ekstensi)){
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek size 
    if ( $ukuran > 6000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar');
              </script>";
        return false;
    }

    // jika berhasil pengecekan
    $newNameFile = uniqid();
    $newNameFile .= '.';
    $newNameFile .= $ektensiGambar;

    move_uploaded_file($tmpName, '/opt/lampp/htdocs/intranusa/admin/assets/image/portofolio/' . $newNameFile);

    return $newNameFile;

}



function createSosmed($post){
    global $conn;

    $instagram = htmlspecialchars($post["instagram"]);

    $query = "INSERT INTO sosmed ( instagram ) VALUES 
           ( '$instagram' );
           ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// delete

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM cctv WHERE id = $id");
    mysqli_query($conn, "DELETE FROM panel WHERE id = $id");
    mysqli_query($conn, "DELETE FROM it WHERE id = $id");
    mysqli_query($conn, "DELETE FROM portofolio WHERE id = $id");
    mysqli_query($conn, "DELETE FROM sosmed WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// edit

function updateCctv($post){
    global $conn;

    $id = $post["id"];
    $judul = htmlspecialchars($post["judul"]);
    $harga = htmlspecialchars($post["harga"]);
    $specifikasi = htmlspecialchars($post["specifikasi"]);

    $query = "UPDATE cctv SET 
               judul = '$judul',
               harga = '$harga',
               specifikasi = '$specifikasi'
               WHERE id = $id
               
               ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function updatePanel($post){
    global $conn;

    $id = $post["id"];
    $judul = htmlspecialchars($post["judul"]);
    $harga = htmlspecialchars($post["harga"]);

    $query = "UPDATE panel SET 
               judul = '$judul',
               harga = '$harga'
               WHERE id = $id
               
               ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function updateIt($post){
    global $conn;

    $id = $post["id"];
    $judul = htmlspecialchars($post["judul"]);
    $keterangan = htmlspecialchars($post["keterangan"]);

    $query = "UPDATE it SET 
               judul = '$judul',
               keterangan = '$keterangan'
               WHERE id = $id
               
               ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



function updatePortofolio($post){
    global $conn;

    $id = $post["id"];
    $judul = htmlspecialchars($post["judul"]);
    $alamat = htmlspecialchars($post["alamat"]);
    $keterangan = htmlspecialchars($post["keterangan"]);

    $query = "UPDATE portofolio SET 
               judul = '$judul',
               alamat = '$alamat',
               keterangan = '$keterangan'
               WHERE id = $id
               
               ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateSosmed($post){
    global $conn;

    $id = $post["id"];
    $instagram = htmlspecialchars($post["instagram"]);

    $query = "UPDATE sosmed SET 
               instagram = '$instagram'
               WHERE id = $id
               
               ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// search

function searchCctv($keyword){
    $query = "SELECT * FROM cctv WHERE 
              judul LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              specifikasi LIKE '%$keyword%'
               ";
        return query($query);
}

function searchPanel($keyword){
    $query = "SELECT * FROM panel WHERE 
              judul LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'
               ";
        return query($query);
}

function searchIT($keyword){
    $query = "SELECT * FROM panel WHERE 
              judul LIKE '%$keyword%' OR
              keterangan LIKE '%$keyword%'
               ";
        return query($query);
}

function searchPortofolio($keyword){
    $query = "SELECT * FROM portofolio WHERE 
              judul LIKE '%$keyword%' OR
              alamat LIKE '%$keyword%' OR
              keterangan LIKE '%$keyword%'
               ";
        return query($query);
}

function searchSosmed($keyword){
    $query = "SELECT * FROM sosmed WHERE 
              instagram LIKE '%$keyword%'
               ";
        return query($query);
}