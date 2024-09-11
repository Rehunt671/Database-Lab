<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBio extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

 use HasFactory;
 protected $table = 'user_bios';
 protected $fillable = [
 'user_id',
 'bio',
 ];
 protected $casts = [
 'created_at' => 'datetime',
 'updated_at' => 'datetime',
 ];
}
