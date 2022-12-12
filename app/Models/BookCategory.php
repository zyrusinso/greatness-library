<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getCategoryTitle($id)
    {
        $data = static::where('id', $id)->first();
        
        return $data->title;
    }

    public static function getAll(){
        $data = [];
        $categories = static::all();

        foreach($categories as $item){
            $data += [$item->id => $item->title];
        }

        return $data;
    }

    /**
     * Get all of the comments for the BookCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book()
    {
        return $this->hasMany(Book::class, 'category', 'id');
    }
}
