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
            <h3 class="card-title">Data Kegiatan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a class="btn btn-primary mb-2" href="<?= base_url('kegiatan/tambah'); ?>">
              <i class="nav-icon fas fa-plus"></i> Kegiatan
            </a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Tgl Mulai</th>
                  <th>Tgl Berakhir</th>
                  <th>Lokasi</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kegiatan as $list) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $list['judul'] ?></td>
                    <td><?= $list['tgl_mulai'] ?></td>
                    <td><?= $list['tgl_berakhir'] ?></td>
                    <td><?= $list['lokasi'] ?></td>
                    <td><?php
                        if ($list['status'] == 0) {
                          echo "Belum Mulai";
                        } else {
                          echo "Selesai";
                        } ?></td>
                    <td>
                      <div style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-sm btn-info" href="<?= base_url('kegiatan/dokumentasi/' . $list['id']) ?>">
                            Dokumentasi
                          </a>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-sm btn-warning" href="<?= base_url('kegiatan/edit/' . $list['id']) ?>">
                            Edit
                          </a>
                        </div>
                        <a href="#">
                          <button type="button" name="hapus_kegiatan" class="btn btn-sm btn-danger" data-id="<?= $list['id'] ?>">
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
<script>
  $(document).ready(function() {
    $('button[name="hapus_kegiatan"]').on("click", function(e) {
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
          window.location = 'kegiatan/delete/' + id;
        } else {
          console.log('gagal');
        }
      })
    })
  });
</script>