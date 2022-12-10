<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function borrowerData($borrowerId){
        return static::where('id', $borrowerId)->first();
    }

    /**
    * Get the user that owns the Borrow
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }
}
