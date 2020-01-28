<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon; // 追加
use Illuminate\Support\Facades\DB; // 追加

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owners = [
            [
                'name' => 'test',
                'address'  => '福山市',
                'email'  => 'owner@gmail.com',
                'tel'  => '111',
                'description'  => '111',
                'password'  => bcrypt('000000'),
                'zipcode'  => '111',
                'picture_path'  => '111',
                'created_at'  => '111',
                'updated_at'  => '111',
            ],
            [
                'name' => '天寶一',
                'address'  => '福山市',
                'email'  => '222',
                'tel'  => '222',
                'description'  => '222',
                'password'  => '222',
                'zipcode'  => '222',
                'picture_path'  => '222',
                'created_at'  => '222',
                'updated_at'  => '',
            ],
            [
                'name' => '天寶一',
                'address'  => '福山市',
                'email'  => '333',
                'tel'  => '333',
                'description'  => '333',
                'password'  => '333',
                'zipcode'  => '333',
                'picture_path'  => '333',
                'created_at'  => '333',
                'updated_at'  => '333',
            ],
        ];

        DB::table('owners')->delete();

        foreach ($owners as $owner) {

            DB::table('owners')->insert([
                'name' => $owner['name'],
                'address' => $owner['address'],
                'email' => $owner['email'],
                'tel' => $owner['tel'],
                'description' => $owner['description'],
                'password' => $owner['password'],
                'zipcode' => $owner['zipcode'],
                'picture_path' => $owner['picture_path'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    }
}
}
