<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'f_a_q_s';
    protected $guarded = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();

            if (static::count() < 1) {
                $model->sequence = 1;
                return;
            }

            $increment = static::latest()->first()->sequence;
            $value = $increment + 1;
            $model->sequence = $value;
        });
    }
}
