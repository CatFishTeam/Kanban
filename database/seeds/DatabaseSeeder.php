<?php

use Illuminate\Database\Seeder;
use \App\Models\State;

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('TaskTableSeeder');

        $this->command->info('User task seeded!');
    }

}

class TaskTableSeeder extends Seeder {

    public function run()
    {
        State::create(['id' => 1, 'title' => 'To Do']);
        State::create(['id' => 2, 'title' => 'In Progress']);
        State::create(['id' => 3, 'title' => 'To Review']);
        State::create(['id' => 4, 'title' => 'Done']);
    }

}