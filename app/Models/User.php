<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute as CastsAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const STATUS =[
        1=>'fine',
        0=>'bad',
    ];
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getDateForEditingAttribute()
    {
        return $this->created_at->format('m/d/Y');
    }

    public function setDateForEditingAttribute($value)
    {
        $this->created_at = Carbon::parse($value);
        $this->save();
    }
    // protected function createdAt(): CastsAttribute
    // {
    //     return CastsAttribute::make(
    //         get: fn (string $value) => Carbon::parse($value),
    //         set: fn (string $value) =>$value = Carbon::parse($value),

    //     );
    // }
}
