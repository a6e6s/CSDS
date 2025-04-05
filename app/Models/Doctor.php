<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'email',
        'password',
        'image',
        'cetifications',
        'hospital_id',
        'specialty_id',
        'city_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hospital_id' => 'integer',
        'specialty_id' => 'integer',
        'city_id' => 'integer',
        'status' => 'integer',
        'updated_at' => 'datetime',
    ];

    public function availableAppointment(): BelongsTo
    {
        return $this->belongsTo(AvailableAppointment::class, 'id', 'doctor_id');
    }

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(Hospital::class);
    }

    public function specialty(): BelongsTo
    {
        return $this->belongsTo(Specialty::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
