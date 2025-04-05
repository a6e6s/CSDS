<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'time',
        'date',
        'contact',
        'patient',
        'notes',
        'offer_id',
        'appointmet_id',
        'user_id',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'offer_id' => 'integer',
        'appointmet_id' => 'integer',
        'user_id' => 'integer',
        'status' => 'integer',
    ];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function appointmet(): BelongsTo
    {
        return $this->belongsTo(AvailableAppointment::class);
    }
}
