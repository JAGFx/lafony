<?php

namespace Database\Seeders;

use App\Models\Audio;
use Illuminate\Database\Seeder;

class AudioSeeder extends Seeder
{
    public function run(): void
    {
        Audio::factory()
            ->count(10)
            ->create();
    }
}
