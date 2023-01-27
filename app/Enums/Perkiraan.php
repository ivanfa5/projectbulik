<?php

namespace App\Enums;


enum Perkiraan: string
{
    case DEBIT      = 'Debit';
    case KREDIT    = 'Kredit';

    public  function labels(): string
    {
        return match ($this) {
            self::DEBIT         => "🔽 Debit",
            self::KREDIT       => "🔼 Kredit",
        };
    }

    // Returns labels for PowerGrid Select Filter
    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}



