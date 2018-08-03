<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $generator = new \RandomUser\Generator();
        $users = $generator->getUsers(5);

        DB::table('users')->insert(
            array(
                'name' => 'Administrator',
                'email' => 'test@test.com',
                'password' => bcrypt('secret')
            )
        );

        foreach ($users as $usr) {
            $id = DB::table('leads')->insertGetId(
                array(
                    'fname' => $usr->getFirstName(),
                    'lname' => $usr->getLastName(),
                    'email' => $usr->getEmail(),
                    'postal_code' => $usr->getZip()
                )
            );

            DB::table('phones')->insert(
                array(
                    'lead_id' => $id,
                    'phone_number' => $usr->getPhone()
                )
            );
        }
    }
}
