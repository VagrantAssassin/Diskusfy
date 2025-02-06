<?php

namespace App\Exports;

use App\Models\Diskusi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiskusiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Diskusi::select('id_diskusi', 'id_kategori', 'uid', 'judul', 'isi_diskusi', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return ['ID Diskusi', 'ID Kategori', 'UID', 'Judul', 'Isi Diskusi', 'Dibuat Pada', 'Diperbarui Pada'];
    }
}
