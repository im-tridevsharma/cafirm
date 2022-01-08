<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * membership belongs to user
     */
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }

    /**
     * belongs to membership
     */
    public function membership()
    {
        return $this->belongsTo('\App\Models\Membership');
    }
}
