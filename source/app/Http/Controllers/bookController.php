<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use GuzzleHttp\Client;

class bookController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $select = $request ->sort;
        $sortWord ="並び替え";
        $query = Book::query();
        if(!empty($keyword)){
            $query->where('title','LIKE','%'.$keyword.'%')
                ->orWhere('author','LIKE','%'.$keyword.'%')
                ->orWhere('publisher','LIKE','%'.$keyword.'%');
        }
        switch($select){
            case '1':
                $books = $query->orderBy('title','asc')->get();
                $sortWord ="タイトル";
                break;
            case '2':
                $books = $query->orderBy('publisher','asc')->get();
                $sortWord="著者：昇順";
                break;
            case '3':
                $books = $query->orderBy('publisher','desc')->get();
                $sortWord="著者：降順";
                break;
            default:
                $books = $query->get();
                break;
        }
        return view('books.index',compact('books','keyword','sortWord'));
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');
        $url = $request->input('url');
        return view('books.create',compact('title','author','url'));
    }

    public function store(BookRequest $request)
    {
        if($request->image){
            $dir ='images';
            //ファイル名を指定
            $file_name = $request->file('image')->getClientOriginalName();
            //ファイルパスを設定
            $file_path = 'storage/' . $dir .'/'. $file_name;
            $request -> file('image')-> storeAs('public/' . $dir,$file_name);
            //DBに保存
            Book::create([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'url' => $file_path,
                'type' => $request->input('type'),
                'content' => $request->input('content')
            ]);
        }else{
            Book::create($request->all());
        }
        return redirect(route("book.index"));
    }

    public function show($id)
    {
        $context = [];
        $context["books"] = Book::where("id",$id)->get();
        return view('books.show',$context);
    }

    public function edit($id)
    {
        $books = Book::where('id',$id)->get();
        return view('books.edit',compact('books'));
    }

    public function update(BookRequest $request, $id)
    {
        Book::find($id)->update($request->all());
        return redirect(route('book.index'));
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect(route('book.index'));
    }


    public function searchBooks(Request $request){
        $data = [];
        $items = null;
        $keyword = $request->keyword;
        if (!empty($keyword)){
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
        return view('books.api', compact('items','keyword'));
    }

}
