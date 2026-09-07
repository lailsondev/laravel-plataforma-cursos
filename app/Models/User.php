<?php

namespace App\Models;

use App\Notifications\ForgotPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['firstName', 'lastName', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }

    public function getAvatarColorAttribute(): string
    {
        $colors = [
            'bg-indigo-600',
            'bg-blue-600',
            'bg-green-600',
            'bg-purple-600',
            'bg-pink-600',
            'bg-yellow-600',
            'bg-red-600',
            'bg-orange-600',
        ];

        return $colors[$this->id % count($colors)];
    }

    public function getInitialsAttribute(): string
    {
        $first = mb_substr($this->firstName ?? '', 0, 1);
        $last = mb_substr($this->lastName ?? '', 0, 1);

        return strtoupper($first.$last);
    }

    public function getFullNameAttribute(): string
    {
        return $this->firstName.' '.$this->lastName;
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = 'http://127.0.0.1:8000/forgot-password/'.$token;
        $this->notify(new ForgotPasswordNotification($url));
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailNotification);
    }
}
