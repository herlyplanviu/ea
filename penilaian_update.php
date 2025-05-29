<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo() {

        // Binding keys
        $('*').bind('keydown', 'Ctrl+s', function assets() {
            $('#btn_save').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+x', function assets() {
            $('#btn_cancel').trigger('click');
            return false;
        });

        $('*').bind('keydown', 'Ctrl+d', function assets() {
            $('.btn_save_back').trigger('click');
            return false;
        });

    }

    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Penilaian <small>Edit Penilaian</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a href="<?= site_url('administrator/penilaian'); ?>">Penilaian</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Penilaian</h3>
                            <h5 class="widget-user-desc">Edit Penilaian</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/penilaian/edit_save/' . $this->uri->segment(4)), [
                            'name'    => 'form_penilaian',
                            'class'   => 'form-horizontal',
                            'id'      => 'form_penilaian',
                            'method'  => 'POST'
                        ]); ?>

                        <?php
                        if ($this->aauth->get_user_groups()[1]->id != 5) {
                        ?>
                            <div class="form-group ">
                                <label for="pegawai" class="col-sm-2 control-label">Pegawai
                                    <i class="required">*</i>
                                </label>
                                <div class="col-sm-8">
                                    <select class="form-control chosen chosen-select-deselect" name="pegawai" id="pegawai" data-placeholder="Select Pegawai"
                                        <?= $this->aauth->get_user_groups()[1]->id == 5 ? 'readonly' : '' ?>>
                                        <option value=""></option>
                                        <?php foreach (db_get_all_data('pegawai') as $row): ?>
                                            <option <?= $row->id_pegawai ==  $penilaian->pegawai ? 'selected' : ''; ?> value="<?= $row->id_pegawai ?>"><?= $row->nama_lengkap; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="info help-block">
                                    </small>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input value="<?= $penilaian->pegawai ?>" type="hidden" name="pegawai" />
                        <?php  } ?>


                        <div class="form-group ">
                            <label for="tim_penilai" class="col-sm-2 control-label">Tim Penilai
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="tim_penilai" id="tim_penilai" data-placeholder="Select Tim Penilai">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('tim_penilai') as $row): ?>
                                        <option <?= $row->id_tim_penilai ==  $penilaian->tim_penilai ? 'selected' : ''; ?> value="<?= $row->id_tim_penilai ?>"><?= $row->nama_lengkap; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="tanggal" class="col-sm-2 control-label">Tanggal
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right datepicker" name="tanggal" placeholder="Tanggal" id="tanggal" value="<?= set_value('penilaian_tanggal_name', $penilaian->tanggal); ?>"
                                        <?= $this->aauth->get_user_groups()[1]->id == 5 ? 'readonly' : '' ?>>
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="penilaian_bulan" class="col-sm-2 control-label">Penilaian Bulan
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control chosen chosen-select-deselect" name="penilaian_bulan" id="penilaian_bulan" data-placeholder="Select Penilaian Bulan">
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data('bulan') as $row): ?>
                                        <option <?= $row->nama_bulan ==  $penilaian->penilaian_bulan ? 'selected' : ''; ?> value="<?= $row->nama_bulan ?>"><?= $row->nama_bulan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="ijin" class="col-sm-2 control-label">Ijin
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="ijin" id="ijin" placeholder="Ijin" value="<?= set_value('ijin', $penilaian->ijin); ?>"
                                    <?= $this->aauth->get_user_groups()[1]->id == 5 ? 'readonly' : '' ?>>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="tanpa_ijin" class="col-sm-2 control-label">Tanpa Ijin
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tanpa_ijin" id="tanpa_ijin" placeholder="Tanpa Ijin" value="<?= set_value('tanpa_ijin', $penilaian->tanpa_ijin); ?>"
                                    <?= $this->aauth->get_user_groups()[1]->id == 5 ? 'readonly' : '' ?>>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="jam_kehadiran" class="col-sm-2 control-label">Jam Kehadiran
                                <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                                <div class="input-group date col-sm-8">
                                    <input type="text" class="form-control pull-right timepicker" name="jam_kehadiran" id="jam_kehadiran" value="<?= set_value('penilaian_jam_kehadiran_name', $penilaian->jam_kehadiran); ?>"
                                        <?= $this->aauth->get_user_groups()[1]->id == 5 ? 'readonly' : '' ?>>
                                </div>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>


                        <!-- MODIF -->
                        <table border="1" align="center">
                            <tr>
                                <th width="30" style="text-align: center; background-color: #8C9DB0; "><b>NO</b></th>
                                <th width="700" style="text-align: center; background-color: #8C9DB0; "><b>KETERANGAN</b></th>
                                <th width="200" style="text-align: center; background-color: #8C9DB0; "><b>NILAI</b></th>
                            </tr>
                            <tr>
                                <td align="center">1<i class="required">*</i></td>
                                <td align="justify">Pengetahuan atas pekerjaan : Kejelasan pengetahuan atas tanggung jawab pekerjaan yang menjadi tugasnya.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a1 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a1" value="5"> SB
                                    <input <?= $penilaian->a1 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a1" value="4"> B
                                    <input <?= $penilaian->a1 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a1" value="3"> C
                                    <input <?= $penilaian->a1 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a1" value="2"> K
                                    <input <?= $penilaian->a1 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a1" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">2<i class="required">*</i></td>
                                <td align="justify">Perencanaan dan Organisasi kemampuan membuat rencana pekerjaan meliputi jadwal dan urutan pekerjaan, sehingga tercapai efisiensi dan efektifitas.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a2 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a2" value="5"> SB
                                    <input <?= $penilaian->a2 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a2" value="4"> B
                                    <input <?= $penilaian->a2 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a2" value="3"> C
                                    <input <?= $penilaian->a2 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a2" value="2"> K
                                    <input <?= $penilaian->a2 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a2" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">3<i class="required">*</i></td>
                                <td align="justify">Mutu Pekerjaan, Ketelitian dan ketepatan pekerjaan.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a3 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a3" value="5"> SB
                                    <input <?= $penilaian->a3 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a3" value="4"> B
                                    <input <?= $penilaian->a3 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a3" value="3"> C
                                    <input <?= $penilaian->a3 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a3" value="2"> K
                                    <input <?= $penilaian->a3 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a3" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">4<i class="required">*</i></td>
                                <td align="justify">Produktivitas : Jumlah pekerjaan yang dihasilkan dibandingkan dengan waktu yang digunakan.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a4 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a4" value="5"> SB
                                    <input <?= $penilaian->a4 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a4" value="4"> B
                                    <input <?= $penilaian->a4 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a4" value="3"> C
                                    <input <?= $penilaian->a4 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a4" value="2"> K
                                    <input <?= $penilaian->a4 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a4" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">5<i class="required">*</i></td>
                                <td align="justify">Pengetahuan teknis : Dasar teknis dan kepraktisan sehingga pekerjaan mendekati standar kinerja.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a5 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a5" value="5"> SB
                                    <input <?= $penilaian->a5 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a5" value="4"> B
                                    <input <?= $penilaian->a5 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a5" value="3"> C
                                    <input <?= $penilaian->a5 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a5" value="2"> K
                                    <input <?= $penilaian->a5 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a5" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">6<i class="required">*</i></td>
                                <td align="justify">Ketergantungan kepada orang lain : Kemandirian dalam melaksanakan tugas dan inisiatif, agar hasil pekerjaannya mendekati standar kinerja.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a6 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a6" value="5"> SB
                                    <input <?= $penilaian->a6 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a6" value="4"> B
                                    <input <?= $penilaian->a6 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a6" value="3"> C
                                    <input <?= $penilaian->a6 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a6" value="2"> K
                                    <input <?= $penilaian->a6 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a6" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">7<i class="required">*</i></td>
                                <td align="justify">Judment : Kebijakan naluriah dan kemampuan untuk menyimpulkan tugas sehingga tujuan organisasi tercapai.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a7 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a7" value="5"> SB
                                    <input <?= $penilaian->a7 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a7" value="4"> B
                                    <input <?= $penilaian->a7 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a7" value="3"> C
                                    <input <?= $penilaian->a7 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a7" value="2"> K
                                    <input <?= $penilaian->a7 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a7" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">8<i class="required">*</i></td>
                                <td align="justify">Komunikasi : Kemampuan berhubungan secara lisan (verbal) dengan orang lain.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a8 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a8" value="5"> SB
                                    <input <?= $penilaian->a8 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a8" value="4"> B
                                    <input <?= $penilaian->a8 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a8" value="3"> C
                                    <input <?= $penilaian->a8 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a8" value="2"> K
                                    <input <?= $penilaian->a8 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a8" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">9<i class="required">*</i></td>
                                <td align="justify">Kerja sama : Kemampuan bekerjasama dengan orang lain dan sikap yang kontruktif dalam tim.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a9 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a9" value="5"> SB
                                    <input <?= $penilaian->a9 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a9" value="4"> B
                                    <input <?= $penilaian->a9 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a9" value="3"> C
                                    <input <?= $penilaian->a9 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a9" value="2"> K
                                    <input <?= $penilaian->a9 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a9" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">10<i class="required">*</i></td>
                                <td align="justify">Kehadiran dalam rapat : Kemampuan untuk keikutsertaan (partisipasi) dalam rapat berupa pendapat dan ide.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a10 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a10" value="5"> SB
                                    <input <?= $penilaian->a10 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a10" value="4"> B
                                    <input <?= $penilaian->a10 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a10" value="3"> C
                                    <input <?= $penilaian->a10 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a10" value="2"> K
                                    <input <?= $penilaian->a10 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a10" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">11<i class="required">*</i></td>
                                <td align="justify">Manajemen kerja : Kemampuan mengelola pekerjaan, naik membina tim, membuat jadwal kerja, anggaran, dan menciptakan hubungan baik antar pegawai.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a11 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a11" value="5"> SB
                                    <input <?= $penilaian->a11 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a11" value="4"> B
                                    <input <?= $penilaian->a11 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a11" value="3"> C
                                    <input <?= $penilaian->a11 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a11" value="2"> K
                                    <input <?= $penilaian->a11 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a11" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">12<i class="required">*</i></td>
                                <td align="justify">Kepemimpinan : Kemampuan mengarahkan dan membimbing bawahan, sehingga tercipta efisiensi dan efektivitas.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a12 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a12" value="5"> SB
                                    <input <?= $penilaian->a12 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a12" value="4"> B
                                    <input <?= $penilaian->a12 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a12" value="3"> C
                                    <input <?= $penilaian->a12 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a12" value="2"> K
                                    <input <?= $penilaian->a12 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a12" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">13<i class="required">*</i></td>
                                <td align="justify">Kemampuan memperbaiki diri sendiri : Kemampuan memperbaiki diri sendiri dengan studi lanjut atau kursus-kursus.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a13 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a13" value="5"> SB
                                    <input <?= $penilaian->a13 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a13" value="4"> B
                                    <input <?= $penilaian->a13 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a13" value="3"> C
                                    <input <?= $penilaian->a13 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a13" value="2"> K
                                    <input <?= $penilaian->a13 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a13" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">14<i class="required">*</i></td>
                                <td align="justify">Kedisplinan waktu dalam kehadiran.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a14 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a14" value="5"> SB
                                    <input <?= $penilaian->a14 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a14" value="4"> B
                                    <input <?= $penilaian->a14 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a14" value="3"> C
                                    <input <?= $penilaian->a14 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a14" value="2"> K
                                    <input <?= $penilaian->a14 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a14" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">15<i class="required">*</i></td>
                                <td align="justify">Kedisiplinan & Ketepatan waktu dalam pekerjaan.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a15 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a15" value="5"> SB
                                    <input <?= $penilaian->a15 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a15" value="4"> B
                                    <input <?= $penilaian->a15 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a15" value="3"> C
                                    <input <?= $penilaian->a15 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a15" value="2"> K
                                    <input <?= $penilaian->a15 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a15" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">16<i class="required">*</i></td>
                                <td align="justify">Kedisiplinan & Ketepatan waktu dalam tugas dari atasan.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a16 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a16" value="5"> SB
                                    <input <?= $penilaian->a16 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a16" value="4"> B
                                    <input <?= $penilaian->a16 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a16" value="3"> C
                                    <input <?= $penilaian->a16 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a16" value="2"> K
                                    <input <?= $penilaian->a16 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a16" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">17<i class="required">*</i></td>
                                <td align="justify">Kedisiplinan & Ketepanan waktu dalam tugas pelatihan & belajar.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a17 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a17" value="5"> SB
                                    <input <?= $penilaian->a17 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a17" value="4"> B
                                    <input <?= $penilaian->a17 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a17" value="3"> C
                                    <input <?= $penilaian->a17 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a17" value="2"> K
                                    <input <?= $penilaian->a17 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a17" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">18<i class="required">*</i></td>
                                <td align="justify">Kedisiplinan & Ketepatan waktu dalam kehadiran rapat & koordinasi.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a18 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a18" value="5"> SB
                                    <input <?= $penilaian->a18 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a18" value="4"> B
                                    <input <?= $penilaian->a18 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a18" value="3"> C
                                    <input <?= $penilaian->a18 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a18" value="2"> K
                                    <input <?= $penilaian->a18 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a18" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">19<i class="required">*</i></td>
                                <td align="justify">Adanya progres positif dalam Kedisiplinan & Ketepatan waktu kehadiran.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a19 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a19" value="5"> SB
                                    <input <?= $penilaian->a19 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a19" value="4"> B
                                    <input <?= $penilaian->a19 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a19" value="3"> C
                                    <input <?= $penilaian->a19 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a19" value="2"> K
                                    <input <?= $penilaian->a19 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a19" value="1"> SK<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">20<i class="required">*</i></td>
                                <td align="justify">Adanya progres positif dalam Kedisiplinan & Ketepatan waktu rapat.</td>
                                <td align="center"><br>
                                    <input <?= $penilaian->a20 == "5" ? "checked" : ""; ?> type="radio" class="flat-red" name="a20" value="5"> SB
                                    <input <?= $penilaian->a20 == "4" ? "checked" : ""; ?> type="radio" class="flat-red" name="a20" value="4"> B
                                    <input <?= $penilaian->a20 == "3" ? "checked" : ""; ?> type="radio" class="flat-red" name="a20" value="3"> C
                                    <input <?= $penilaian->a20 == "2" ? "checked" : ""; ?> type="radio" class="flat-red" name="a20" value="2"> K
                                    <input <?= $penilaian->a20 == "1" ? "checked" : ""; ?> type="radio" class="flat-red" name="a20" value="1"> SK<br><br>
                                </td>
                            </tr>
                        </table><br><br>
                        <!-- END MODIF -->


                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                                <i class="fa fa-save"></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                <i class="ion ion-ios-list-outline"></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                                <i class="fa fa-undo"></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                                <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg">
                                <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function() {


        $('#btn_cancel').click(function() {
            swal({
                    title: "Are you sure?",
                    text: "the data that you have created will be in the exhaust!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function(isConfirm) {
                    if (isConfirm) {
                        window.location.href = BASE_URL + 'administrator/penilaian';
                    }
                });

            return false;
        }); /*end btn cancel*/

        $('.btn_save').click(function() {
            $('.message').fadeOut();

            var form_penilaian = $('#form_penilaian');
            var data_post = form_penilaian.serializeArray();
            var save_type = $(this).attr('data-stype');
            data_post.push({
                name: 'save_type',
                value: save_type
            });

            $('.loading').show();

            $.ajax({
                    url: form_penilaian.attr('action'),
                    type: 'POST',
                    dataType: 'json',
                    data: data_post,
                })
                .done(function(res) {
                    if (res.success) {
                        var id = $('#penilaian_image_galery').find('li').attr('qq-file-id');
                        if (save_type == 'back') {
                            window.location.href = res.redirect;
                            return;
                        }

                        $('.message').printMessage({
                            message: res.message
                        });
                        $('.message').fadeIn();
                        $('.data_file_uuid').val('');

                    } else {
                        $('.message').printMessage({
                            message: res.message,
                            type: 'warning'
                        });
                    }

                })
                .fail(function() {
                    $('.message').printMessage({
                        message: 'Error save data',
                        type: 'warning'
                    });
                })
                .always(function() {
                    $('.loading').hide();
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 2000);
                });

            return false;
        }); /*end btn save*/





    }); /*end doc ready*/
</script>