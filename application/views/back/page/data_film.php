<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Film
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Film</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <button class="btn btn-primary pull-right" id="add_button"><i class="fa fa-plus"> Tambah Film</i></button>
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
                    <th>Cover</th>
                    <th>Nama Film</th>
                    <th>Genre</th>
                    <th>Produser</th>
                    <th>Tahun</th>
                    <th><i class="fa fa-edit"></i></th>
                    <th><i class="fa fa-trash"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $data = $dt_film->result_array();
                   foreach ($data as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><img src="<?php echo $row['cover'] ?>" style="width: 50px; height: 50px;"></td>
                      <td><?php echo $row['nama_film']; ?></td>
                      <td><?php echo $row['nama_genre']; ?></td>
                      <td><?php echo $row['produser']; ?></td>
                      <td><?php echo $row['tahun']; ?></td>
                      <td><a href="<?php echo base_url('detail_film/'.$row['id_film']) ?>" title="Detail film" class="detail"><i class="fa fa-edit"></i></a></td>
                      <td><a href="<?php echo base_url('film/hapus/'.$row['id_film']) ?>" title="Hapus film"><i class="fa fa-trash"></i></a></td>
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
  <div class="modal fade" id="filmModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="box box-info">
            <?php echo form_open('', 'method="post" class="form-horizontal" id="form_film"'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama film</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_film" id="nama_film" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Cover</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" name="nama_film" id="nama_film" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Gnere</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>- Pilih Gnere</option>
                      <option>Animasi</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Produser</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_film" id="nama_film" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tahun</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_film" id="nama_film" required="required">
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_film" id="id_film">
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
        $('#form_film')[0].reset();
        $('.modal-title').text("Tambah Data film");
        $('#action').val('Tambahkan');
        $('#data_action').val("Insert");
        $('#filmModal').modal('show');
      });
      
    })
  </script>