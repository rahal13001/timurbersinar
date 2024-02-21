<?php

namespace App\Exports;

use App\Models\admin\antrian\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class QueueclientExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithColumnWidths
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
        return Client::with('service', 'location')->whereKey($this->checked);
    }

    public function collection()
    {
        //
    }

    public function map($query): array
    {
        $no_antrian = $query->service->kode_layanan." ".$query->no_antrian;
        $isi = [
            $query->created_at,
            $query->nama,
            $query->email,
            $query->no_hp,
            $query->location->lokasi,
            $query->service->nama_layanan,
            $no_antrian,
            $query->status
        ];

        return $isi;
    }

    
    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama',
            'Email',
            'No HP',
            'Lokasi',
            'Nama Layanan',
            'No Antrian',
            'Status',
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
            'B' => 20,
            'C' => 25,
            'D' => 10,
            'E' => 10,
            'F' => 15,
            'G' => 10,
            'H' => 10,

        ];
    }
}
