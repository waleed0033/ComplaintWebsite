<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'manager_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function employees()
    {
        return $this->hasMany(User::class,'department_id','id');
    }

    public function mangeBy()
    {
        return $this->hasone(User::class,'id','manager_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class,'department_id','id');
    }
}
