<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMotto extends Model
{
    use HasFactory;

    protected $fillable = ['team_motto', 'status'];
}
