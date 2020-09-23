<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable = ['judul', 'slug', 'isi', 'tgl_kejadian', 'lokasi_kejadian', 'foto'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tgl_kejadian'
    ];

    public function pelapor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
