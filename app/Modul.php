<?php

namespace App;

use App\Modul;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'judul', 'nama_guru', 'user_id', 'gambar'
    ];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo('App\User');
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

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
