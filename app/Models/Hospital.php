<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $fillable = [
        'user_id',
        'hospital_name',
        'hospital_address',
        'hospital_phone',
        'hospital_email',
        'hospital_website',
        'hospital_logo',
        'license_no',
        'status',
        'type',
        'opening_hours',
        'closing_hours',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
