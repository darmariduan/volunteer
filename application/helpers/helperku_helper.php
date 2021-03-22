<?php

function set_zone()
{
    return date_default_timezone_set("Asia/Jakarta");
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function tgl_simpan($tgl)
{
    $tanggal = substr($tgl, 0, 2);
    $bulan = substr($tgl, 3, 2);
    $tahun = substr($tgl, 6, 4);
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

function tgl_view($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    return $tanggal . '-' . $bulan . '-' . $tahun;
}

function tgl_grafik($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . '_' . $bulan;
}

function hari_ini($w)
{
    $seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $hari_ini = $seminggu[$w];
    return $hari_ini;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function now()
{
    set_zone();
    return date('Y:m:d H:i:s');
}

function sendWhatsapp($nomor = 0)
{

    $CI = &get_instance();

    date_default_timezone_set('Asia/Jakarta');
    $time  = date("H");
    ($time < "11")                  ? $waktu = "Selamat Pagi"   : NULL;
    ($time >= "11" && $time < "15") ? $waktu = "Selamat Siang"  : NULL;
    ($time >= "15" && $time < "19") ? $waktu = "Selamat Sore"   : NULL;
    ($time >= "19")                 ? $waktu = "Selamat Malam"  : NULL;

    $isi  = $CI->db->where('tipe', 'default')->get('tbl_chatwhatsapp')->row()->isi;
    $chat = 'https://api.whatsapp.com/send?phone=' . $nomor . '&text=' . $waktu . ',%0A' . $isi;

    return $chat;
}

function selisihWaktu($start, $end)
{
    set_zone();
    if ($start == 'now') {
        $start = new DateTime();
    } else {
        $start = new DateTime($start);
    }
    $end = new DateTime($end);
    $diff = date_diff($end, $start);
    if ($diff->y > 0) {
        return $diff->y . ' tahun ';
    } else {
        if ($diff->m > 0) {
            return $diff->m . ' bulan ';
        } else {
            if ($diff->d > 0) {
                return $diff->d . ' hari ';
            } else {
                if ($diff->h > 0) {
                    return $diff->h . ' jam ';
                } else {
                    if ($diff->i > 0) {
                        return $diff->i . ' menit ';
                    } else {
                        if ($diff->s > 0) {
                            return '1 > Menit';
                        } else {
                            return 'Baru Saja';
                        }
                    }
                }
            }
        }
    }
}
function selisihTahun($start, $end)
{
    set_zone();
    if ($start == 'now') {
        $start = new DateTime();
    } else {
        $start = new DateTime($start);
    }
    $end = new DateTime($end);
    $diff = date_diff($end, $start);
    if ($diff->y > 0) {
        return $diff->y;
    } else {
        return 1;
    }
}
