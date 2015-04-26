<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Tag;

class TagsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::all(['name']);

        return view('tags.index', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag)
    {
        $articles = $tag->articles()->latest()->paginate(5);

        return view('articles.index', compact('articles'));
    }

}
