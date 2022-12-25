<?php

namespace App\Casts;

use Illuminate\Support\Str;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Image implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     *
     * change image path with url when data get from database & model
     */
    public function get($model, string $key, $value, array $attributes)
    {
        //check value start with http
        if (Str::startsWith($value, 'http')) {
            return $value;
        }
        $images = json_decode($value);

        // https://www.example.com/image/
        $path   = request()->getSchemeAndHttpHost().'/image/';

        //check images file is array
        if ($images && is_array($images)) {
            $data = [];
            foreach ($images as $image) {
                if (!empty($image)) {
                    $data[] = $path . $image;
                }
            }
            return $data;
        }

        //have image
        if (!empty($value)) {
            return $path . $value;
        }

        //hvan't image
        return request()->getSchemeAndHttpHost() . '/logo/logo.png';
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
