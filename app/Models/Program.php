<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';
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
        return $this->belongsToMany(Regency::class, 'program_regencies', 'programId', 'regencyId');
    }

    public function subprograms()
    {
        return $this->hasMany(SubProgram::class, 'programId');
    }
}
