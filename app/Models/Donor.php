<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;

class Donor extends Model
{
    use HasFactory;
    protected $table = 'respones';
    protected $fillable = [
        'data_id',
        'status',
        'response',
    ];

    public function data()
    {
        return $this->belongsTo(Data::class);
    }
}
