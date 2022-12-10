<?php

namespace Database\Seeders;

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
        DB::table('books')->insert([
            "title" => "Northanger Abbey", "author" => "Austen, Jane", "year" => 1814, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "War and Peace", "author" => "Tolstoy, Leo", "year" => 1865, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Anna Karenina", "author" => "Tolstoy, Leo", "year" => 1875, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Mrs. Dalloway", "author" => "Woolf, Virginia", "year" => 1925, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "The Hours", "author" => "Cunnningham, Michael", "year" => 1999, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Huckleberry Finn", "author" => "Twain, Mark", "year" => 1865, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Bleak House", "author" => "Dickens, Charles", "year" => 1870, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Tom Sawyer", "author" => "Twain, Mark", "year" => 1862, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "A Room of One's Own", "author" => "Woolf, Virginia", "year" => 1922, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Harry Potter", "author" => "Rowling, J.K.", "year" => 2000, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "One Hundred Years of Solitude", "author" => "Marquez", "year" => 1967, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Hamlet, Prince of Denmark", "author" => "Shakespeare", "year" => 1603, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
        DB::table('books')->insert([
            "title" => "Lord of the Rings", "author" => "Tolkien, J.R.", "year" => 1937, "avail_stock" => rand(4, 300), "total_stock" => 300
        ]);
    }
}
