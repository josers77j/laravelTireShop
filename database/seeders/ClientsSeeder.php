<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'id' => 1,
                'name' => 'Generico',
                'phone' => '00000000',
                'email' => 'generico@generico.com'
            ],
        ];
        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
