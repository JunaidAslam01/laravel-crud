<?php

namespace Database\Seeders;

use App\Models\Book;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();
        
        $books = [
            [
                'title' => 'The Great Gatsby',
                'description' => 'A classic novel by F. Scott Fitzgerald.',
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'description' => 'A Pulitzer Prize-winning novel by Harper Lee.',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
