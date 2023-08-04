<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blessing extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date',
    ];

    public static function getDate($date)
    {
        return self::query()
            ->where('date', 'like', $date . '%')
            ->get();
    }
}
