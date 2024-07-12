<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'id_company',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the role that owns the user.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
