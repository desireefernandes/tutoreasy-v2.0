<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title' ,'body', 'user_id'
    ];

    protected static function booted()
    {
        static::deleting(function(Post $post) {
            Log::channel('stderr')->info('Evento PostDeleted' .$post->id);
            Storage::disk('public')->delete($post->image->path);
        });
    }
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function image() {
        return $this->hasOne('App\Models\Image');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int                                    $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByUser(Builder $query, int $id)
    {
        return $query->whereHas('user', function ($user) use ($id) {
            $user->where('id', $id);
        });
    }

}
