<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load library
        $this->load->library(['template', 'form_validation', 'cart']);
        //load helper
        $this->load->helper('qrcode');
        $this->load->helper('EncryptDecrypt');
        //load model
        $this->load->model('m_pembelian');

        header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function show_surat($id = null)
    {
        $decrypt_id = decryptX($id);
        $data['id'] = $decrypt_id;
        $this->load->view('v_surat', $data);
    }

    function test_generate($id = null)
    {
        $url = site_url('show_surat/'.$id);
        $file_name = 'qrcode_'.$id.'.png';
        if(generate($url, $file_name)){
            echo 'generate sukses';
            return false;
        }
        echo 'generate gagal';
    }
}