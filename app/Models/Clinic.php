<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function patients()
{
    return $this->hasMany(Patient::class);
}
public function medicalRecords()
{
    return $this->hasMany(MedicalRecords::class);

}
}
