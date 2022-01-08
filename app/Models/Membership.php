<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * has many user membership
     */
    public function user_membership()
    {
        return $this->hasMany('\App\Models\UserMembership');
    }
}
