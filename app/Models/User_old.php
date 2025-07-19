<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'show_password',
        'password',
        'facebook',
        'website',
        'whatsup',
        'country_id',
        'state_id',
        'city_id',
        'age',
        'gender',
        'image',
        'experience',
        'language',
        'other',
        'page_title',
        'meta_title',
        'description',
        'short_description',
        'meta_description',
        'meta_keyword',
        'is_active',
        'is_featured',
        'is_locked',
        'is_block',
        'tattve_media_id',
        'slug',
        'instagram',
        'youtube',
        'linkedin',
        'banner_image',
        'header_image',
        'company_name',
        'designation',
        'is_company',
        'qualification'
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

    /**
     * Get the images for the user.
     */
    public function images()
    {
        return $this->hasMany(UserImage::class);
    }

     public function video_list()
    {
        return $this->hasMany(VideoGallery::class);
    }

      public function  experiences()
    {
        return $this->hasMany(Experience::class);
    }


    /**
     * Get the user's profile image.
     */
    public function profileImage()
    {
        return $this->hasOne(UserImage::class)->where('is_profile', true);
    }

      public function city_info()
    {
        return $this->hasOne(City::class,'id','city_id');
    }

    // In User model

    public function getExperienceAttribute($value)
    {
        return explode(',', $value);
    }

    public function setExperienceAttribute($value)
    {
        $this->attributes['experience'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function getLanguageAttribute($value)
    {
        return explode(',', $value);
    }

    public function setLanguageAttribute($value)
    {
        $this->attributes['language'] = is_array($value) ? implode(',', $value) : $value;
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class, 'member_id')->where('user_id', Auth::id());
    }


}
