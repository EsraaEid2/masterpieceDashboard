<?php namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'role_id', 'social_links', 'bio', 'profile_pic',
        'first_name', 'last_name', 'email', 'password', 'phone', 'is_deleted'
    ];

    // Relationship to Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relationship to Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Optionally, if you have an Images model, you can define a relationship to it
    public function images()
    {
        return $this->hasMany(Image::class);
    }


}