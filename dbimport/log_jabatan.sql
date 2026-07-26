# Tracking report for table `jabatan`
# 2026-07-26 20:52:06

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `dept_id` smallint(6) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `nama_bangunan` varchar(50) NOT NULL,
  `nama_ketua_jabatan` varchar(40) NOT NULL,
  `jumlah_pekerja` smallint(6) NOT NULL,
  `jumlah_pemalas` smallint(6) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;