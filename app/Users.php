<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Users extends Model
{
    //
    protected $fillable = ["name", "email", "role_id"];

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Roles::class, "role_id");
    }

}
