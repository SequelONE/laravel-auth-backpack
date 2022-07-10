<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

    protected $table = 'sessions';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity'
    ];
}
