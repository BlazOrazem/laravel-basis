<?php

namespace Numencode\Models;

use Laraplus\Data\Translatable;
use Numencode\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Numencode\Models\Traits\HiddenFilter;

class Page extends Model
{
    use Translatable, Sortable, HiddenFilter;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'layout', 'title', 'lead', 'body', 'ord', 'is_hidden'];

    /**
     * The attributes that are dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Page belongs to url.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function url()
    {
        return $this->belongsTo(Url::class, 'route_id');
    }

    /**
     * Page has many contents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Merge general and page contents, sort the collection by order and return.
     *
     * @return mixed
     */
    public function getContents()
    {
        $generalContents = Content::whereNull('page_id')->get();

        return $generalContents->merge($this->contents()->get())->sortBy('ord');
    }
}
