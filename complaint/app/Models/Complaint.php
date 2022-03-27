<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'issuer_id',
        'responsible_id',
        'title',
        'status',
        'priority'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function complaintRecords()
    {
        return $this->hasMany(ComplaintRecord::class, 'complaint_id', 'id');
    }
}
