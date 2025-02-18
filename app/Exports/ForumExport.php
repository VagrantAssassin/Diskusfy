<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ForumExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Kategoris' => new KategorisExport(),
            'Penggunas' => new PenggunasExport(),
            'Diskusis' => new DiskusisExport(),
            'Balasans' => new BalasansExport(),
            'Balasans_2' => new Balasans2Export(),
            'Votes' => new VotesExport(),
        ];
    }
}
