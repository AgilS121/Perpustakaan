<?php
//pemanggilan database di file config
include 'config.php';

    function query($query) {//fungsi queri sebagai penyingkat nantinya jika ada data yang mau dipilih 
        global $db; 
        $result = mysqli_query($db, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah_peminjaman($data){ //fungsi tambah data untuk peminjaman buku
        global $db;

        $users = htmlspecialchars($data['users']); // membuat variabel users yang berisi data dari form tambah peminjam buku
        $buku  = htmlspecialchars($data['buku']); // membuat variabel buku yang berisi dari data form tambah peminjaman buku
        $tgl_kembali = NULL; // tanggal kembali berisi null atau data kosong karena peminjaman dan pengembalian dilakukan pada waktu yang berbeda

        //inisialiasai variabel query yang berisi sebgai inputan data ke database dengan value yang sesuai dan isi data yang sesuai
        $query = mysqli_query($db, 'insert into meminjam(tgl_pinjam,tgl_kembali,id_users,id_buku,kembali) 
        values ("'.date('Y-m-d').'","'.$tgl_kembali.'","'.$users.'","'.$buku.'",1)');

        //nilai pengembalian berbentuk row dari database
        return mysqli_affected_rows($db);
    }

    function tambah_kategori($data){
        global $db;

        $nama = htmlspecialchars($data['nama_kategori']);
        $alamat = htmlspecialchars($data['keterangan']);
    
        $sql = "INSERT INTO kategori VALUES
            ('', '$nama', '$alamat')";
        mysqli_query($db, $sql);

        return mysqli_affected_rows($db);
    }

    function tambah_penerbit($data){
        global $db;

        $nama = htmlspecialchars($data['nama_penerbit']);
        $alamat = htmlspecialchars($data['alamat']);
        $no_telp = htmlspecialchars($data['no_telp']);
    
        $sql = "INSERT INTO penerbit VALUES
            ('', '$nama', '$alamat', '$no_telp')";
        mysqli_query($db, $sql);

        return mysqli_affected_rows($db);
    }

    function tambah_buku($data) { //fungsi sebagai tambah data tabel buku
        global $db;
    
        $judul = htmlspecialchars($data['judul']); // pengambilan data nama buku pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $penerbit = htmlspecialchars($data['penerbit']); // pengambilan data nama peenrbit pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $tahun = htmlspecialchars($data['tahun']); // pengambilan data nama tahun pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $penulis = htmlspecialchars($data['penulis']); // pengambilan data nama penulis pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $kd_buku = htmlspecialchars($data['kd_buku']);// pengambilan data kode buku penulis pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $descripsi = htmlspecialchars($data['descripsi']);// pengambilan data nama deskripsi pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $kategori = htmlspecialchars($data['kategori']);// pengambilan data nama kategori pada form tambah buku kemudian diiinisilisasi mmenjadi variabel
        $tgl_input = date('Y-m-d'); // variabel tanggal yang berisi tanggal, akan otomatis diinputkan berdasarkan tanggal sekarang

        // upload gambar
        $cover = $_FILES['cover']['name']; // upload gambar berupa file yang bernama cover kemudian dibuat variabel cover
        $tmp_name = $_FILES['cover']['tmp_name']; // proses upload, file gambar yang di upload akan dikirimkan ke tmp_name atau direktori default di komputer atau laptop kita
        move_uploaded_file($tmp_name, "../public/img/".$cover); // mengubah atau memindahkan file yang di upload ke folder public img 


        //fungsi sql untuk penambahan data ke tabel buku yang berada ddi database , pengisian data ini harus sesuai urutan juga yang ada di database, jika tidak akan terjadi suatu kendala tertentu atau nama file yang diinputkan akan tertukar
        $sql = "INSERT INTO buku VALUES
        ('', '$judul', '$penerbit', '$tahun', '$penulis','$kd_buku' , '$cover', '$descripsi', '$kategori', '$tgl_input')";
        mysqli_query($db, $sql);

        return mysqli_affected_rows($db);  //nilai pengembalian berbentuk row dari database

    }

    function ubah_kategori($data) { // fungsi edit kategori 
        global $db;
        $id = $data['id']; // pengambilan id dari form edit yang berada pada file  kategori edit
        $nama_kategori = htmlspecialchars($data['nama_kategori']); // pengambilan nama kategori
        $keterangan = htmlspecialchars($data['keterangan']); // pengambilan keterangan

        //query atau perintah edit ke database tabel kategori berdasarkan id yang dipilih 
        // nama_kategori pada sisi kiri diambil berdarkan database, jadi harus sesuai dan yang sisi kanan pemangilan pada variabel yang telah dibuat diatasnya
        
        $query = "UPDATE kategori SET 
        nama_kategori = '$nama_kategori', 
        keterangan = '$keterangan' 
        WHERE id = $id";
        
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);//nilai pengembalian berbentuk row dari database
    }

    function ubah_penerbit($data){ //fungsi ubah penerbit
        global $db;

        $id = $data['id'];// pengambilan id dari form edit yang berada pada file  penerbit edit
        $nama_penerbit = htmlspecialchars($data['nama_penerbit']); // pengambilan nama penerbit
        $alamat = htmlspecialchars($data['alamat']);// pengambilan alamat 
        $no_telp = htmlspecialchars($data['no_telp']);//penngambilan no telp

        //query atau perintah edit ke database tabel kategori berdasarkan id yang dipilih 
        // nama_kategori pada sisi kiri diambil berdarkan database, jadi harus sesuai dan yang sisi kanan pemangilan pada variabel yang telah dibuat diatasnya
        
        $query = "UPDATE penerbit SET
        nama_penerbit = '$nama_penerbit',
        alamat = '$alamat',
        no_telp = '$no_telp'
        WHERE id = $id";

        mysqli_query($db, $query);

        return mysqli_affected_rows($db); //nilai pengembalian berbentuk row dari database
    }

    function ubah_buku($data) { //fungsi ubah buku yang diambil dari file buku edit pada folder admin
        global $db;

        $id = $data['id']; // pengambilan id dari form
        $judul = htmlspecialchars($data['judul']); // pengambilan  name judul
        $penerbit = htmlspecialchars($data['penerbit']); // pengambilan name penerbit
        $tahun = htmlspecialchars($data['tahun']); // pengambilan name tahun 
        $penulis = htmlspecialchars($data['penulis']); // pengambilan name penulis
        $kd_buku = htmlspecialchars($data['kd_buku']); // pengambilan name kode buku
        $coverlama = htmlspecialchars($data['coverlama']); // pengambilan name cover lana
        $descripsi = htmlspecialchars($data['descripsi']); // pengambilan name deskripsi
        $kategori = htmlspecialchars($data['kategori']); // pengambilan name kategori
        $tgl_input = date('Y-m-d'); //pengambilan data tanggal sekarang
       
        if( $_FILES['cover']['error'] === 4 ) { // pengkondisian, jika tidak ada file yang diupload
            $cover = $coverlama; // maka variabel kover akan memanggil variabel cover lama sebagai gantiinya, jadi file akan tetap sama
        } else { // jika tidak, atau ada file yang diupload
            $cover = $_FILES['cover']['name']; // variabel cover akan mendefiniskan atau mengambil nama cover yang berbentuk file
            $tmp_name = $_FILES['cover']['tmp_name']; // kemudian file itu akka diupload di directory default
            move_uploaded_file($tmp_name, "../public/img/".$cover); // pe mindahan file upload ke file public img
        }
        
        //query atau perintah edit ke database tabel kategori berdasarkan id yang dipilih 
        // pada sisi pada sisi kiri diambil berdarkan database, jadi harus sesuai dan yang sisi kanan pemangilan pada variabel yang telah dibuat diatasnya
       
        $query = "UPDATE buku SET 
        judul = '$judul', 
        id_penerbit = '$penerbit', 
        tahun_terbit = '$tahun', 
        penulis = '$penulis', 
        kd_buku = '$kd_buku', 
        cover = '$cover', 
        descripsi = '$descripsi', 
        id_kategori = '$kategori', 
        tgl_input = '$tgl_input' 
        WHERE id = $id ";
    
        mysqli_query($db, $query);
    
        return mysqli_affected_rows($db);	
    }

    function registrasi($data) { //fungsi registrasi
        global $db;
    
        $nama = stripslashes($data["nama"]); //pengambilan data nama dari form register, fungsi dari stripslashes yaitu agar data berbentuk string
        $username = strtolower(stripslashes($data["username"])); // pengambilan data username, fungsi strolwer yaiut agar data yang diinputkan menjadi huru kecil semua
        $password = mysqli_real_escape_string($db, $data["password"]); //pengambilan data password, fungsi dari escape string agar tidak ada karakter aneh yang dibuat dan data berbentuk strign
        $password1 = mysqli_real_escape_string($db, $data["password1"]);
    
        // cek username sudah ada atau belum
        $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    
        if( mysqli_fetch_assoc($result) ) { // jika username sudah ada pada fungsi if akan dijalankan dimana akan menampilkan pesan error karena username bersifat uniqe
            echo "<script>
                    alert('username sudah terdaftar!')
                  </script>";
            return false;
        }
    
    
        // cek konfirmasi password, pengecekan password dan konfirm pasword diperlukan agar password 1 dan 2 sesuai atau data sama sehingga tidak ada kekeliruan ketika masuk dalam database
        if( $password !== $password1 ) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!');
                  </script>";
            return false;
        }
    
        // enkripsi password, agar password yang dibuat menjadi lebih aman, tidak berbentuk text pada umumnya
        $password = md5($password);
    
        // tambahkan userbaru ke database
        mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$password','anggota', '$nama')");
    
        return mysqli_affected_rows($db);
    
    }
    