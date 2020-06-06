<?php

/**
 * @author   Panji Setya Nur Prawira
 */

namespace PanjiNamjaElf\Kaguya;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\PanjiNamjaElf\Kaguya\Setting whereValue($value)
 */
class Setting extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'string',
    ];
}
