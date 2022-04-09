<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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

    public function responsibleBy()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id');
    }

    public function issuerBy()
    {
        return $this->belongsTo(User::class, 'issuer_id', 'id');
    }

    public function serviceInfo()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function getStatus() : String
    {
        return match ($this->status) {
            0 => "Open",
            1 => "Closed",
            default => "unknown",
        };
    }

    public function getPriority() : String
    {
        return match ($this->priority) {
            1 => "Low",
            2 => "Mid low",
            3 => "Mid",
            4 => "High",
            5 => "Urgent",
            default => "unknown",
        };
    }
}
