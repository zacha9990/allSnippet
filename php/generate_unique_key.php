<?php

//parameter $kd = awalan
//parameter $primary_key = nama kolom primary_key pada tabel
//parameter $table_name = nama tabel

 public function generate_unique_key($kd='XX', $primary_key, $table_name)
    {
        $query = "SELECT MID(MAX($primary_key),3,10) as NO_MAX FROM $table_name";
        $data = $this->db->query($query)->result_array();

        if (count($data[0]['NO_MAX']) != "") {
          $n_nol = "";
          $kd_baru = $data[0]['NO_MAX'] + 1;
          for ($i=0; $i < strlen($data[0]['NO_MAX']) -strlen($kd_baru) ; $i++) {
            $n_nol = $n_nol."0";
          }
          return $kd.$n_nol.$kd_baru;
        }else {
          return $kd."000000001";
        }
    }
