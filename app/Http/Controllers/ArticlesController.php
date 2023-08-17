<?php

namespace App\Http\Controllers;

use App\Models\articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::all();
        return view('article.create', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article$articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required',
            'description'=> 'required',
            'prix'=> 'required',
            'dateDeDebut' => 'required',
            'dateDeFin' => 'required'
        ]);


        $article = new articles([
            'titre' => $request->get('titre'),
            'description' => $request->get('description'),
            'prix' => $request->get('prix'),
            'dateDeDebut' => $request->get('dateDeDebut'),
            'dateDeFin' => $request->get('dateDeFin')
        ]);


        $article->save();
        return redirect('/')->with('success', 'article$articles Ajouté avec succès');

    }

    /**
     * Display the specified resource.
     */
    public function show(articles $articles)
    {
        $article = articles::findOrFail();
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, articles $articles)
    {
        $request->validate([
            'titre'=>'required',
            'description'=> 'required',
            'prix'=> 'required',
            'dateDeDebut' => 'required',
            'dateDeFin' => 'required'
        ]);




        $articles = $articles::findOrFail();

        $articles->titre = $request->get('titre');
        $articles->description = $request->get('description');
        $articles->prix = $request->get('prix');
        $articles->dateDeDebut = $request->get('dateDeDebut');
        $articles->dateDeFin = $request->get('dateDeFin');



        $articles->update();

        return redirect('/')->with('success', 'article$articles Modifié avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(articles $articles)
    {

        $article = $articles::findOrFail();
        $article->delete();

        return redirect('/')->with('success', 'article$article Supprime avec succès');

    }
}
