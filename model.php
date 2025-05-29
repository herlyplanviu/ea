<?php

public function get_bulan($id_bulan = null)
    {
        $this->db->select('id_bulan, nama_bulan');
        $this->db->from('bulan');

        if ($id_bulan != null) {
            $this->db->where('id_bulan', $id_bulan);
        }

        $query = $this->db->get();
        return $query->row();
    }

    public function search_top_one_karyawan($bulan = null)
    {

        $this->db->select('penilaian.pegawai, pegawai.nama_lengkap, pegawai.jabatan');
        $this->db->select('SUM(
            a1 + a2 + a3 + a4 + a5 + a6 + a7 + a8 + a9 + a10 +
            a11 + a12 + a13 + a14 + a15 + a16 + a17 + a18 + a19 + a20
        ) AS total_nilai', false);

        $this->db->from('penilaian');
        $this->db->join('pegawai', 'pegawai.id_pegawai = penilaian.pegawai', 'left');

        // Apply date filtering
        $this->db->where('penilaian_bulan =', $bulan->nama_bulan);


        $this->db->group_by('penilaian.pegawai, pegawai.nama_lengkap, pegawai.jabatan');
        $this->db->order_by('total_nilai', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }