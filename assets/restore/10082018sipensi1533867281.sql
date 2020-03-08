DROP TABLE admin;

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `hak_akses` int(1) DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("1","admin","21232f297a57a5a743894a0e4a801fc3","1");
INSERT INTO admin VALUES("2","kepsek","8561863b55faf85b9ad67c52b3b851ac","2");



DROP TABLE calon_siswa;

CREATE TABLE `calon_siswa` (
  `nisn` varchar(10) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jkel` varchar(10) DEFAULT NULL,
  `gol_drh` varchar(10) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `warga_negara` varchar(3) DEFAULT NULL,
  `wali` varchar(30) DEFAULT NULL,
  `alamat_wali` varchar(40) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(30) DEFAULT NULL,
  `pendidikan_wali` varchar(20) DEFAULT NULL,
  `no_ijazah` varchar(15) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO calon_siswa VALUES("19961126","37f3c4ac0ecd4a50c7f7ea1bd2b017c7","Arif Hidayat","Jakarta","1996-11-26","L","O","Bekasi","Islam","WNI","Erwanto","Bekasi","0895349221830","Karyawan Swasta","SMA","19961126","06082018193055060820181922300508201818473705082018150613050820181058510308201822524401072018044654Format-Ijazah-SMA-IPA-2016.jpg","2018-08-06","2");
INSERT INTO calon_siswa VALUES("26111996","0ff6c3ace16359e41e37d40b8301d67f","Arif","Jakarta","1996-11-26","L","O","Bekasi","Islam","WNI","Erwanto","Bekasi","0895349221830","Karyawan Swasta","SMA","26111996","0508201818473705082018150613050820181058510308201822524401072018044654Format-Ijazah-SMA-IPA-2016.jpg","2018-08-05","0");



DROP TABLE pembayaran;

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_psb` varchar(10) DEFAULT NULL,
  `atas_nama` varchar(30) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `nominal` varchar(20) DEFAULT NULL,
  `bukti_pembayaran` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpembayaran`),
  KEY `no_psb` (`no_psb`),
  KEY `idadmin` (`idadmin`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`no_psb`) REFERENCES `pendaftaran` (`no_psb`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO pembayaran VALUES("6","000001","Erwanto","2018-08-05","450000","050820182016380508201811491104062018094701gambar-kwitansi-kosong.jpg","0","1");
INSERT INTO pembayaran VALUES("9","000002","Erwanto","2018-08-06","450000","070820181333340508201811295102072018120019gambar-kwitansi-kosong.jpg","2","1");



DROP TABLE pendaftaran;

CREATE TABLE `pendaftaran` (
  `no_psb` varchar(10) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jkel` varchar(10) DEFAULT NULL,
  `gol_drh` varchar(10) DEFAULT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `warga_negara` varchar(3) DEFAULT NULL,
  `wali` varchar(30) DEFAULT NULL,
  `alamat_wali` varchar(40) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `pekerjaan_wali` varchar(30) DEFAULT NULL,
  `pendidikan_wali` varchar(20) DEFAULT NULL,
  `no_ijazah` varchar(15) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`no_psb`) USING BTREE,
  KEY `nisn` (`nisn`),
  CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `calon_siswa` (`nisn`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pendaftaran VALUES("000001","26111996","0ff6c3ace16359e41e37d40b8301d67f","Arif","Jakarta","1996-11-26","L","O","Bekasi","Islam","WNI","Erwanto","Bekasi","0895349221830","Karyawan Swasta","SMA","26111996","0508201818473705082018150613050820181058510308201822524401072018044654Format-Ijazah-SMA-IPA-2016.jpg","2018-08-05","0");
INSERT INTO pendaftaran VALUES("000002","19961126","37f3c4ac0ecd4a50c7f7ea1bd2b017c7","Arif Hidayat","Jakarta","1996-11-26","L","O","Bekasi","Islam","WNI","Erwanto","Bekasi","0895349221830","Karyawan Swasta","SMA","19961126","06082018193055060820181922300508201818473705082018150613050820181058510308201822524401072018044654Format-Ijazah-SMA-IPA-2016.jpg","2018-08-06","2");



