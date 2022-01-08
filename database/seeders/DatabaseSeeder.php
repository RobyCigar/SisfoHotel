<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Room, Transaction, Customer, User};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        // Customer::factory(3)->create()->each(function ($customer) {
        //     Room::factory(rand(1, 3))->create()->each(function ($room) use ($customer) {
        //         Transaction::factory(rand(1, 3))->create([
        //             'customer_id' => $customer->id,
        //             'room_id' => $room->id,
        //             'total_price' => $room->price,
        //             'payment_status' => rand(1, 4),
        //         ]);
        //     });
        // });
    }
}
