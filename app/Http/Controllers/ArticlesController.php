<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function index(){

        if(request('tag')){
            $articles = Tag::where('name', request('tag'))->firstorfail()->articles;

        } else {

            //render a list of a resource.
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);

    }





    public function show(Article $article){
    //show a single resource


            return view('articles.show', ['article' => $article]);



    }
    public function create(){
        return view('articles.create');
    }

    public function store(){

        Article::create($this->ValidateArticle());

        return redirect(route('articles.index'));
    }

    public function edit(Article $article){



        return view('articles.edit', compact('article'));


    }

    public function update(Article $article){

        $article->update($this->ValidateArticle());

        return redirect($article -> path());

    }

    public function destroy(){

    }

    /**
     * @return array
     */
    public function ValidateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'

        ]);
    }



}
