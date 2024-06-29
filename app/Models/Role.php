<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['user_id', 'level_id'];

    protected $with = ['level'];

    public function level() {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
