<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal Penayangan
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Jadwal Penayangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <button class="btn btn-primary pull-right" id="add_button"><i class="fa fa-plus"> Tambah Jadwal Penayangan</i></button>
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <span id="success_message">
                <?php if ($this->session->flashdata('success')): ?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                  </div>
                <?php endif ?>
              </span>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="50">No</th>
                    <th>Tanggal Penayangan</th>
                    <th>Waktu</th>
                    <th>Nama Film</th>
                    <th><i class="fa fa-edit"></i></th>
                    <th><i class="fa fa-trash"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $data = $dt_jadwal->result_array();
                   foreach ($data as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['tgl_penayangan']; ?></td>
                      <td><?php echo $row['waktu']; ?></td>
                      <td><?php echo $row['nama_film']; ?></td>
                      <td><a href="<?php echo base_url('detail_jadwal/'.$row['id_jadwal']) ?>" title="Detail jadwal" class="detail"><i class="fa fa-edit"></i></a></td>
                      <td><a href="<?php echo base_url('jadwal/hapus/'.$row['id_jadwal']) ?>" title="Hapus jadwal"><i class="fa fa-trash"></i></a></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- modal -->
  <div class="modal fade" id="jadwalModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="box box-info">
            <?php echo form_open('', 'method="post" class="form-horizontal" id="form_jadwal"'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal Penayangan</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="nama_jadwal" id="nama_jadwal" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Waktu Penayangan</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" name="nama_jadwal" id="nama_jadwal" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Film</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>- Pilih Film -</option>
                      <option>Transformers</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_jadwal" id="id_jadwal">
          <input type="hidden" name="data_action" id="data_action" value="Insert" />
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" name="action" id="action" value="add" />
        </div>
            </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <script type="text/javascript">
    $(document).ready(function () {
      
      $('#add_button').click(function () {
        $('#form_jadwal')[0].reset();
        $('.modal-title').text("Tambah Data jadwal");
        $('#action').val('Tambahkan');
        $('#data_action').val("Insert");
        $('#jadwalModal').modal('show');
      });
      
    })
  </script>