<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
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

    public static function daily(): Collection
    {
        return self::selectRaw('DAY(date) as week, COUNT(*) as count')
            ->groupBy(DB::raw('DAY(date)'))
            ->get();
    }

    public static function weekly(): Collection
    {
        return self::selectRaw('WEEK(date) as week, COUNT(*) as count')
            ->groupBy(DB::raw('WEEK(date)'))
            ->get();
    }

    public static function monthly(): Collection
    {
        return self::selectRaw('MONTH(date) as week, COUNT(*) as count')
            ->groupBy(DB::raw('MONTH(date)'))
            ->get();
    }

    public static function yearly(): Collection
    {
        return self::selectRaw('YEAR(date) as week, COUNT(*) as count')
            ->groupBy(DB::raw('YEAR(date)'))
            ->get();
    }

    public static function mostBlessedDay()
    {
        return self::query()
            ->select(DB::raw('DAYNAME(date) as dayOfWeek, COUNT(*) as count'))
            ->groupBy(DB::raw('DAYNAME(date)'))
            ->orderBy('count', 'desc')
            ->first()
            ?->dayOfWeek;
    }
}
