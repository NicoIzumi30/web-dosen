<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DataBase
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "121233";
    private $db = "web_dosen";
    private $conn;

    public function koneksi()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

class Users
{
    private $conn;
    // Alert ketika data berhasil di tambahkan/dihapus/diedit
    private function alertsuccess($action, $url)
    {
        $alert = "
        Swal.fire(
            'Sukses',
            'Data Berhasil " . $action . "',
            'success'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    // Alert ketika data gagal di tambahkan/dihapus/diedit
    private function alertdanger($action, $url)
    {
        $alert = "
        Swal.fire(
            'Failed',
            'Data Gagal " . $action . "',
            'error'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Mengambil semua data users
    public function tampil_users()
    {
        $data = array();
        $qry = $this->conn->query("SELECT * FROM users");
        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function count()
    {
        $qry = $this->conn->query(" SELECT COUNT(*) AS count FROM users WHERE role = 'customer'");
        $row = $qry->fetch_assoc();
        $count = $row['count'];
        return $count;
    }
    public function login($nik, $password)
    {
        $nik = $this->conn->real_escape_string($nik);
        $sql = "SELECT * FROM users WHERE nik = '$nik'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                return "<script> window.location.href = 'index.php'</script>";
            } else {
                // Password salah, tampilkan pesan kesalahan
                $message = 'Wrong Password';
            }
        } else {
            // nik tidak ditemukan, tampilkan pesan kesalahan
            $message = 'NIK is not regitered!';
        }
        return $message;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        return true;
    }
    // mengambil salah satu data users bedasarkan id
    public function ambil_users($id)
    {
        $id = $this->conn->real_escape_string($id);
        $qry = $this->conn->query("SELECT * FROM users WHERE id ='$id'");
        $pecah = $qry->fetch_assoc();
        return $pecah;
    }
}

class MataKuliah
{
    private $conn;
    // Alert ketika data berhasil di tambahkan/dihapus/diedit
    private function alertsuccess($action, $url)
    {
        $alert = "
        Swal.fire(
            'Sukses',
            'Data Berhasil " . $action . "',
            'success'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    // Alert ketika data gagal di tambahkan/dihapus/diedit
    private function alertdanger($action, $url)
    {
        $alert = "
        Swal.fire(
            'Failed',
            'Data Gagal " . $action . "',
            'error'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Mengambil semua data users
    public function tampil_mata_kuliah()
    {
        $data = array();
        $qry = $this->conn->query("SELECT * FROM mata_kuliah");
        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function count()
    {
        $qry = $this->conn->query("SELECT COUNT(*) AS count FROM mata_kuliah");
        $row = $qry->fetch_assoc();
        $count = $row['count'];
        return $count;
    }

    // Insert data users
    public function simpan_mata_kuliah($kode, $nama, $diskusi, $praktikum, $responsi, $uts, $uas)
    {
        // real escape string berguna untuk menghindari kode yang menyebabkan error di query sql nya
        $kode = $this->conn->real_escape_string($kode);
        $nama = $this->conn->real_escape_string($nama);
        $diskusi = $this->conn->real_escape_string($diskusi);
        $praktikum = $this->conn->real_escape_string($praktikum);
        $responsi = $this->conn->real_escape_string($responsi);
        $uts = $this->conn->real_escape_string($uts);
        $uas = $this->conn->real_escape_string($uas);
        $kueri = $this->conn->query("INSERT INTO mata_kuliah(kode_mata_kuliah,nama_mata_kuliah,diskusi,praktikum,responsi,uts,uas) VALUES('$kode','$nama','$diskusi','$praktikum','$responsi','$uts','$uas')");

        if ($kueri) {
            // ketika data berhasil ditambahkan
            return $this->alertsuccess('Ditambahkan', 'mata_kuliah.php');
        } else {
            // ketika gagal di tambahkan
            return $this->alertdanger('Ditambahkan', 'mata_kuliah.php');
        }
    }
    // update users bedasarkan id
    public function ubah_mata_kuliah($id, $kode, $nama, $diskusi, $praktikum, $responsi, $uts, $uas)
    {
        $id = $this->conn->real_escape_string($id);
        $kode = $this->conn->real_escape_string($kode);
        $nama = $this->conn->real_escape_string($nama);
        $diskusi = $this->conn->real_escape_string($diskusi);
        $praktikum = $this->conn->real_escape_string($praktikum);
        $responsi = $this->conn->real_escape_string($responsi);
        $uts = $this->conn->real_escape_string($uts);
        $uas = $this->conn->real_escape_string($uas);
        $kueri = $this->conn->query("UPDATE mata_kuliah SET kode_mata_kuliah='$kode',nama_mata_kuliah='$nama',diskusi='$diskusi',praktikum='$praktikum',responsi='$responsi',uts='$uts',uas='$uas' WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Diupdate', 'mata_kuliah.php');
        } else {
            return $this->alertdanger('Diupdate', 'mata_kuliah.php');
        }
    }

    // mengambil salah satu data users bedasarkan id
    public function ambil_mata_kuliah($id)
    {
        $id = $this->conn->real_escape_string($id);
        $qry = $this->conn->query("SELECT * FROM mata_kuliah WHERE id ='$id'");
        $pecah = $qry->fetch_assoc();
        return $pecah;
    }

    // menghapus data users bedasarkan id
    public function hapus_mata_kuliah($id)
    {
        $id = $this->conn->real_escape_string($id);
        $kueri = $this->conn->query("DELETE FROM mata_kuliah WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Dihapus', 'mata_kuliah.php');
        } else {
            return $this->alertdanger('Dihapus', 'mata_kuliah.php');
        }
    }
}
class Penilaian
{
    private $conn;
    // Alert ketika data berhasil di tambahkan/dihapus/diedit
    private function alertsuccess($action, $url)
    {
        $alert = "
        Swal.fire(
            'Sukses',
            'Data Berhasil " . $action . "',
            'success'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    // Alert ketika data gagal di tambahkan/dihapus/diedit
    private function alertdanger($action, $url)
    {
        $alert = "
        Swal.fire(
            'Failed',
            'Data Gagal " . $action . "',
            'error'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Mengambil semua data users
    public function tampil_penilaian($id)
    {
        $data = array();
        $qry = $this->conn->query("SELECT penilaian.*,mahasiswa.nama, mahasiswa.nim FROM penilaian JOIN mahasiswa ON penilaian.mahasiswa_id = mahasiswa.id WHERE penilaian.mata_kuliah_id = '$id'");
        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function count()
    {
        $qry = $this->conn->query(" SELECT COUNT(*) AS count FROM penilaian");
        $row = $qry->fetch_assoc();
        $count = $row['count'];
        return $count;
    }

    // Insert data users
    public function simpan_penilaian($mahasiswa_id, $mata_kuliah_id, $diskusi, $praktikum, $responsi, $uts, $uas)
    {
        // real escape string berguna untuk menghindari kode yang menyebabkan error di query sql nya
        $mahasiswa_id = $this->conn->real_escape_string($mahasiswa_id);
        $mata_kuliah_id = $this->conn->real_escape_string($mata_kuliah_id);
        $diskusi = $this->conn->real_escape_string($diskusi);
        $praktikum = $this->conn->real_escape_string($praktikum);
        $responsi = $this->conn->real_escape_string($responsi);
        $uts = $this->conn->real_escape_string($uts);
        $uas = $this->conn->real_escape_string($uas);
        $kueri = $this->conn->query("INSERT INTO penilaian(mahasiswa_id,mata_kuliah_id,diskusi,praktikum,responsi,uts,uas) VALUES('$mahasiswa_id','$mata_kuliah_id','$diskusi','$praktikum','$responsi','$uts','$uas')");

        if ($kueri) {
            // ketika data berhasil ditambahkan
            return $this->alertsuccess('Ditambahkan', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        } else {
            // ketika gagal di tambahkan
            return $this->alertdanger('Ditambahkan', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        }
    }
    // update users bedasarkan id
    public function ubah_penilaian($id, $mata_kuliah_id, $diskusi, $praktikum, $responsi, $uts, $uas)
    {
        $id = $this->conn->real_escape_string($id);
        $mata_kuliah_id = $this->conn->real_escape_string($mata_kuliah_id);
        $diskusi = $this->conn->real_escape_string($diskusi);
        $praktikum = $this->conn->real_escape_string($praktikum);
        $responsi = $this->conn->real_escape_string($responsi);
        $uts = $this->conn->real_escape_string($uts);
        $uas = $this->conn->real_escape_string($uas);
        $kueri = $this->conn->query("UPDATE penilaian SET diskusi='$diskusi',praktikum='$praktikum',responsi='$responsi',uts='$uts',uas='$uas' WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Diupdate', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        } else {
            return $this->alertdanger('Diupdate', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        }
    }

    // mengambil salah satu data users bedasarkan id
    public function ambil_penilaian($id)
    {
        $id = $this->conn->real_escape_string($id);
        $qry = $this->conn->query("SELECT * FROM penilaian WHERE id ='$id'");
        $pecah = $qry->fetch_assoc();
        return $pecah;
    }

    // menghapus data users bedasarkan id
    public function hapus_penilaian($id, $mata_kuliah_id)
    {
        $id = $this->conn->real_escape_string($id);
        $kueri = $this->conn->query("DELETE FROM penilaian WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Dihapus', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        } else {
            return $this->alertdanger('Dihapus', 'detail_penilaian.php?matkul=' . $mata_kuliah_id);
        }
    }
}
class Mahasiswa
{
    private $conn;
    // Alert ketika data berhasil di tambahkan/dihapus/diedit
    private function alertsuccess($action, $url)
    {
        $alert = "
        Swal.fire(
            'Sukses',
            'Data Berhasil " . $action . "',
            'success'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    // Alert ketika data gagal di tambahkan/dihapus/diedit
    private function alertdanger($action, $url)
    {
        $alert = "
        Swal.fire(
            'Failed',
            'Data Gagal " . $action . "',
            'error'
        );
        window.location.href = '" . $url . "';
        ";
        return $alert;
    }

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Mengambil semua data users
    public function tampil_mahasiswa()
    {
        $data = array();
        $qry = $this->conn->query("SELECT * FROM mahasiswa");
        while ($pecah = $qry->fetch_assoc()) {
            $data[] = $pecah;
        }
        return $data;
    }
    public function count()
    {
        $qry = $this->conn->query(" SELECT COUNT(*) AS count FROM mahasiswa");
        $row = $qry->fetch_assoc();
        $count = $row['count'];
        return $count;
    }

    // Insert data users
    public function simpan_mahasiswa($nim, $nama, $jk, $tanggal_lahir)
    {
        // real escape string berguna untuk menghindari kode yang menyebabkan error di query sql nya
        $nim = $this->conn->real_escape_string($nim);
        $nama = $this->conn->real_escape_string($nama);
        $jk = $this->conn->real_escape_string($jk);
        $tanggal_lahir = $this->conn->real_escape_string($tanggal_lahir);
        $kueri = $this->conn->query("INSERT INTO mahasiswa(nim,nama,jenis_kelamin,tanggal_lahir) VALUES('$nim','$nama','$jk','$tanggal_lahir')");
        if ($kueri) {
            return $this->alertsuccess('Ditambahkan', 'mahasiswa.php');
        } else {
            // ketika gagal di tambahkan
            return $this->alertdanger('Ditambahkan', 'mahasiswa.php');
        }
    }
    // update users bedasarkan id
    public function ubah_mahasiswa($id, $nim, $nama, $jk, $tanggal_lahir)
    {
        $id = $this->conn->real_escape_string($id);
        $nim = $this->conn->real_escape_string($nim);
        $nama = $this->conn->real_escape_string($nama);
        $jk = $this->conn->real_escape_string($jk);
        $tanggal_lahir = $this->conn->real_escape_string($tanggal_lahir);
        $kueri = $this->conn->query("UPDATE mahasiswa SET nim='$nim',nama='$nama',jenis_kelamin='$jk',tanggal_lahir='$tanggal_lahir' WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Diupdate', 'mahasiswa.php');
        } else {
            return $this->alertdanger('Diupdate', 'mahasiswa.php');
        }
    }

    // mengambil salah satu data users bedasarkan id
    public function ambil_mahasiswa($id)
    {
        $id = $this->conn->real_escape_string($id);
        $qry = $this->conn->query("SELECT * FROM mahasiswa WHERE id ='$id'");
        $pecah = $qry->fetch_assoc();
        return $pecah;
    }

    // menghapus data users bedasarkan id
    public function hapus_mahasiswa($id)
    {
        $id = $this->conn->real_escape_string($id);
        $kueri = $this->conn->query("DELETE FROM mahasiswa WHERE id='$id'");
        if ($kueri) {
            return $this->alertsuccess('Dihapus', 'mahasiswa.php');
        } else {
            return $this->alertdanger('Dihapus', 'mahasiswa.php');
        }
    }
}



$db = new DataBase();
$db->koneksi();
$conn = $db->getConnection();
$users = new Users($conn);
$mata_kuliah = new MataKuliah($conn);
$mahasiswa = new Mahasiswa($conn);
$penilaian = new Penilaian($conn);
