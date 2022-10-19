<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Name;

class VoteSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 100; $i++)
            User::all()->random()->votes()->sync([Name::all()->random()->id, Name::all()->random()->id, Name::all()->random()->id]);
    }
}
