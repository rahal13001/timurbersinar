<?php

namespace App\Exports\admin\bukutamu;

use App\Models\Guestbook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;

class GuestbooksExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $checked;

        public function __construct($checked)
        {
            $this->checked = $checked;
        }

        public function query()
        {
            return Guestbook::whereKey($this->checked);
        }

        public function map($query): array
        {
            $isi = [
                $query->tanggal,
                $query->datang,
                $query->pulang,
                $query->nama,
                $query->jk,
                $query->email,
                $query->no_hp,
                $query->instansi,
                $query->lokasi,
                $query->keperluan,
                $query->pegawai,

            ];

            return $isi;
        }

        public function headings(): array
    {
        return [
            'Tanggal',
            'Jam Datang',
            'Jam Pulang',
            'Nama',
            'Jenis Kelamin',
            'Email',
            'Nomor HP',
            'Instansi',
            'Lokasi',
            'Keperluan',
            'Menemui',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 10,
            'D' => 25,
            'E' => 15,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 15,
            'J' => 30,
            'K' => 40,

        ];
    }


}
