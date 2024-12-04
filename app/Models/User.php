<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Administration\Account\AdminProfile;
use App\Models\Administration\App\AppFeature;
use App\Models\Administration\Article\Article;
use App\Models\Administration\Log\BanLog;
use App\Models\System\Info\AboutUs;
use App\Models\System\Info\ContactUs;
use App\Models\System\Info\Country;
use App\Models\System\Info\FAQ;
use App\Models\System\Info\PrivacyPolicy;
use App\Models\System\Info\State;
use App\Models\System\Info\Tos;
use App\Models\System\Report\UserReport;
use App\Models\System\Roles\Role;
use App\Models\Users\Account\LoginHistory;
use App\Models\Users\Account\UserFcmToken;
use App\Models\Users\Account\UserPoint;
use App\Models\Users\Account\UserProfile;
use App\Models\Users\Account\UserSkill;
use App\Models\Users\Service\UserService;
use App\Traits\ImagesHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//Filament
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Filament\Models\Contracts\HasName;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class User extends Authenticatable implements FilamentUser, HasName, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, ImagesHelper;

    protected $with = ["role"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'mid_name',
        'last_name',
        'account_name',
        'email',
        'password',
        'phone_number',
        'country_id',
        'state_id',
        'birth_date',
        'img_url',
        'deactive_at',
        'last_seen',
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
        'password' => 'hashed',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, "role_id");
    }

    public function adminProfile(): HasOne
    {
        return $this->hasOne(AdminProfile::class, "user_id");
    }

    public function createdAdmins(): HasMany|null
    {
        if (auth()->user()->role_id != 3)
            return $this->hasMany(AdminProfile::class, "created_by");
        return null;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, "country_id");
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, "state_id");
    }

    public function appFeaturesUpdates(): HasMany
    {
        return $this->hasMany(AppFeature::class, "updated_by");
    }

    public function appAbouts(): HasMany
    {
        return $this->hasMany(AboutUs::class, 'last_update_by');
    }

    public function appFAQs(): HasMany
    {
        return $this->hasMany(FAQ::class, 'last_update_by');
    }

    public function appTos(): HasMany
    {
        return $this->hasMany(Tos::class, 'last_update_by');
    }

    public function appContacts(): HasMany
    {
        return $this->hasMany(ContactUs::class, 'created_by');
    }

    public function appPrivacies(): HasMany
    {
        return $this->hasMany(PrivacyPolicy::class, 'last_update_by');
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    public function bans(): HasMany
    {
        return $this->hasMany(BanLog::class, "banned_id");
    }

    public function bannedByMe(): HasMany
    {
        return $this->hasMany(BanLog::class, "banned_by_id");
    }

    public function reports(): HasMany
    {
        return $this->hasMany(UserReport::class, "reported_id");
    }

    public function profileReports(): MorphMany
    {
        return $this->morphMany(UserReport::class, "reportable");
    }

    public function reportsFrom(): HasMany
    {
        return $this->hasMany(UserReport::class, "reporter_id");
    }

    public function fcmTokens(): HasMany
    {
        return $this->hasMany(UserFcmToken::class, "user_id");
    }

    public function loginHistory(): HasMany
    {
        return $this->hasMany(LoginHistory::class, "user_id");
    }
    public function skills(): HasMany
    {
        return $this->hasMany(UserSkill::class, "user_id");
    }

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, "user_id");
    }

    public function points(): HasMany
    {
        return $this->hasMany(UserPoint::class, "user_id");
    }

    public function services(): HasMany
    {
        return $this->hasMany(UserService::class);
    }

    //
    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucfirst(strtolower(trim($value)));
    }

    public function setMidNameAttribute($value): void
    {
        $this->attributes['mid_name'] = ucfirst(strtolower(trim($value)));
    }

    public function setLastNameAttribute($value): void
    {
        $this->attributes['last_name'] = ucfirst(strtolower(trim($value)));
    }

    public function setEmailAttribute($value): void
    {
        $this->attributes['email'] = strtolower(trim($value));
    }

    public function setPhoneNumberAttribute($value): void
    {
        $this->attributes['phone_number'] = trim($value);
    }

    public function setAccountNameAttribute($value): void
    {
        if ($value)
            $this->attributes['account_name'] = strtolower(str_replace(['@', ' '], ['', '_'], trim($value)));
        else $this->attributes['account_name'] = null;
    }

    public function getNameAttribute(): string
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getFullNameAttribute(): string
    {
        $str = ucfirst($this->first_name);
        if ($this->mid_name)
            $str .= " " . ucfirst($this->mid_name);
        $str .= " " . ucfirst($this->last_name);
        return $str;
    }

    public function getName(): string
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public function getFullName(): string
    {
        $str = ucfirst($this->first_name);
        if ($this->mid_name)
            $str .= " " . ucfirst($this->mid_name);
        $str .= " " . ucfirst($this->last_name);
        return $str;
    }

    //Filament
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->account_name, 'admin') && $this->role_id != 3 && $this->deactive_at == null;
    }

    public function getFilamentName(): string
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return asset($this->getProfileImage($this));
    }

    //Scopes
    public function scopeSearchName(Builder $query, string|null $search): void
    {
        is_null($search) ? $search = '' : null;
        $query->where(function ($query) use ($search) {
            if (substr($search, 0, 1)  == "@") {
                $query->where("account_name", 'like', substr($search, 1) . '%');
            } else
                $query->whereAny(["first_name", "last_name"], 'like', strtolower($search) . '%')
                    ->orWhereRaw("concat(first_name,' ',mid_name,' ', last_name) like '%$search%' ")
                    ->orWhereRaw("concat(first_name,' ', last_name) like '%$search%' ")
                    ->orWhere("account_name", $search);
        });
    }
}
