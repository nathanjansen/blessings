<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

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
        if (app()->runningInConsole()) {
            return;
        }

        static::addGlobalScope(fn (Builder $query) => $query->where('user_id', auth()->user()?->id));
    }

    public static function getDate($date)
    {
        return self::query()
            ->where('date', 'like', $date . '%')
            ->get();
    }

    public static function amountPerWeek()
    {
        return self::selectRaw('WEEK(date) as week, COUNT(*) as count')
            ->groupBy(DB::raw('WEEK(date)'))
            ->get();
    }
}
