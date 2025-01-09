<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'second_name',
        'location_link',
        'shipment_id',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }

}
