<?php
if (!function_exists('formatTanggal')) {
    function formatTanggal($tanggal, $format = 'short')
    {
        $bulan = [
            '01' => ['Jan', 'Januari'],
            '02' => ['Feb', 'Februari'],
            '03' => ['Mar', 'Maret'],
            '04' => ['Apr', 'April'],
            '05' => ['Mei', 'Mei'],
            '06' => ['Jun', 'Juni'],
            '07' => ['Jul', 'Juli'],
            '08' => ['Agu', 'Agustus'],
            '09' => ['Sep', 'September'],
            '10' => ['Okt', 'Oktober'],
            '11' => ['Nov', 'November'],
            '12' => ['Des', 'Desember'],
        ];

        $date = date_create($tanggal);
        $day = date_format($date, 'd');
        $month = ($format === 'short') ? $bulan[date_format($date, 'm')][0] : $bulan[date_format($date, 'm')][1];
        $year = date_format($date, 'Y');

        return "{$day} {$month} {$year}";
    }
}


?>