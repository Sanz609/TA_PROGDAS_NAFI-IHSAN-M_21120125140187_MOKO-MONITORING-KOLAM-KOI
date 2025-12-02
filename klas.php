<?php
class ta
{
    public function pH()
    {
        $pH = array(6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 8.9, 9.3);
        return $pH;
    }

    public function TDS()
    {
        $tds = array(100, 200, 250, 500, 300, 230, 400, 220, 150, 450);
        return $tds;
    }

    public function nh3()
    {
        $nh3 = array(0.02, 0.1, 0.2, 0.5, 0.06, 0.7, 1, 0.2, 0.09, 0.22);
        return $nh3;
    }

    public function suhu()
    {
        $suhu = array(20, 20.2, 20.3, 21.5, 22.5, 22.6, 22.8, 23, 23.5, 31);
        return $suhu;
    }

    public function batas_ambang($parameter, $nilai)
    {
        if ($parameter == "pH") {
            if ($nilai > 8) $status = "Filter kolam kotor...";
            elseif ($nilai < 7) $status = "Kolam perlu dibackwash...";
            else $status = "Aman...";
        } elseif ($parameter == "tds") {
            if ($nilai > 300) $status = "TDS kolam terlalu tinggi...";
            else $status = "TDS kolam aman...";
        } elseif ($parameter == "nh3") {
            if ($nilai > 0.25) $status = "Agak berbahaya...";
            else $status = "aman...";
        } else {
            if ($nilai > 30) $status = "Suhu kolam panas...";
            else $status = "Suhu kolam aman...";
        }
        return $status;
    }
}
