<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index(Request $request){
        $data = [];
        $items = null;
        $keyword = $request->keyword;
        if (!empty($keyword))
        {
            // 日本語で検索するためにURLエンコードする
            $title = urlencode($request->keyword);
            // APIを発行するURLを生成
            $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&maxResults=10';
            $client = new Client();
            // GETでリクエスト実行
            $response = $client->request("GET", $url);
            $body = $response->getBody();
            // レスポンスのJSON形式を連想配列に変換
            $bodyArray = json_decode($body, true);
            // 書籍情報部分を取得
            $items = $bodyArray['items'];
        }
        // $data = [
        //     'items' => $items,
        //     'keyword' => $request->keyword,
        // ];

        return view('api', compact('items','keyword'));
    }

    public function apiCreate(Request $request){
        //apiからの情報をcreateに渡す
        $title = $request->input('title');
        $author = $request->input('author');
        $url = $request->input('url');
        return view('create',compact('title','author','url'));
    }
}
