<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
//  создаём условные id для ролей
//  id для админа
    const ROLE_ADMIN = 0;
//  id для пользователей
    const ROLE_READER = 1;

    protected $table = 'users';
    protected $guarded = [];

    public static function getRoles()
    {
        return[
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Пользователь',
        ];
    }


// пишем константы  и функции для пола
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    static function getGenders() {
        return [
            self::GENDER_MALE => 'Мужской',
            self::GENDER_FEMALE => 'Женский',
        ];
    }
// здесь мы получаем значение пол и передаём его в index.blade и show.blade в виде genderTitle
    public function getGenderTitleAttribute() {
        return self::getGenders()[$this->gender];
    }

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

    //  отправка письма пользователю при регистрации
//    public function sendEmailVerificationNotification()
//    {
//        $this->notify(new SendVerifyWithQueueNotification());
//    }

}
