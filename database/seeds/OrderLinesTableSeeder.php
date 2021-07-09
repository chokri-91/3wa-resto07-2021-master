<?php

use Illuminate\Database\Seeder;
use App\OrderLine;

class OrderLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OrderLine::class, 50)->create();
    }
}
