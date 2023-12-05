<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LogsActivity;

class SocialAccount extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'avatar', 'provider_name', 'provider_id'
    ];

    // User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
