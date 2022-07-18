<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Manajemen Kegiatan STT</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data Dokumentasi <b><?= $kegiatan->judul ?></b></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a class="btn btn-primary mb-2" href="<?= base_url('kegiatan/tambah'); ?>" data-toggle="modal" data-target="#modal-default">
              <i class="nav-icon fas fa-plus"></i> Foto
            </a>
            <a class="btn btn-danger mb-2" href="<?= base_url('kegiatan'); ?>">
              <i class="nav-icon fas fa-arrow-left"></i> Kembali
            </a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dokumentasi as $list) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $list['foto'] ?></td>
                    <td><?= $list['keterangan'] ?></td>
                    <div style="text-align:center">
                      <a href="#">
                        <button type="button" name="hapus_foto" class="btn btn-sm btn-danger" data-id="<?= $list['id'] ?>">
                          Hapus
                        </button>
                      </a>
                    </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah foto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kegiatan/save_dokumentasi') ?>" id="form_dokumentasi" method="POST" enctype="multipart/form-data">
          <div class="form-group" id="actions">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto" onchange="readURL(this);">
            <img id="blah" src="http://placehold.it/180" alt="your image" width="400px" />
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-success" name="save_foto">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
  $(document).ready(function() {

    $('button[name="hapus_foto"]').on("click", function(e) {
      var id = $(this).data('id');
      console.log(id);
      e.preventDefault();
      Swal.fire({
        title: 'Apakah anda yakin menghapus data ini ?',
        text: "Data yang sudah di hapus tidak bisa dikembalikan",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then(function(result) {
        if (result.value) {
          window.location = 'kegiatan/delete_dokumentasi/' + id;
        } else {
          console.log('gagal');
        }
      })
    })
  });
</script>

<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah')
          .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>