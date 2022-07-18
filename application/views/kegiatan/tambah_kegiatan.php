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
            <h3 class="card-title">Form Tambah Kegiatan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?= base_url('kegiatan/save') ?>" id="form_kegiatan" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Kegiatan">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl_berakhir">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="tgl_berakhir" name="tgl_berakhir">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="keterangan">Detail Kegiatan</label>
                <textarea id="summernote" name="keterangan">
                </textarea>
              </div>
              <div class="form-group">
                <label for="Lokasi">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Kegiatan">
              </div>
              <div class="form-group">
                <button name="save" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('kegiatan'); ?>">
                  <button type="button" class="btn btn-danger">
                    <i class="nav-icon fas fa-back"></i>
                    Kembali
                  </button>
                </a>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
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
    $('#form_admin').validate({
      rules: {
        judul: {
          required: true,
        },
        tgl_mulai: {
          required: true,
        },
        tgl_berakhir: {
          required: true,
        },
        summernote: {
          required: true,
        },
        lokasi: {
          required: true,
        },
      },
      messages: {
        judul: {
          required: "Judul harus diisi",
        },
        tgl_mulai: {
          required: "Tanggal mulai harus diisi",
        },
        tgl_berakhir: {
          required: "Tanggal berakhir harus diisi",
        },
        summernote: {
          required: "Detail Kegiatan harus diisi",
        },
        lokasi: {
          required: "Lokasi harus diisi",
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('button[name="save"]').on("click", function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah anda yakin ?',
        text: "Pastikan data yang diinput sudah benar",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then(function(result) {
        if (result.value) {
          console.log('berhasil');
          $("#form_kegiatan").submit();
        } else {
          console.log('gagal');
        }
      })
    })
  });
</script>