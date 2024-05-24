<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regency extends Model
{
    use HasFactory;

    protected $table = 'regencies';
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

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinceId');
    }

    public function mapels()
    {
        return $this->belongsToMany(Mapel::class, 'mapel_regencies', 'regencyId', 'mapelId');
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_regencies', 'regencyId', 'programId');
    }
}
