<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           // テーブルのクリア
    DB::table('tasks')->truncate();

    // 初期データ用意（列名をキーとする連想配列）
    $tasks = [
                [
                    'name' => 'Task-1',
                    'project_id' => 0,
                    'deadline' => '2020-02-15'
                ],
                [
                    'name' => 'Task-2',
                    'project_id' => 1,
                    'deadline' => '2020-02-17'
                ],
                [
                    'name' => 'Task-3',
                    'project_id' => 1,
                    'deadline' => '2020-02-15'
            
                ],
                [
                    'name' => 'Task-4',
                    'project_id' => 2,
                    'deadline' => '2020-02-19'
            
                ],
             ];

    // 登録
    foreach($tasks as $task) {
      \App\Task::create($task);
    }
    }
}
