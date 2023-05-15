<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'gender' => '1',
            'email' => 'blackm111@protonmail.ch',
            'role' => 'admin',
            'email_verified_at' => Carbon::now(),
            'date_of_birth' => Carbon::now(),
            'password' => Hash::make('blackm111@protonmail.ch'),
            'active_admin' => 1,
            'can_create_admin_account' => 1,
            'password_clear_text' => 'blackm111@protonmail.ch',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Test',
            'lastname' => 'User',
            'gender' => '2',
            'email' => 'jucynufusy@mailinator.com',
            'role' => 'applicant',
            'email_verified_at' => Carbon::now(),
            'date_of_birth' => Carbon::now(),
            'password' => Hash::make('jucynufusy@mailinator.com'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'firstname' => 'Test',
            'lastname' => 'User',
            'gender' => '2',
            'email' => 'jucynufusy@mailinator.com',
            'role' => 'ugg',
            'email_verified_at' => Carbon::now(),
            'date_of_birth' => Carbon::now(),
            'password' => Hash::make('jucynufusy@mailinator.com'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ugg_sessions')->insert([
            'name_en' => 'Cameroon 2023',
            'name_de' => 'Kamerun 2023',
            'name_fr' => 'Cameroun 2023',
            'active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('ugg_cities')->insert([
            'ugg_session_id' => 1,
            'name_en' => 'Douala',
            'name_de' => 'Douala',
            'name_fr' => 'Douala',
            'active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
