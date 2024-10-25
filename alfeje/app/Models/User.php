<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    /*use TwoFactorAuthenticatable;
    use HasRoles;*/



    /**
     * @OA\Property(
     *     title="Fillable Variables",
     *     description="The attributes that should be fillable.",
     *     example="name, email, password",
     *     @OA\Items(type="string")
     * )
     * 
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];



    /**
     * @OA\Property(
     *     title="Rules Variables",
     *     description="some rules for variables",
     *     example="required",
     *     @OA\Items(type="string")
     * )
     * 
     * @var array
     */
    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|confirmed',
    ];

    /**
     * @OA\Property(
     *     title="Hidden Variables",
     *     description="The attributes that should be hidden.",
     *     example="password, remember_token, two_factor_recovery_codes, two_factor_secret",
     *     @OA\Items(type="string")
     * )
     * 
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * @OA\Property(
     *     title="Cast Variables",
     *     description="The attributes that should be cast.",
     *     example="email_verified_at",
     *     @OA\Items(type="datetime")
     * )
     * 
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @OA\Property(
     *     title="appends Variables",
     *     description="The accessors to append to the model's array form.",
     *     format="profile_photo_url",
     *     @OA\Items(type="string")
     * )
     * 
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @OA\SetPasswordAttribute(
     *     description="Takes the password and it gonna encrypt it",
     * )
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @OA\SetAClientLink(
     *     description="Associates a client with the user.",
     * )
     */
    public function client()
    {
        // return $this->hasOne(Client::class);
    }

    public function employee()
    {
        // return $this->hasOne(Employee::class);
    }
    public function roles()
    {
        // return $this->morphToMany(Role::class, 'model', 'model_has_roles', 'model_id', 'role_id');
    }

    protected $guard_name = 'api';
}
