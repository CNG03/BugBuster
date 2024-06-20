<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Database\Factories\TicketHistoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TicketHistoryFactory::factory(1)->create();
    }
}
