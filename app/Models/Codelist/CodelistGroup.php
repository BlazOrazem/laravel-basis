<?php

namespace Numencode\Models\Codelist;

use Numencode\Models\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;

class CodelistGroup extends Model
{
    use Sortable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'codelist_group';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'sort_order'];

    /**
     * Disable timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Codelist group has many items.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(CodelistItem::class);
    }
}
