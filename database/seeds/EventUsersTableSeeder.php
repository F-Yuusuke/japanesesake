<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;

class EventUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en');

        $user = User::first();

        $events = Event::inRandomOrder()->limit(2)->get();

        DB::table('event_users')->delete();

        foreach ($events as $event) {
            DB::table('event_users')->insert([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'people_count' => $faker->numberBetween(1, 10),
                'special_comment' => $faker->text(150),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
        }
    }
}
