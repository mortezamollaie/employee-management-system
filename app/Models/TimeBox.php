<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'description',
        'user_id',
    ];

    public static function createTimeBox($request, $user)
    {
         return TimeBox::query()->create([
            'start' => now(),
            'description' => $request->input('description'),
            'user_id' => $user->id
        ]);
    }
}
