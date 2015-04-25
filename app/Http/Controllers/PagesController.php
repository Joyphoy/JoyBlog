<?php namespace App\Http\Controllers;

use App\Http\Requests;

class PagesController extends Controller {

    /**
     * Home page
     */
    public function home() {
        return view('pages.home');
    }

}
