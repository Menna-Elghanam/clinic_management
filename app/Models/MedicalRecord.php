<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'diagnosis', 'prescription', 'notes'];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}