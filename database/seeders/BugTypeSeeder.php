<?php

namespace Database\Seeders;

use App\Models\BugType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BugTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BugType::factory(10)->create();
    }
}
