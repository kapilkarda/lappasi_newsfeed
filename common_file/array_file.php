<?php
// page array --------------------------------------------------------------;

$home_position = array(0 => '--Select--');
for ($i = 1; $i <= 21; $i++) {
    $home_position[] = $i;
}

$other_positions = array();
for ($i = 0; $i <= 13; $i++) {
    $other_positions[] = $i;
}


$ad_positions = array();
for ($i = 0; $i <= 35; $i++):
    $ad_positions[] = $i;
endfor;



$ad_pages = array('0' => '&nbsp;----Select----');
$list = glob("../application/controllers/*.php");
foreach ($list as $l) {
    $l = str_replace(array('../application/controllers/', '.php'), "", $l);
    $ad_pages[$l] = '&nbsp;' . ucwords($l);
}




$ad_types = array(
    '0' => '--Select--',
    '1' => 'Image',
    '2' => 'Flash'
);


$nw_img_search = array(
    'width' => '1000',
    'height' => '600',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '100',
    'screeny' => '10',
    'class' => 'button'
);
?>