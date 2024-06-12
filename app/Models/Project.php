<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function projectMembers()
    {
        return $this->hasMany('App\ProjectMember');
    }

    // public function errors()
    // {
    //     return $this->hasMany('App\Error');
    // }
}
