<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;

    protected $fillable = ['contact_id', 'mobile'];


    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
}
