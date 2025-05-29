<?php

// Read type and date from query params
$type = $this->input->get('type') ?: 'monthly'; // 'daily' or 'monthly', defaults to 'monthly'
$date = $this->input->get('date'); // 'YYYY-MM-DD' or 'YYYY-MM'
$this->data['top_karyawan'] = $this->model_penilaian->search_top_one_karyawan($type, $date);