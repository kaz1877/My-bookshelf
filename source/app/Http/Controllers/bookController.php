<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class bookController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $books = Book::where('user_id', \Auth::user()->id)->get();
        return view('books.index',compact('user','books'));
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');
        $url = $request->input('url');
        return view('books.create',compact('title','author','url'));
    }

    public function store(BookRequest $request,Book $book)
    {
        if($request->image){
            $dir ='images';
            //ファイル名を指定
            $file_name = $request->file('image')->getClientOriginalName();
            //ファイルパスを設定
            $file_path = 'storage/' . $dir .'/'. $file_name;
            //DBに保存
            $request -> file('image')-> storeAs('public/' . $dir,$file_name);
            $book->url = $file_path;
        }else{
            $book->url = $request->url;
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->content = $request ->content;
        $book->user_id = $request->user()->id;
        $book->save();
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
        $book = Book::find($id);
        if($request->image){
            $dir ='images';
            //ファイル名を指定
            $file_name = $request->file('image')->getClientOriginalName();
            //ファイルパスを設定
            $file_path = 'storage/' . $dir .'/'. $file_name;
            //DBに保存
            $request -> file('image')-> storeAs('public/' . $dir,$file_name);
            $book->url = $file_path;
        }else{
            $book->url = $request->url;
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->content = $request ->content;
        $book->user_id = $request->user()->id;
        $book->save();
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
        return view('books.search', compact('items','keyword'));
    }

}
