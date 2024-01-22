<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminType extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin_type';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'admin_type',
    ];

    public function admin(): BelongsTo{

        return $this->belongsTo(Admin::class);
    }

}
