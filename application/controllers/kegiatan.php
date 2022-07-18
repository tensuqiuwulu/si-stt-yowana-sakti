<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kegiatan_model');
  }

  public function index()
  {
    $data = [
      'kegiatan' => $this->kegiatan_model->get_kegiatan()->result_array()
    ];
    $this->template->load('template', 'kegiatan/kegiatan', $data);
  }

  public function form_tambah()
  {
    $this->template->load('template', 'kegiatan/tambah_kegiatan');
  }

  public function form_edit($id)
  {
    $data = [
      'kegiatan' => $this->kegiatan_model->get_kegiatan($id)->row()
    ];
    $this->template->load('template', 'kegiatan/edit_kegiatan', $data);
  }

  public function dokumentasi($id)
  {
    $data = [
      'kegiatan' => $this->kegiatan_model->get_kegiatan($id)->row(),
      'dokumentasi' => $this->kegiatan_model->get_dokumentasi($id)->result_array()
    ];
    $this->template->load('template', 'kegiatan/dokumentasi', $data);
  }

  public function save()
  {
    $judul = $this->input->post('judul');
    $tgl_mulai = $this->input->post('tgl_mulai');
    $tgl_berakhir = $this->input->post('tgl_berakhir');
    $keterangan = $this->input->post('keterangan');
    $lokasi = $this->input->post('lokasi');

    $kegiatan = [
      'id' => uniqid(),
      'judul' => $judul,
      'status' => 0,
      'tgl_mulai' => $tgl_mulai,
      'tgl_berakhir' => $tgl_berakhir,
      'keterangan' => $keterangan,
      'lokasi' => $lokasi,
    ];

    $status = $this->kegiatan_model->create($kegiatan);
    if ($status == 1) {
      $this->alert->SetAlert('success', 'Berhasil tambah kegiatan', 'kegiatan/tambah');
    } else {
      $this->alert->SetAlert('error', 'Gagal tambah kegiatan', 'kegiatan/tambah');
    }
  }

  public function update($id)
  {
    $judul = $this->input->post('judul');
    $tgl_mulai = $this->input->post('tgl_mulai');
    $tgl_berakhir = $this->input->post('tgl_berakhir');
    $keterangan = $this->input->post('keterangan');
    $lokasi = $this->input->post('lokasi');
    $status = $this->input->post('status');

    $kegiatan = [
      'judul' => $judul,
      'tgl_mulai' => $tgl_mulai,
      'tgl_berakhir' => $tgl_berakhir,
      'keterangan' => $keterangan,
      'lokasi' => $lokasi,
      'status' => $status
    ];

    $status = $this->kegiatan_model->update($kegiatan, $id);
    if ($status == 1) {
      $this->alert->SetAlert('success', 'Berhasil ubah kegiatan', 'kegiatan/edit/' . $id);
    } else {
      $this->alert->SetAlert('error', 'Gagal ubah kegiatan', 'kegiatan/edit/' . $id);
    }
  }

  public function delete($id)
  {
    if ($this->kegiatan_model->delete(['id' => $id])) {
      $this->alert->SetAlert('success', 'Berhasil hapus kegiatan', 'kegiatan');
    } else {
      $this->alert->SetAlert('error', 'Gagal hapus kegiatan', 'kegiatan');
    }
  }

  public function delete_dokumentasi($id)
  {
    if ($this->kegiatan_model->delete_dokumentasi(['id' => $id])) {
      $this->alert->SetAlert('success', 'Berhasil hapus foto', 'kegiatan/dokumentasi/' . $id);
    } else {
      $this->alert->SetAlert('error', 'Gagal hapus foto', 'kegiatan/dokumentasi/' . $id);
    }
  }
}
