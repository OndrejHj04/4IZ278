<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Notification extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function reservation(): BelongsTo {
        return $this->belongsTo(Reservation::class);
    }

    public function shortContent(){
        return Str::limit($this->content,40);
    }
}
