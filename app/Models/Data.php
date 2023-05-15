<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Donor;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'age',
        'BB',
        'no_telp',
        'goldar',
        'pesan',
        'foto',
    ];

    public function donor()
    {
        return $this->hasOne(Donor::class);
    }
}
