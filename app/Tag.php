<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the articles that have this tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

}
