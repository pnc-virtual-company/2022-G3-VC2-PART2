<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniCompany extends Model
{
    use HasFactory;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
        'created_at',
        'user_id'
    ];

    protected $casts = [
        'is_working' => 'boolean',
    ];

    // Relationship
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
