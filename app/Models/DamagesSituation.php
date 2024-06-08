<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DamagesSituation extends Model
{
    use HasFactory;

    protected $table = 'damages_situations';
    protected $fillable = [
        'damage_id',
        'situation_id',
        'print_pdf',
        'archived',
    ];
}
