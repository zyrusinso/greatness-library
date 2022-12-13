<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getAll()
    {
        $data = [];
        $books = static::all();

        foreach($books as $item){
            $data += [$item->id => $item->title];
        }

        return $data;
    }

    public static function getBook($id)
    {
        $data = static::where('id', $id)->first();

        return $data;
    }
   /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BookCategory::class);
    }
}
