<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LogsActivity;

class Session extends Model {

    use LogsActivity;

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
