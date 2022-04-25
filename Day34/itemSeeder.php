<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Item::factory()->count(100)->create();
    }
}
