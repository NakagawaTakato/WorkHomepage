<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * 管理画面で保存した値を、config/site.php の初期値に上書きして返す
     */
    public static function values()
    {
        return array_merge(
            config('site.settings'),
            static::pluck('value', 'key')->all()
        );
    }

    public static function put($key, $value)
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
