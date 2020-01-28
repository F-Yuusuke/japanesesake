<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en');

        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => Carbon\Carbon::now(),
            'sex' => $faker->numberBetween(0, 1),
            'country_id' => $faker->numberBetween(1, 100),
            'birthday' => $faker->date('1991-02-02'),
            'blacklist' => $faker->numberBetween(0, 1),

        ]);
    }
}
