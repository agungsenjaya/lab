<?php

function counTing($a)
{
    $len = strlen($a);
    switch ($len) {
        case 1:
            echo '0' . $a;
            break;
        default:
            echo $a;
            break;
    }
}

function titleSuper($a)
{
    // Route::currentRouteName();
    switch ($a) {
        case 'dashboard.super':
            echo 'Dashboard';
            break;
        case 'super.pasien':
            echo 'Table Pasien';
            break;
        case 'super.pasien_search':
            echo 'Pencarian Pasien';
            break;
        case 'super.dokter':
            echo 'Table Dokter';
            break;
        case 'super.dokter_new':
            echo 'Tambah Dokter';
            break;
        case 'super.dokter_edit':
            echo 'Edit Dokter';
            break;
        case 'super.user':
            echo 'Table User';
            break;
        case 'super.user_edit':
            echo 'Edit User';
            break;
        case 'super.user_new':
            echo 'Tambah User';
            break;
        case 'super.account':
            echo 'Setting Account';
            break;
        case 'super.laporan':
            echo 'Laporan Cabang';
            break;
        case 'super.cabang_detail':
            echo 'Detail Cabang';
            break;
        case 'super.price':
            echo 'Table Price';
            break;
        default:
            echo 'Dashboard';
            break;
    }
}

function titleOwner($a){
    // 
}