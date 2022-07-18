<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('users_model');
  }

  public function form_login()
  {
    $this->load->view('auth/login');
  }

  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->users_model->get_users($username)->row();

    if (password_verify($password, $user->password)) {
      if ($user->status_aktif == 1) {
        $data = [
          'id' => $user->id,
          'username' => $user->username,
          'role' => $user->role
        ];

        $this->session->set_userdata($data);
        $this->alert->SetAlert('success', 'Login berhasil', 'dashboard');
      } else {
        $this->alert->SetAlert('error', 'Status user tidak aktif');
        redirect('auth/form_login');
      }
    } else {
      $this->alert->SetAlert('error', 'Kombinasi username dan password salah');
      redirect('auth/form_login');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth/form_login');
  }
}
