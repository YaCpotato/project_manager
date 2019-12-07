<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
    DB::table('projects')->truncate();

    // 初期データ用意（列名をキーとする連想配列）
    $projects = [
              ['name' => 'Project-1'],
              ['name' => 'Project-2'],
              ['name' => 'Project-3']
             ];

    // 登録
    foreach($projects as $project) {
      \App\Project::create($project);
    }
    }
}
