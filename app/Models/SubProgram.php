<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProgram extends Model
{
    use HasFactory;

    protected $table = 'sub_programs';
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

    public function program()
    {
        return $this->belongsTo(Program::class, 'programId');
    }

    public function regencies()
    {
        return $this->belongsToMany(Regency::class, 'regency_sub_programs', 'subProgramId', 'regencyId');
    }
}
