<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Tuupola\Base58;

class Url extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'hash';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    protected $fillable = [
        'full_url'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->hash = $model->generateUniqueHash();
        });
    }

    private function generateUniqueHash()
    {
        $hashFound = false;
        $base58 = new Base58;
        
        while ($hashFound == false)
        {
            $encoded = $base58->encode((string)rand() . $this->url);
            $hash = substr($encoded, 0, 7);

            if (Url::find($hash) == null) {
                $hashFound = true;
            }
        }

        return $hash;
    }
}
