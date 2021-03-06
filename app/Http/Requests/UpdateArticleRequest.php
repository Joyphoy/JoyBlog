<?php namespace App\Http\Requests;

use App\Article;
use Illuminate\Support\Facades\Auth;

class UpdateArticleRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::id() === $this->route('articles')->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required'
        ];
    }

    /**
     * Get the response for a forbidden operation.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forbiddenResponse()
    {
        return $this->redirector->to('/');
    }

}
