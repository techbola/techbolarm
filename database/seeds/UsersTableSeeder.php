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

        $user = \App\User::create([
           'name' => 'Adebola',
           'email' => 'techbola@gmail.com',
           'password' => bcrypt('techbola'),
        ]);

        $user->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'Lagos, Nigeria'
        ]);

        $user->restaurants()->create([
            'name' => 'Mama Buka',
            'location' => 'Lagos, Nigeria'
        ]);

        $user->restaurants()->create([
            'name' => 'FingerLicking',
            'location' => 'Lagos, Nigeria'
        ]);

        $user->restaurants()->create([
            'name' => 'Iya Amala',
            'location' => 'Lagos, Nigeria'
        ]);

    }
}
