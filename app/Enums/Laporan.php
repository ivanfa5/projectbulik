<?php

namespace App\Enums;


enum Laporan: string
{
    case Januari      = '1';
    case Februari    = '2';
    case Maret    = '3';
    case April    = '4';
    case Mei    = '5';
    case Juni    = '6';
    case Juli    = '7';
    case Agustus    = '8';
    case September    = '9';
    case Oktober    = '10';
    case November    = '11';
    case Desember    = '12';

    public  function labels(): string
    {
        return match ($this) {
            self::Januari         => "Januari",
            self::Februari       => "Februari",
            self::Maret       => "Maret",
            self::April       => "April",
            self::Mei       => "Mei",
            self::Juni       => "Juni",
            self::Juli       => "Juli",
            self::Agustus       => "Agustus",
            self::September       => "September",
            self::Oktober       => "Oktober",
            self::November       => "November",
            self::Desember       => "Desember",
        };
    }

    // Returns labels for PowerGrid Select Filter
    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}



