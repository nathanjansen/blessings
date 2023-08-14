<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Blessing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'date',
    ];

    public static function booted()
    {
        static::addGlobalScope(fn (Builder $query) => $query->where('user_id', auth()->user()->id));
    }

    public static function getDate($date)
    {
        return self::query()
            ->where('date', 'like', $date . '%')
            ->get();
    }
}
