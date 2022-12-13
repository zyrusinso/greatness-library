<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create(["title" => "Northanger Abbey", "author" => "Austen, Jane", "category" => "1", "year" => 1814, "isbn" => "9789715691871"]);
        Book::create(["title" => "War and Peace", "author" => "Tolstoy, Leo", "category" => "1", "year" => 1865, "isbn" => "88712637128737"]);
        Book::create(["title" => "Anna Karenina", "author" => "Tolstoy, Leo", "category" => "1", "year" => 1875, "isbn" => "10237809795823"]);

        BookCategory::create([
            "title" => "adventure"
        ]);
    }
}
