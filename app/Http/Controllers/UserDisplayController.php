<?php

namespace App\Http\Controllers;
use App\Models\UserDisplay;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserDisplayController extends Controller
{
    //
    public function updateDisplayFlag(Request $request)
    {
        $user_id = $request->input('user_id');
        $display_flg = $request->input('display_flg');

        // 指定された属性に一致する最初のレコードを取得するか、存在しない場合は新しいレコードを作成して保存
        $userDisplay = UserDisplay::firstOrCreate(['user_id' => Auth::id(),]);
        $userDisplay->update(['display_flg' => $display_flg]);

        return response()->json(['success' => true]);
    }
}
