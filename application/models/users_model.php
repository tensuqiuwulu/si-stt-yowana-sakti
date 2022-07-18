<?php
class Users_model extends CI_model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create($user, $profile)
  {
    $this->db->trans_start();
    $this->db->insert('users', $user);
    $this->db->insert('users_profile', $profile);
    if ($this->db->trans_status() == false) {
      $this->db->trans_rollback();
      return false;
    } else {
      $this->db->trans_commit();
      return true;
    }
  }

  public function update($user, $profile, $id_user)
  {
    $this->db->trans_start();
    $this->db->where('users.id', $id_user)
      ->update('users', $user);
    $this->db->where('users_profile.id_user', $id_user)
      ->update('users_profile', $profile);
    if ($this->db->trans_status() == false) {
      $this->db->trans_rollback();
      return false;
    } else {
      $this->db->trans_commit();
      return true;
    }
  }

  public function get_admins($id = null)
  {
    $this->db->select('
      users.id,
      users.username, 
      users_profile.nama_lengkap,
      users.role,
      users.status_aktif,
      users_profile.no_hp,
      users_profile.alamat,
      users_profile.jk')
      ->from('users')
      ->join('users_profile', 'users.id = users_profile.id_user')
      ->where('users.role', 2);
    if ($id != null) {
      $this->db->where('users.id', $id);
    }
    return $this->db->get();
  }

  public function get_anggota($id = null)
  {
    $this->db->select('
      users.id,
      users.username, 
      users_profile.nama_lengkap,
      users.role,
      users.status_aktif,
      users_profile.no_hp,
      users_profile.alamat,
      users_profile.jk')
      ->from('users')
      ->join('users_profile', 'users.id = users_profile.id_user')
      ->where('users.role', 3);
    if ($id != null) {
      $this->db->where('users.id', $id);
    }
    return $this->db->get();
  }

  public function get_user_id($id)
  {
    $this->db->select('
      users.id,
      users.username, 
      users_profile.nama_lengkap,
      users.role,
      users.status_aktif,
      users_profile.no_hp,
      users_profile.alamat,
      users_profile.jk')
      ->from('users')
      ->join('users_profile', 'users.id = users_profile.id_user');
    $this->db->where('users.id', $id);
    return $this->db->get();
  }

  public function get_users($username)
  {
    $this->db->select('*')
      ->from('users')
      ->where('username', $username);
    return $this->db->get();
  }
}
