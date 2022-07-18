<?php

class Alert
{
  public function __construct()
  {
    $this->CI = &get_instance();
    $this->CI->load->library('session');
  }

  function SetAlert($typeAlert, $message, $url = null)
  {
    $this->CI = &get_instance();
    if ($typeAlert == 'success') {
      $this->CI->session->set_flashdata([
        'flash' => 'success',
        'message' => $message
      ]);
      redirect($url);
    } else if ($typeAlert == 'error') {
      $this->CI->session->set_flashdata([
        'flash' => 'error',
        'message' => $message
      ]);
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
  }
}
