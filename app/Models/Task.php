<?php

namespace App\Models;

use App\Models\Traits\Repliable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Collection replies
 * @property int|null creator_id
 * @property string status
 * @property string importance
 */
class Task extends Model
{
    use Repliable, SoftDeletes;

    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $task) {
            if (auth()->check()) {
                $task->creator_id = auth()->id();

                if($task->status === null){
                    $task->status = 'ACTIVE';
                }

                if($task->importance === null){
                    $task->importance = 'NORMAL';
                }
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function statuses()
    {
        $tasks = auth()->user()->isAdmin() ? static::query() : auth()->user()->tasks();

        return $tasks->select(['status', \DB::raw('COUNT(status) as status_count')])
                     ->groupBy('status')
                     ->get();
    }

    public function scopeTaskBuilder()
    {
        $tasks = auth()->user()->isAdmin() ? static::query() : auth()->user()->tasks();

        return $tasks->orderBy('id', 'desc')->withCount('replies');
    }
}
