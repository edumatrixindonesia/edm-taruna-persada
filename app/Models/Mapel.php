<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapels';
    protected $guarded = ['id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function regencies()
    {
        return $this->belongsToMany(Regency::class, 'mapel_regencies', 'mapelId', 'regencyId');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'programId');
    }
}
