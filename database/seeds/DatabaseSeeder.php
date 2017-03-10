<?php

use Illuminate\Database\Seeder;
use \App\Models\Task;

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
        DB::table('tasks')->delete();

        Task::create(['id' => '1', 'title' => 'To Do']);
        Task::create(['id' => '2', 'title' => 'In Progress']);
        Task::create(['id' => '3', 'title' => 'To Review']);
        Task::create(['id' => '4', 'title' => 'Done']);
    }

}