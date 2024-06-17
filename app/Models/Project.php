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
        return $this->hasMany(ProjectMember::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function isAdmin(User $user)
    {
        return $this->admin_id === $user->id;
    }

    public function isMember(User $user)
    {
        return $this->projectMembers()->where('user_id', $user->id)->exists();
    }
}