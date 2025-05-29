<div class="col-md-12">
         <div class="box box-warning">
            <!--/box body -->
            <div class="box-body mt-2">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header ">
                     <div class="widget-user-image">
                        <img class="img-circle" src="<?= BASE_ASSET; ?>/img/list.png" alt="User Avatar">
                     </div>
                     <!-- /.widget-user-image -->
                     <?php if ($this->aauth->get_user_groups()[1]->id != 6) : ?>
                        <h3 class="widget-user-username"><?= cclang('Top Penilaian') ?></h3>
                     <?php else : ?>
                        <h3 class="widget-user-username"><?= cclang('absensi') ?></h3>
                     <?php endif; ?>
                     <?php if ($this->aauth->get_user_groups()[1]->id != 6) : ?>
                        <h5 class="widget-user-desc"><?= cclang('Top Karyawan Penilaian'); ?> </h5>
                     <?php else : ?>
                        <h5 class="widget-user-desc"><?= cclang('list_all', [cclang('absensi')]); ?> <i class="label bg-yellow"><?= $penilaian_counts; ?> <?= cclang('items'); ?></i></h5>
                     <?php endif; ?>
                  </div>

                  <form name="form_penilaian" id="form_penilaian" action="<?= base_url('administrator/penilaian/index'); ?>" method="GET">

                     <div class="row mb-3" style="padding: 15px;">
                        <div class="col-md-3">
                           <label for="type">Filter Type</label>
                           <select name="type" id="type" class="form-control">
                              <option value="monthly" <?= $this->input->get('type') == 'monthly' ? 'selected' : '' ?>>Bulanan</option>
                              <option value="daily" <?= $this->input->get('type') == 'daily' ? 'selected' : '' ?>>Harian</option>
                           </select>
                        </div>

                        <div class="col-md-3">
                           <label for="date">Date</label>
                           <div id="date-container">
                              <?php
                              $type = $this->input->get('type') ?? 'monthly';
                              $date = $this->input->get('date') ?? date($type == 'daily' ? 'Y-m-d' : 'Y-m');
                              ?>
                              <input
                                 type="<?= $type == 'daily' ? 'date' : 'month' ?>"
                                 name="date"
                                 id="date"
                                 class="form-control"
                                 value="<?= $date ?>">
                           </div>
                        </div>


                        <div class="col-md-3">
                           <label>&nbsp;</label>
                           <div>
                              <button class="btn btn-primary" type="submit">
                                 <i class="fa fa-filter"></i> Filter
                              </button>
                           </div>
                        </div>
                     </div>

                     <div class="table-responsive">
                        <table class="table table-bordered table-striped dataTable">
                           <thead>
                              <tr class="">
                                 <th><?= cclang('pegawai') ?></th>
                                 <th><?= cclang('total') ?></th>
                              </tr>
                           </thead>
                           <tbody id="tbody_penilaian">
                              <?php if (!$top_karyawan) : ?>
                                 <tr>
                                    <td colspan="100">
                                       Belum ada data penilaian
                                    </td>
                                 </tr>
                              <?php else: ?>
                                 <tr>
                                    <td><?= $top_karyawan->nama_lengkap ?? '-' ?></td>
                                    <td><?= $top_karyawan->total_nilai ?? '-' ?></td>
                                 </tr>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                  </form>

               </div>
            </div>
         </div>
         <!--/box -->
      </div>

      <script>
   document.getElementById('type').addEventListener('change', function() {
      const type = this.value;
      const container = document.getElementById('date-container');

      const currentDate = new Date().toISOString().split('T')[0]; // YYYY-MM-DD
      const defaultMonth = currentDate.slice(0, 7); // YYYY-MM

      let inputType = 'month';
      let value = defaultMonth;

      if (type === 'daily') {
         inputType = 'date';
         value = currentDate;
      }

      container.innerHTML = `
      <input 
         type="${inputType}" 
         name="date" 
         id="date" 
         class="form-control" 
         value="${value}"
      >
   `;
   });
</script>