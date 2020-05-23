# Rekap Bantuan

Nama  : Wildan Ghiffarie Budhi <br />
NRP   : 05111740000184

## DATA DAN TABEL DATABASE

### 1. Tabel User
Dalam tabel ini berisikan data-data yang berkaitan dengan profil data User dari aplikasi ini, memiliki fields column sebagai berikut: 

| NO. | Nama Kolom | Tipe Data |    Index    |                                        Penjelasan                                       |
|:---:|:----------:|:---------:|:-----------:|:---------------------------------------------------------------------------------------:|
|  1  |     id     |    int    | Primary Key | Berisikan angka unik yang menjadi identifier dari user pengguna aplikasi                |
|  2  |    email   |  varchar  |    Unique   | Berisikan email user sebagai Credential Login user                                      |
|  3  |  password  |  varchar  |      -      | Berisikan data password user yang sudah dilakukan Hashing sebagai Credential Login user |
|  4  |    name    |  varchar  |      -      | Berisikan data Nama dari user                                                           |

### 2. Table Kategori_Bantuan
Dalam tabel ini berisikan list Kategori Bantuan yang tersedia pada Aplikasi.

| NO. | Nama Kolom | Tipe Data |    Index    |                                            Penjelasan                                           |
|:---:|:----------:|:---------:|:-----------:|:-----------------------------------------------------------------------------------------------:|
|  1  |     id     |    int    | Primary Key | Berisikan angka unik yang menjadi identifier dari Kategori Bantuan yang tersedia dalam aplikasi |
|  2  |    name    |  varchar  |      -      | Berisikan data Nama dari Kategori Bantuan                                                       |

### 3. Tabel Transaksi_Bantuan_User
Tabel ini berisi kumpulan data Transaksi Bantuan yang sudah pernah diberikan oleh user.

| NO. |    Nama Kolom    | Tipe Data |    Index    |                                          Penjelasan                                          |
|:---:|:----------------:|:---------:|:-----------:|:--------------------------------------------------------------------------------------------:|
|  1  |        id        |    int    | Primary Key | Berisikan angka unik yang menjadi identifier dari Transaksi Bantuan yang diberikan oleh User |
|  2  |      user_id     |    int    | Foreign Key | Berisikan data ID dari User yang memberikan Bantuan                                          |
|  3  | transaction_date |    date   |      -      | Metadata berupa penanda waktu kapan Transaksi Bantuan ini dilakukan.                         |

### 4. Tabel Detail_Bantuan_User
Tabel ini berisi detail dari Transaksi Bantuan yang diberikan oleh user

| NO. |      Nama Kolom      | Tipe Data |    Index    |                                              Penjelasan                                             |
|:---:|:--------------------:|:---------:|:-----------:|:---------------------------------------------------------------------------------------------------:|
|  1  |          id          |    int    | Primary Key | Berisikan angka unik yang menjadi identifier dari Detail Transaksi Bantuan yang diberikan oleh User |
|  2  | transaksi_bantuan_id |    int    | Foreign Key | Berisikan data ID dari Transaksi Bantuan User yang memberikan Bantuan                               |
|  3  |  kategori_bantuan_id |    int    | Foreign Key | Berisikan data ID dari Kategori Bantuan yang memberikan Bantuan                                     |
|  4  |       quantity       |    int    |      -      | Berisikan jumlah Bantuan dengan Kategori tertentu yang diberikan oleh User.                         |

## VIEWS

### 1. Landing Page

![Landing Page](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Landing%20Page.png)

Page ini merupakan page pertama yang akan ditemui user pada saat membuat aplikasi. Berisisikan ucapat Selamat Datang dan berisikan Rekap Bantuan keseluruhan, sehingga user dapat mengetahui Bantuan dengan kategori mana yang masih membutuhkan bantuan.

### 2. Login Page

![Login Page](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Login%20Page.png)

Page ini digunakan pengguna untuk melakukan Authentikasi sebelum melakukan aktifitas yang membutuhkan akses khusus. Terdapat 2 Form input yaitu, Email dan Password. Terdapat juga tawaran untuk membuat akun bagi pengguna yang belum memiliki akun.

### 3. Register Page

![Register Page](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Register%20Page.png)

Page ini digunakan untuk pengguna yang belum memiliki akun mendaftarkan diri pada Web ini.

### 4. History Transaksi Page

![History Transaksi Page](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/History%20Transaksi.png)

Page ini merupakan Page pertama yang dikunjungi oleh Pengguna setelah melakukan Login. Berisikan data history transaksi bantuan yang sudah pernah pengguna lakukan.

### 5. Create New Transaksi Page

![Create New Transaksi Page 1](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Create%20New%20Transaksi%201.png)

