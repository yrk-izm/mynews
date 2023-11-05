<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function add()
    {
        return view('admin.news.create');
    }

    // 以下を追記
    public function create(Request $request)
    {
        $this->validate($request, News::$rules);

        $news = new News;
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $news->fill($form);
        // fill() メソッドでは、以下の処理をしているのと同じ
        // $news->title = $form['title'];
        // $news->body = $form['body'];
        $news->save();
        
        return redirect('admin/news/create');
    }
}