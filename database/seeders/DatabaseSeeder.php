<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Room, Transaction, User};
use Illuminate\Support\Facades\{Hash, DB};
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'zenitsu',
            'email' => 'zenitsu@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('zenitsu'),
            'role' => 1,
            'remember_token' => Str::random(10),
        ]);

        User::factory(3)->create()->each(function ($user) {
            Room::factory(rand(1, 3))->create()->each(function ($room) use ($user) {
                Transaction::factory(rand(1, 3))->create([
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'check_in' => now()->addDays(rand(1, 10)),
                    'check_out' => now()->addDays(rand(11, 20)),
                    'total_price' => $room->price,
                    'payment_status' => rand(1, 4),
                ]);
            });
        });
    }
}
