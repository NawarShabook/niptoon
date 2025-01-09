<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'date',
        'notes',
        'icon',
        'region_id',
    ];
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
