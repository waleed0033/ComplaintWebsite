<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_id',
        'issuer_id',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function issueredBy()
    {
        return $this->hasOne(User::class,'id','issuer_id');
    }
}