Page ini digunakan untuk membuat Transaksi Bantuan baru. Terdapat tombol ```ADD NEW``` dengan Dropdown pilihan yang Dinamis sesuai dengan Kategori Bantuan yang ada. Lalu jika kita pilih salah satu, maka akan muncul form yang terkait sesuai dengan Kategori Bantuan yang dipilih. Dalam satu transaksi bisa terdapat berbagai macam Kategori Bantuan. Seperti ditunjukkan dibawah :

![Create New Transaksi Page 2](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Create%20New%20Transaksi%202.png)

Terdapat Form isian Jumlah untuk setiap Kategori Bantuan yang diberikan. Dan juga tombol Delete yang dinamin dapat menghapus pilihan kategori tertentu.

### 6. Show Detail Transaksi Page

![Show Detail Transaksi](https://github.com/wildangbudhi/RekapBantuan/blob/master/Screenshoot/Show%20Detail%20Transaksi.png)

Page ini digunakan untuk melihat detail dari setiap Transaksi Bantuan.

## CONRTOLLER

### 1. Base Controller
Merupakan controller yang menjadi landasan atau parent dari semua controller.

### 2. IndexController
Merupakan controller yang menghandle Landing Page. Controller ini memiliki fungsi sebagai berikut :

<strong>indexAction</strong>
Fungsi ini menghandle Agregasi Data Bantuan, menganbil & mengirimkan data tersebut ke View dan menampilkan View Landing Page.

### 3. ErrorController
Merupakan Controller yang menghandle jika terjadi request yang tidak sesuai atau terjadi sebuah kesalahan sistem. Controller ini memiliki fungsi sebagai berikut :

<strong>show404Action</strong>
Fungsi ini menghandle menampilkan Page Error 404

<strong>show401Action</strong>
Fungsi ini menghandle menampilkan Page Error 401

<strong>show500Action</strong>
Fungsi ini menghandle menampilkan Page Error 500

### 4. RegisterController
Merupakan controller yang menghandle Register Page. Controller ini memiliki fungsi sebagai berikut :

<strong>indexAction</strong>
Fungsi ini menghandle 2 Request yang memiliki patter url ```/register```. Jika request tersebut menggunakan metode ```GET``` maka fungsi ini akan mengirimkan Response beruapa View atau Page Register. Jika request tersebut menggunakan metode ```POST``` maka fungsi ini akan mengolah data yang dikirimkan dengan membuat data baru pada Table Users, jika tidak terjadi kesalahan, maka fungsi ini akan mengarahkan user kembali ke Login Page.

### 5. SessionController
Merupakan controller yang menghandle segala yang berhubungan dengan Session yaitu Login dan Logout. Controller ini memiliki fungsi sebagai berikut :

<strong>indexAction</strong>
Fungsi ini menghandle dengan memberikan response View Login Page.

<strong>startAction</strong>
Fungsi ini menghandle data yang dikirimkan dari Login Page dengan melakukan Authentifikasi dan membuat session.

<strong>endAction</strong>
Fungsi ini menghandle Logout dengan menghapus session.

### 6. TransaksiController
Merupakan controller yang menghandle segala kegiatan yang berhubungan denga Transaksi Bantuan dan Detail. Controller ini memiliki fungsi sebagai berikut :

<strong>indexAction</strong>
Fungsi ini menghandle pengambilan data Transaksi dari user dan menampilkannya ke Histori Transaksi Page.

<strong>newAction</strong>
Fungsi ini menghandle pembuatan Transaksi baru. Jika request yang diterima menggunakan metode ```GET``` maka fungsi ini akan menampilkan ```Create New Transaksi Page```. Jika request yang diterima menggunakan metode ```POST``` maka fungsi ini akan memproses data yang dikirimkan dari ```Create New Transaksi Page``` dengan dibuatkannya data baru pada Table ```transaksi_bantuan_user``` dan ```detail_bantuan_user```, lalu mengarahkan user kembali ke Page Histori Transaksi.

<strong>deleteAction</strong>
Fungsi ini mengahandle penghapusan Data Transaksi tertentu.

<strong>detailAction</strong>
Fungsi ini menghandle pengambilan data Detail Bantuan dari sebuah Transaksi yang sudah dilakukan oleh user dan menampilkan pada ```Show Detail Transaksi Page```

## MODEL

### 1. TransaksiBantuanUser
Base Model untuk untuk data pada Database Tabel transaksi_bantuan_user

### 2. Users
Base Model untuk untuk data pada Database Tabel users

### 3. DetailBantuanUser
Base Model untuk untuk data pada Database Tabel detail_bantuan_user.

### 4. KategoriBantuan
Base Model untuk untuk data pada Database Tabel kategori_bantuan.