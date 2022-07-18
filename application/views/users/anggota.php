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
            <h3 class="card-title">Data Anggota</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <a class="btn btn-primary mb-2" href="<?= base_url('anggota/tambah'); ?>">
              <i class="nav-icon fas fa-plus"></i> Anggota
            </a>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>No HP</th>
                  <th>JK</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($anggota as $list) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $list['username'] ?></td>
                    <td><?= $list['nama_lengkap'] ?></td>
                    <td><?php
                        if ($list['role'] == 2) {
                          echo "Admin";
                        } else {
                          echo "Anggota";
                        } ?></td>
                    <td><?php
                        if ($list['status_aktif'] == 1) {
                          echo "Aktif";
                        } else {
                          echo "Tidak Aktif";
                        } ?></td>
                    <td><?= $list['no_hp'] ?></td>
                    <td><?php
                        if ($list['jk'] == 1) {
                          echo "Laki-laki";
                        } else {
                          echo "Perempuan";
                        } ?></td>
                    <td>
                      <div style="text-align:center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-sm btn-warning" href="<?= base_url('anggota/edit/' . $list['id']) ?>">
                            Edit
                          </a>
                        </div>

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