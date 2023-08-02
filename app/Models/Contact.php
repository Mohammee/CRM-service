<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'job', 'description', 'birthday','avatar'];
    protected $sort = ['asc', 'desc'];


protected static function booted()
{
//   static::observe(ContactObserver::class);
}

    public function scopeFilter(Builder $builder)
    {
        $builder->when(request('name'), fn($q,$v) => $q->where('name', 'like', "%{$v}%"));
        $builder->when(request('email'), fn($q,$v) => $q->where('email', 'like', "%{$v}%"));
        $builder->orderBy('created_at', $this->sort[request()->query('sort_by')] ?? 'asc');
    }

    public function mobiles()
    {
        return $this->hasMany(Mobile::class, 'contact_id', 'id');
    }


    public function getAvatarUrlAttribute()
    {
        $avatar = $this->avatar;
        if($avatar && Storage::exists($avatar)){
            return Storage::url($avatar);
        }

        return null;
    }

    public static function dropAvatar($path)
    {
        if ($path && Storage::exists($path)){
            Storage::delete($path);
        }
    }

}
