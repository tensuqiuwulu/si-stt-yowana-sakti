<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function index()
  {
    $data = [
      'admins' => $this->users_model->get_admins()->result_array()
    ];
    $this->template->load('template', 'users/admin', $data);
  }

  public function form_tambah()
  {
    $this->template->load('template', 'users/tambah_admin');
  }

  public function form_edit($id)
  {
    $data = [
      'admin' => $this->users_model->get_user_id($id)->row()
    ];
    $this->template->load('template', 'users/edit_admin', $data);
  }

  public function save()
  {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $jk = $this->input->post('jk');
    $role = 2;
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $id_user = uniqid();

    $user = [
      'id' => $id_user,
      'role' => $role,
      'status_aktif' => 1,
      'username' => $username,
      'password' => $hash_password,
    ];

    $user_profile = [
      'id' => uniqid(),
      'no_hp' => $no_hp,
      'id_user' => $id_user,
      'jk' => $jk,
      'nama_lengkap' => $nama_lengkap,
      'alamat' => $alamat,
    ];

    $status = $this->users_model->create($user, $user_profile);
    if ($status == 1) {
      $this->alert->SetAlert('success', 'Berhasil tambah admin', 'admin/tambah');
    } else {
      $this->alert->SetAlert('error', 'Gagal tambah admin', 'admin/tambah');
    }
  }

  public function update($id_user)
  {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $no_hp = $this->input->post('no_hp');
    $alamat = $this->input->post('alamat');
    $jk = $this->input->post('jk');
    $role = $this->input->post('role');
    $status_aktif = $this->input->post('status_aktif');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password == null) {
      $user = [
        'role' => $role,
        'status_aktif' => $status_aktif,
        'username' => $username,
      ];
    } else {
      $user = [
        'role' => $role,
        'status_aktif' => $status_aktif,
        'username' => $username,
        'password' => $hash_password,
      ];
    }

    $user_profile = [
      'no_hp' => $no_hp,
      'jk' => $jk,
      'nama_lengkap' => $nama_lengkap,
      'alamat' => $alamat,
    ];

    $status = $this->users_model->update($user, $user_profile, $id_user);
    if ($status == 1) {
      $this->alert->SetAlert('success', 'Berhasil ubah admin', 'admin/edit/' . $id_user);
    } else {
      $this->alert->SetAlert('error', 'Gagal ubah admin', 'admin/edit');
    }
  }
}
