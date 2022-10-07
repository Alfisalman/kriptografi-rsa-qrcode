<?php
function generate($url, $file_name)
{
	$CI = get_instance();
	$CI->load->library('ciqrcode');
	$config['cacheable']    = true;
    $config['cachedir']     = './assets/';
    $config['errorlog']     = './assets/';
    $config['imagedir']     = './assets/img_qrcode/';
    $config['quality']      = true;
    $config['size']         = '1024';
    $config['black']        = array(224,255,255);
    $config['white']        = array(70,130,180);
    $CI->ciqrcode->initialize($config);

    $params['data'] = $url;
    $params['level'] = 'H';
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$file_name;
    if($CI->ciqrcode->generate($params)) {
        return true;
    }
    return false;
}
?>
