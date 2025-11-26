*// copy semua yg di bawah ini mulai dari create sampe titik koma, lalu paste di sql di php myadmin *//

CREATE DATABASE sekolah;
USE sekolah;

CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL,
    tanggal DATE NOT NULL
);
