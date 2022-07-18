<?php
class Kegiatan_model extends CI_model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create($kegiatan)
  {
    $this->db->insert('kegiatan', $kegiatan);
    return $this->db->affected_rows() > 0;
  }

  public function update($kegiatan, $id_kegiatan)
  {
    $this->db->where('id', $id_kegiatan)
      ->update('kegiatan', $kegiatan);
    return $this->db->affected_rows() > 0;
  }

  public function get_kegiatan($id = null)
  {
    $this->db->select('*')
      ->from('kegiatan');
    if ($id != null) {
      $this->db->where('id', $id);
    }
    return $this->db->get();
  }

  public function get_dokumentasi($id)
  {
    $this->db->select('*')
      ->from('dokumentasi_kegiatan')
      ->where('id_kegiatan', $id);
    return $this->db->get();
  }

  public function delete($id)
  {
    $this->db->where($id)
      ->delete('kegiatan');
    return $this->db->affected_rows() > 0;
  }

  public function delete_dokumentasi($id)
  {
    $this->db->where($id)
      ->delete('dokumentasi_kegiatan');
    return $this->db->affected_rows() > 0;
  }
}
