<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'code_id',
        'type',
        'start_date',
        'end_date',
        'notes',
        'published',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
    public function actions()
    {
        return $this->hasMany(Action::class);
    }

}
