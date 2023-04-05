<?php

use Illuminate\Database\Seeder;
use App\RoomType;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create(['name' => 'Normal Room']);
		RoomType::create(['name' => 'Emergency Room']);
		RoomType::create(['name' => 'ICU']);
		RoomType::create(['name' => 'Operation Room']);
    }
}
