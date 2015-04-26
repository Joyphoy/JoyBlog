<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

        $this->middleware('authorize', ['only' => ['edit', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $this->createArticle($request);

        flash()->success('Article created successfully.');

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Article $article
     * @param UpdateArticleRequest $request
     * @return Response
     */
    public function update(Article $article, UpdateArticleRequest $request)
    {
        $this->updateArticle($article, $request);

        flash()->success('Article updated successfully.');

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        flash()->success('Article deleted successfully.');

        return redirect('articles');
    }

    /**
     * Sync tags for an article in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags = null)
    {
        if (count($tags))
        {
            $article->tags()->sync($tags);
        }
        else
        {
            $article->tags()->detach();
        }
    }

    /**
     * Create a new article.
     *
     * @param CreateArticleRequest $request
     * @return Article
     */
    private function createArticle(CreateArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

    /**
     * Update an existing article.
     *
     * @param Article $article
     * @param UpdateArticleRequest $request
     * @return Article
     */
    private function updateArticle(Article $article, UpdateArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
