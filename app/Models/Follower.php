<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use SoftDeletes;

    protected $table = 'followers';
    protected $guarded = [];

    public function hasFollower()
    {
        return $this->hasOne(User::class, 'slug', 'follower_slug');
    }
    public function hasUser()
    {
       return $this->hasOne(User::class, 'slug', 'user_slug');
    }
}
