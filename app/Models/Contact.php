<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = ['email', 'phone', 'country', 'city', 'street', 'state', 'why_contact_us', 'status'];
}
