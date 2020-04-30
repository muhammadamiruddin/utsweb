<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Genre
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Genre</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <button class="btn btn-primary pull-right" id="add_button"><i class="fa fa-plus"> Tambah Genre</i></button>
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
                    <th>Nama Genre</th>
                    <th><i class="fa fa-edit"></i></th>
                    <th><i class="fa fa-trash"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $data = $dt_genre->result_array();
                   foreach ($data as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['nama_genre']; ?></td>
                      <td><a href="<?php echo base_url('detail_genre/'.$row['id_genre']) ?>" title="Detail genre" class="detail"><i class="fa fa-edit"></i></a></td>
                      <td><a href="<?php echo base_url('genre/hapus/'.$row['id_genre']) ?>" title="Hapus genre"><i class="fa fa-trash"></i></a></td>
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
  <div class="modal fade" id="genreModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="box box-info">
            <?php echo form_open('', 'method="post" class="form-horizontal" id="form_genre"'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama genre</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_genre" id="nama_genre" required="required">
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id_genre" id="id_genre">
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
        $('#form_genre')[0].reset();
        $('.modal-title').text("Tambah Data genre");
        $('#action').val('Tambahkan');
        $('#data_action').val("Insert");
        $('#genreModal').modal('show');
      });
      
    })
  </script>