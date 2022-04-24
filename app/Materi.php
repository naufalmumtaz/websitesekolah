<?php

namespace App;

use App\Materi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = [
        'judul', 'file_materi', 'modul_id'
    ];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function modul()
    {
        return $this->belongsTo('App\Modul');
    }

    public function materi()
    {
        return $this->hasMany('App\Materi');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid();
            }
        });
    }
}
