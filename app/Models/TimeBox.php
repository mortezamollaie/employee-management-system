<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'description',
        'user_id',
        'elapsed_time',
    ];

    public static function createTimeBox($request, $user)
    {
         return TimeBox::query()->create([
            'start' => now(),
            'description' => $request->input('description'),
            'user_id' => $user->id
        ]);
    }

    public function endTimeBox(): void
    {
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);
        $diff = $start->diff($end);
        $time = $diff->h . ':' . $diff->i . ':' . $diff->s;
        $this->update([
            'end' => now(),
            'elapsed_time' => $time,
        ]);
    }
}
