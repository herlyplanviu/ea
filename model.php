<?php

public function search_top_one_karyawan($type = 'monthly', $date = null)
    {
        // Set default date to current month if not provided
        if ($date === null) {
            if ($type === 'daily') {
                $date = date('Y-m-d'); // e.g., "2025-05-28"
            } else {
                $date = date('Y-m');   // e.g., "2025-05"
            }
        }

        $this->db->select('penilaian.pegawai, pegawai.nama_lengkap, pegawai.jabatan');
        $this->db->select('SUM(
            a1 + a2 + a3 + a4 + a5 + a6 + a7 + a8 + a9 + a10 +
            a11 + a12 + a13 + a14 + a15 + a16 + a17 + a18 + a19 + a20
        ) AS total_nilai', false);

        $this->db->from('penilaian');
        $this->db->join('pegawai', 'pegawai.id_pegawai = penilaian.pegawai', 'left');

        // Apply date filtering
        if ($type === 'daily') {
            $this->db->where('DATE(tanggal)', $date);
        } elseif ($type === 'monthly') {
            $this->db->where('DATE_FORMAT(tanggal, "%Y-%m") =', $date);
        }

        $this->db->group_by('penilaian.pegawai, pegawai.nama_lengkap, pegawai.jabatan');
        $this->db->order_by('total_nilai', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();
    }

