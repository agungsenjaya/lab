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
        case 'super.dokter':
            echo 'Table Dokter';
            break;
        case 'super.dokter_new':
            echo 'Tambah Dokter';
            break;
        case 'super.dokter_edit':
            echo 'Edit Dokter';
            break;
        default:
            echo 'Dashboard';
            break;
    }
}

function titleOwner($a){
    // 
}