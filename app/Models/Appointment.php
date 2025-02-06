<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'clinic_id', 'patient_name', 'patient_email', 'patient_phone', 'appointment_date', 'status'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class);
    }
}
