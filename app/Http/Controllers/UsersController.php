<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return Response
     */
    public function index(User $user)
    {
        $articles = $user->articles()->latest('created_at')->paginate(5);

        return view('articles.index', compact('articles'));
    }

}
