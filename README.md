# My Laravel Project
このプロジェクトで詰まった点は[ProbremAndSolution.md](https://github.com/YaCpotato/project_manager/blob/develop/ProblemAndSolution.md)に書いてあります。似たようなもの作られる際は参考にしてみてください
## Goals
複数人がGoogleアカウントでチームとしてログインし、カレンダーの予定を共有。新しいチームの予定を作成したいときに推奨日をハイライトする
## Tasks

### Auth
* Googleアカウントでのログイン実装

### API
* ProjectController.php CRUD実装
* TaskController.php CRUD実装

### View
* 共有カレンダーテンプレートの実装
* カレンダーインポートモーダルの実装

### テスト導入
* ProjectControllerTest.phpの実装
* TaskControllerTest.phpの実装
* ScheduleControllerTest.phpの実装
* GoogleCalendarControllerTest.phpの実装
