<?php

// Read type and date from query params
		$bulan = $this->input->get('bulan') ?: date('Y-m'); // 'YYYY-MM'
		$bulan = explode('-', $bulan);
		$nama_bulan = $this->model_penilaian->get_bulan(intval($bulan[1]));
		$this->data['top_karyawan'] = $this->model_penilaian->search_top_one_karyawan($nama_bulan);