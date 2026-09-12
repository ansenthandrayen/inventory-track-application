<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    // Forcer le nom de la table car "equipment" est déjà le pluriel en anglais
    protected $table = 'equipments';

    protected $fillable = [
        'name',
        'category',
        'serial_number',
        'location',
        'status',
        'notes',
    ];
}