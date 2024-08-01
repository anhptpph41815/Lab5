<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name'=> 'Hành động']);
        Genre::create(['name'=> 'Tình cảm']);
        Genre::create(['name'=> 'Khoa học viễn tưởng']);
        Genre::create(['name'=> 'Trinh thám']);
    }
}
