<?php
set_time_limit(240);
header('Content-Type: application/json');
require '../connect.php';
require 'formatter.php';

$trxmove = $call->query("SELECT * FROM conf WHERE code = 'trxmove'")->fetch_assoc();
$out = ['res' => false,'data' => 'Invalid Provider!'];
if($trxmove['c1'] == 'DIGI') {
    $try = $DIGI->PriceList();
    if($try['result'] == false) { $out = ['res' => false,'data' => $try['message']]; } else {
    for($i = 0; $i <= count($try['data'])-1; $i++) {
        $outdata[$i] = $try['data'][$i];
    }
    $out = ['res' => true,'data' => $BFormat->DigiflazzService($outdata)];
}}

#############################################################################################################################################################
#############################################################################################################################################################
####----------------------------------------INI BAGIAN INPUT KE DATABASE JANGAN DISENTUH KALAU GAK NGERTI APA APA----------------------------------------####
#############################################################################################################################################################
#############################################################################################################################################################

if($out['res'] == false) {
    $output = [
        'result' => false,
        'data' => null,
        'message' => $out['data']
    ];
} else {
    $cat_insert = 0;   $srv_insert = 0;   $srv_update = 0;
    $is_inserted_srv = false;
    $is_inserted_category = false;
    $error_srv = '';
    $error_category = '';
    
    for($o = 0; $o <= count($out['data'])-1; $o++) {
        $code = $out['data'][$o]['code'];
        $name = $out['data'][$o]['name'];
        $note = $out['data'][$o]['note'];
        $type = $out['data'][$o]['type'];
        $otype = $out['data'][$o]['otype'];
        $brand = $out['data'][$o]['brand'];
        $kategori = $out['data'][$o]['kategori'];
        $price = $out['data'][$o]['price'];
        $status = $out['data'][$o]['status'];
        $prepost = $out['data'][$o]['prepost'];
        
        if(in_array($brand, [
            'MOBILE LEGEND',
            'ARENA OF VALOR',
            'LIFEAFTER CREDITS',
            'CALL OF DUTY MOBILE',
            'FREE FIRE',
            'HAGO',
            'LAPLACE M',
            'LORDS MOBILE',
            'RAGNAROK M: ETERNAL LOVE',
            'SPEED DRIFTERS',
            'VALORANT',
        ])) :
            $detect = '-';
            else:
                $detect = '-';
                endif;
        
        if($kategori == 'Driver') {
            $brand = $brand.' DRIVER';
        } else {
            $brand = $brand;
        }
        
        $brand = strtr($brand, [
            'CARREFOUR / TRANSMART' => 'CARREFOUR DAN TRANSMART',
            'MANDIRI E-TOLL' => 'MANDIRI E TOLL',
            'NEX & GARUDA' => 'NEX GARUDA',
            'K-VISION' => 'K VISION',
            'SMARTFREN' => 'SMART'
        ]);
        
        $start_index_increment = $o+1;
        $rate_basic = price('basic',$price,'DIGI');
        
        if($call->query("SELECT * FROM srv WHERE code = '$code' AND provider = '".$trxmove['c1']."'")->num_rows == false) {
            $is_inserted_srv = true;
            if ($call->query("INSERT INTO srv VALUES ('$start_index_increment','$type','$code','$name','$note','-','-','0','$rate_basic','$status','$brand', '$kategori','".$trxmove['c1']."')") === TRUE) {
                $srv_insert += 1;
            } else {
                $error_srv = $call->error;
            }
            // if($call->query("INSERT INTO srv VALUES ('','$type','$code','$name','$note','-','-','0','$price','$status','$brand', '$kategori','".$trxmove['c1']."')") == true) $srv_insert += 1;
        } else {
            if($call->query("UPDATE srv SET note = '$note', min = '-', max = '-', refill = '0', price = '$rate_basic', status = '$status', name = '$name', brand = '$brand', type = '$type', kategori = '$kategori' WHERE code = '$code' AND provider = '".$trxmove['c1']."'") == true) $srv_update += 1;
        }
        
        if($call->query("SELECT * FROM category WHERE code = '$brand' AND type = '$type'")->num_rows == 0) {
            $is_inserted_category = true;
            if ($call->query("INSERT INTO category VALUES ('$start_index_increment','$brand','$brand','$type','$otype','$prepost','$detect')") === TRUE) {
                $cat_insert += 1;
            } else {
                $error_category = $call->error;
            }
            // if($call->query("INSERT INTO category VALUES ('','$brand','$brand','$type','$otype','$prepost','$detect')") == true) $cat_insert += 1;
        }
        //if($call->query("DELETE FROM category WHERE type IN ('paket-telepon', 'pulsa-internasional')") == true);
        //if($call->query("DELETE FROM srv WHERE type IN ('paket-telepon', 'pulsa-internasional')") == true);
    }
    
    $output = [
        'result' => true,
        'data' => [
            'category' => ['insert' => $cat_insert,'update' => 0],
            'service' => ['insert' => $srv_insert,'update' => $srv_update],
        ],
        // 'is_inserted_srv' => $is_inserted_srv,
        // 'is_inserted_category' => $is_inserted_category,
        // 'error_srv' => $error_srv,
        // 'error_category' => $error_category,
        'message' => 'Success!'
    ];
}

print json_encode($output, JSON_PRETTY_PRINT);