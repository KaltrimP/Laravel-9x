<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $fillable = ['Title','Author', 'Body', 'user_id'];

// Creating Scope Filtering for Posts title and author
    public function scopeFilter($query, array $filter){
        if ($filter['search'] ?? false ){
            $query->where('Title', 'like', '%'.request('search').'%')
                       ->orWhere('Author', 'like', '%'.request('search').'%');

        }
    }

    /**
     * Get the user that owns the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

}
