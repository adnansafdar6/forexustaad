<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'guard_name',
    ];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions');
    }
    public function admin(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Admin::class);
    }
}
