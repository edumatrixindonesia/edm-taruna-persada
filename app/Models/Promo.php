<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promos';
    protected $guarded = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();

            if (static::count() < 1) {
                $model->seq = 1;
                return;
            }

            $increment = static::latest()->first()->seq;
            $value = $increment + 1;
            $model->seq = $value;
        });
    }
}
