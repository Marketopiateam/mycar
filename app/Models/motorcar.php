<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorcar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function model() {
        return $this->belongsTo(modelcar::class, 'modelcar_id');

    }
}
