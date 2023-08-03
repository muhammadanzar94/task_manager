<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
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
    ];


    public static function saveNewUser($new_user) {
        $result = new User(self::mapOnTable($new_user));
        if ($result->save()) {
            return ['id' => $result['id'], 'email' => $result['email']];
        }
        return false;
    }

    public static function verifyUser($params) {

        $result = self::where([
            ['email', $params['email']],
            ['password', $params['password']]
        ])->first();
        if (!empty($result)) {
            return $result;
        }
        return false;
    }

    public static function mapOnTable($params) {
        return [
            'uuid' => Str::uuid()->toString(),
            'email' => $params['email'],
            'password' => $params['password']
        ];
    }
}
