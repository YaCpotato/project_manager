# My Laravel Project
このプロジェクトで詰まった点は[ProbremAndSolution.md](https://github.com/YaCpotato/project_manager/blob/develop/ProblemAndSolution.md)に書いてあります。似たようなもの作られる際は参考にしてみてください
## Goals
複数人がGoogleアカウントでチームとしてログインし、カレンダーの予定を共有。新しいチームの予定を作成したいときに推奨日をハイライトする
## Tasks

### Auth
~~Googleアカウントでのログイン実装~~
→ログイン済みGoogleアカウントからのカレンダー取得

### View
* 共有カレンダーテンプレートの実装
* カレンダーインポートモーダルの実装
* ログインビューの調整
#### プロジェクト
* イメージ画像をアップロードできるようにする
#### タスク
* ガントチャートのレイアウトをガチる

### テスト導入
* ProjectControllerTest.phpの実装
* TaskControllerTest.phpの実装
* ScheduleControllerTest.phpの実装
* GoogleCalendarControllerTest.phpの実装
