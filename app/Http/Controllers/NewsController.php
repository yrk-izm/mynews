<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追記
use App\Models\News;

class NewsController extends Controller
{
 public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        //                               ^^^^^^^^^^^^ updated_at カラムの降順でデータを取得している
        //                  ^^^^^^^^^^^^ sortByDesc() メソッドでデータの並びが降順の情報を取得している
        //       ^^^^^^^^^^^ news テーブルから News モデルを通して、全ての情報を取得 News::all() している

        if (count($posts) > 0) {
            // $posts に代入されているニュース記事の情報が、０件よりも多いとき
            $headline = $posts->shift();
            //          ^^^^^^^^^^^^^^^ $posts から１番初めの情報を取り出して
            //^^^^^^^ $headline に代入する
        } else {
            // $posts に代入されているニュース記事の情報が、０件よりも多いときじゃないとき
            // $posts が０件以下だったとき
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
