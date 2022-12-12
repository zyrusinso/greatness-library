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
        Book::create([
            "title" => "Northanger Abbey", "author" => "Austen, Jane", "category" => "1", "year" => 1814, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "War and Peace", "author" => "Tolstoy, Leo", "category" => "1", "year" => 1865, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Anna Karenina", "author" => "Tolstoy, Leo", "category" => "1", "year" => 1875, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Mrs. Dalloway", "author" => "Woolf, Virginia", "category" => "1", "year" => 1925, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "The Hours", "author" => "Cunnningham, Michael", "category" => "1", "year" => 1999, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Huckleberry Finn", "author" => "Twain, Mark", "category" => "1", "year" => 1865, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Bleak House", "author" => "Dickens, Charles", "category" => "1", "year" => 1870, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Tom Sawyer", "author" => "Twain, Mark", "category" => "1", "year" => 1862, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "A Room of One's Own", "author" => "Woolf, Virginia", "category" => "1", "year" => 1922, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Harry Potter", "author" => "Rowling, J.K.", "category" => "1", "year" => 2000, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "One Hundred Years of Solitude", "author" => "Marquez", "category" => "1", "year" => 1967, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Hamlet, Prince of Denmark", "author" => "Shakespeare", "category" => "1", "year" => 1603, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        Book::create([
            "title" => "Lord of the Rings", "author" => "Tolkien, J.R.", "category" => "1", "year" => 1937, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);

        BookCategory::create([
            "title" => "adventure"
        ]);
    }
}
