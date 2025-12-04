<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Yan Kadek Sutrisno',
                'email' => 'kadek@yahoo.id',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Mega Andriana',
                'email' => 'mega@yahoo.id',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Sulis Wahyuningsih',
                'email' => 'sulis@yahoo.id',
                'password' => Hash::make('123'),
            ],
        ];
        
        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']], // kondisi unik
                [
                    'name' => $data['name'],
                    'password' => Hash::make($data['password']),
                ]
            );
        }
    }
}
