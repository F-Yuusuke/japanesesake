<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $events = [
            [
                'name' => '蔵 tour',
                'description'  => 'you can enjoy the process sake making ....',
                'date' => '2020-01-29 17:00:00',
                'place' => 'abc酒蔵',
                'price' => '1000',
                'picture_path' => 'aaaaaaa',
                'owner_id' => '3',
            ],
            [
                'name' => '蔵 concert',
                'description'  => 'you can enjoy beautiful music at ....',
                'date' => '2020-02-15 18:00:00',
                'place' => 'efg酒蔵',
                'price' => '2000',
                'picture_path' => 'bbbbbbb',
                'owner_id' => '5',
            ],
            [
                'name' => '広島 concert',
                'description'  => 'you can enjoy beautiful music at ....',
                'date' => '2020-02-15 18:00:00',
                'place' => 'efg酒蔵',
                'price' => '2000',
                'picture_path' => 'bbbbbbb',
                'owner_id' => '5',
            ],
            
        ];

        foreach ($events as $event) {

            DB::table('events')->insert([
                'name' => $event['name'],
                'description' => $event['description'],
                'date' => $event['date'],
                'place' => $event['place'],
                'price' => $event['price'],
                'picture_path' => $event['picture_path'],
                'owner_id' => $event['owner_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
