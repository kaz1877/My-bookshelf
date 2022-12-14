<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            $upload_url = Cloudinary::upload($request->image->getRealPath())->getSecurePath();
            $book->url = $upload_url;
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
            $upload_url = Cloudinary::upload($request->image->getRealPath())->getSecurePath();
            $book->url = $upload_url;
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
            // ?????????????????????????????????URL?????????????????????
            $title = urlencode($request->keyword);
            // API???????????????URL?????????
            $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&maxResults=20';
            $client = new Client();
            // GET????????????????????????
            $response = $client->request("GET", $url);
            $body = $response->getBody();
            // ??????????????????JSON??????????????????????????????
            $bodyArray = json_decode($body, true);
            // ???????????????????????????
            $items = $bodyArray['items'];
        }
        return view('books.search', compact('items','keyword'));
    }

}
