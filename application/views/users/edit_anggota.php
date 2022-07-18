<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Manajemen Anggota STT</h1>
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
            <h3 class="card-title">Form Edit Anggota</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?= base_url('anggota/update/' . $anggota->id) ?>" id="form_admin" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $anggota->nama_lengkap ?>" placeholder="Masukkan Nama Lengkap">
              </div>
              <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $anggota->no_hp ?>" placeholder="Masukkan No Hp">
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $anggota->alamat ?>" placeholder="Masukkan Alamat">
              </div>

              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role">
                  <?php if ($this->session->userdata('role') == 1) { ?>
                    <option value="2" <?php if ($anggota->role == 2) echo 'selected' ?>>Admin</option>
                    <option value="3" <?php if ($anggota->role == 3) echo 'selected' ?>>Anggota</option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="role">Status Aktif</label>
                <select class="form-control" name="status_aktif">
                  <option value="1" <?php if ($anggota->status_aktif == 1) echo 'selected' ?>>Aktif</option>
                  <option value="0" <?php if ($anggota->status_aktif == 0) echo 'selected' ?>>Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" name="jk" id="jk">
                  <option value="1" <?php if ($anggota->jk == 1) echo 'selected' ?>>Laki-laki</option>
                  <option value="2" <?php if ($anggota->jk == 2) echo 'selected' ?>>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $anggota->username ?>" placeholder="Masukkan Username">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="password_confirm">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Password">
              </div>
              <div class="form-group">
                <button name="save" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('anggota'); ?>">
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
        nama_lengkap: {
          required: true,
        },
        no_hp: {
          required: true,
        },
        alamat: {
          required: true,
        },
        role: {
          required: true,
        },
        jk: {
          required: true,
        },
        username: {
          required: true,
        },
        password: {
          minlength: 8
        },
        password_confirm: {
          equalTo: "#password"
        }
      },
      messages: {
        nama_lengkap: {
          required: "Nama lengkap harus diisi",
        },
        no_hp: {
          required: "No Hp harus diisi",
        },
        alamat: {
          required: "Alamat harus diisi",
        },
        jk: {
          required: "Jenis kelamin harus diisi",
        },
        username: {
          required: "Username harus diisi",
        },
        password_confirm: {
          required: "Password tidak sama",
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
          $("#form_admin").submit();
        } else {
          console.log('gagal');
        }
      })
    })
  });
</script>