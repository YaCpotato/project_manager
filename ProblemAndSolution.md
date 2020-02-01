### 1. 久しぶりすぎてartisanの基本的な操作方法やEloquentの記述方法忘れた
* [Laravel入門 - 使い方チュートリアル -](https://qiita.com/sano1202/items/6021856b70e4f8d3dc3d)
* [【Laravel】サービスクラス作成手順](https://daiki-sekiguchi.com/2018/08/31/laravel-how-to-make-service-class/)
* [Laravelのカラム作成で使えるデータ型](https://qiita.com/Otake_M/items/3c761e1a5e65b04c6c0e)
ここから公式ドキュメントに飛ぶのが良い

### 2. 外部キー設定でmigration全然通らなかった。これが原因でLaravel諦めかけたこともある
* [【メモ】【Laravel】外部キー制約付きMigrateがさっぱり動かないときのチェック・ポイント（Mysql）](https://qiita.com/0w0/items/4a9cb7d27794bfb93d46)
ちなみにLaravel5.8のmake migrationコマンドで自動で生成するidはbigIncrementだから外部キーでそのidを指定したいときはbigIntegerフィールドで作成する。  
あとテーブル定義と外部キーのリレーション記述のアローは別にしないと怒られる  

### 3. Laravelで(自分の)Google Calendarから情報取得したいとき
これにそえば間違いなし！  
https://reffect.co.jp/laravel/google-calendar-operate-by-laravel#spatielaravel-google-calendar  


こっちもいずれ見たい  
https://blog.capilano-fw.com/?p=5365#i-4  
### 4. migrationファイルは単数形で書いているのにデータベースのテーブル名が勝手に複数形になった！
https://teratail.com/questions/51008  
ここ参考に。make Modelで作成したModel/(外部キーのhasManyでも書いてた)の中の該当のソースファイルに`protected $table = 'schedule';`みたいにかけば解決した。
```php=
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function assignees()
    {
        return $this->hasMany('App\User');
    }
}

```


