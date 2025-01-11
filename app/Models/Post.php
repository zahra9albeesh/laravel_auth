<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes; 
    protected $dates =['deleted_at'];
    protected $fillable = ['user_id','title','content','photo','slug'];
    public function users(): BelongsTo
        {
             return $this->belongsTo('App\Models\User','user_id');
        }
        public function  tags(): BelongsToMany
        {
            return $this->belongsToMany('App\Models\Taq');
        }
}
/**
 * Get the user that owns the Post
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
