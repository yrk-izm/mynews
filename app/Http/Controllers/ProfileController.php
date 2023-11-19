<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // 済1. Controllersディレクト直下にProfileControllerを新規で作成
        // 済2. index Action を作成し
        // 3. プロフィール情報を取得して
        // 済4. profile/index.blade.php というViewテンプレートに
        // 5. プロフィール情報を渡して描画するように実装してください
        
        // Profile １件だけ取得
        $profile = Profile::first();

        // ビューファイルにプロフィール情報を渡す
        return view('profile.index', ['profile' => $profile]);
    }
}
