<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $app_id
 * @property string $client_secret
 * @property string $client_id
 * @property App $app
 */
class SocialInfo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'social_info';

    /**
     * @var array
     */
    protected $fillable = ['client_secret', 'client_id', 'redirect'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function app()
    {
        return $this->belongsTo('App\App');
    }

    public $timestamps = false;

}
