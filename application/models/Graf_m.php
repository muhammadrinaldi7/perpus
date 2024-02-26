<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Graf_m extends CI_Model
{
   public function getpinjam(){
    $data = $this->db->query("SELECT total FROM ( 
            SELECT DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL m MONTH), '%Y-%m') AS bulan, IFNULL(SUM(p.qty), 0) AS total 
            FROM peminjaman p RIGHT JOIN ( SELECT 0 AS m UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 ) AS months 
            ON MONTH(p.tglpinjam) = (months.m + 1) AND YEAR(p.tglpinjam) = 2023 GROUP BY bulan ORDER BY bulan ASC ) peminjam");
    return $data;
   } 
}
