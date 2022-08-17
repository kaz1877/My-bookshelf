<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class bookController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $select = $request ->sort;
        $query = Book::query();
        if(!empty($keyword)){
            $query->where('title','LIKE','%'.$keyword.'%')
                ->orWhere('author','LIKE','%'.$keyword.'%')
                ->orwhere('publisher','LIKE','%'.$keyword.'%');
        }
        switch($select){
            case '1':
                $books = $query->latest()->get();
                break;
            case '2':
                $books = $query->orderBy('created_at','asc')->get();
                break;
            case '3':
                $books = $query->orderBy('created_at','desc')->get();
                break;
            case '4':
                $books = $query->orderBy('type','asc')->get();
                break;
            default:
                $books = $query->get();
                break;
        }
        $context = ["books" => $books,"keyword"=>$keyword];
        return view('index',$context);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect(route("book.index"));
    }

    public function show($id)
    {
        $context = [];
        $context["books"] = Book::where("id",$id)->get();
        return view('show',$context);
    }

    public function edit($id)
    {
        $books = Book::where('id',$id)->get();
        $content = ['books'=>$books];
        return view('edit',$content);
    }

    public function update(Request $request, $id)
    {
        Book::find($id)->update($request->all());
        return redirect(route('book.index'));
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect(route('book.index'));
    }
}
