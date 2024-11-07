
# Web Dosen

Dokumentasi ini dibuat bertujuan untuk memudahkan developer dalam melakukan installasi project web dosen yang berbasis php native.




![Logo](https://i.postimg.cc/FFqn6Bv0/wp11840910-frieren-wallpapers-1.jpg)


## Requirements

- PHP versi 7.4 atau lebih tinggi
- Database (MySQL)




## Installation

Clone the project

```bash
  git clone -b backend-dev https://github.com/NicoIzumi30/web-dosen.git
```
Go to the project directory
```bash
  cd web-dosen
```
Configuration Database (import web_dosen.sql to your database)
```bash
  cd class
```
```bash
class DataBase
{
    private $host = "localhost";
    private $user = "username_anda";
    private $pass = "password_anda";
    private $db = "nama_database_anda";
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
```
## Run Project
```bash
  php php -S localhost:3000
  or
  localhost/web-dosen
```