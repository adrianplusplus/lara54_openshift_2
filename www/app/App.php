<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property SocialInfo[] $socialInfos
 */
class App extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialInfos()
    {
        return $this->hasMany('App\SocialInfo');
    }

    public $timestamps = false;
}
