<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping; 

class DonorExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data::with('donor')->orderBy('created_at', 'DESC')->get();
    }

    public function headings():array {
        return [
            'ID',
            'Name',
            'Email',
            'Telp',
            'Date',
            'Age',
            'Weight',
            'Message',
            'Status',
            'Response',
        ];
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->name,
            $item->email,
            $item->no_telp,
            \Carbon\Carbon::parse($item->created_at)->format('j F, Y'),
            $item->age,
            $item->BB,
            $item->pesan,
            $item->donor ? $item->donor['status'] : '-',
            $item->donor ? $item->donor['response'] : '-',
        ];
    }
}
