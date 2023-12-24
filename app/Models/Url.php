<?php

namespace App\Models;

use App\Classes\CodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'user_id'];

    public $timestamps = false;

    public function user()
    {
        return  $this->belongsTo(User::class);
    }

    public function short_url($long_url)
    {
        //crea la url
        $url = self::create([
            'url' => $long_url,
            'user_id' => auth()->user()->id
        ]);

        $code = (new CodeGenerator())->get_code($url->id);

        //actualziar el codigo de la $url

        $url->code = $code;
        $url->save();

        return $url->code;
    }
}
