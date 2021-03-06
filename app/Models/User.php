<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements Sluggable
{
    use HasSlug;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
        'can_guest_post',
        'twitter_handle',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'admin' => 'boolean',
        'can_guest_post' => 'boolean'
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(
            Profile::class,
            'user_id'
        );
    }

    public function articles(): HasMany
    {
        return $this->hasMany(
            Article::class,
            'submitted_by_user_id',
        );
    }

    public function podcasts(): HasMany
    {
        return $this->hasMany(
            Podcast::class,
            'submitted_by_user_id',
        );
    }

    public function packages(): HasMany
    {
        return $this->hasMany(
            Package::class,
            'submitted_by_user_id',
        );
    }

    public function links(): HasMany
    {
        return $this->hasMany(
            Link::class,
            'user_id'
        );
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(
            Bookmark::class,
            'user_id',
        );
    }

    /**
     * @return HasMany
     */
    public function submittedArticles(): HasMany
    {
        return $this->hasMany(
            Article::class,
            'submitted_by_user_id'
        );
    }

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->name;
    }
}
