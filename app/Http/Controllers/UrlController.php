<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis; 
use App\Http\Requests\CreateUrlRequest;
use App\Models\Url;

class UrlController extends Controller
{
    /**
     * Create a new short url.
     *
     * @param  CreateUrlRequest $request
     * @return \Illuminate\View\View
     */
    public function create(CreateUrlRequest $request)
    {
        $data = $request->validated();
        $fullUrl = $data['long_url'];

        $url = Url::create([
            'full_url' => $fullUrl
        ]);

        $shortUrl = url('/'.$url->hash);

        return view('success', ['shortUrl' => $shortUrl]);
    }

    /**
     * Redirect to a url
     * 
     * @param Url $url
     * @return RedirectResponse
     */
    public function show(string $url)
    {
        if ($fullUrl = Redis::get('url:'.$url)) {
            return redirect($fullUrl, 302, ['X-Redis-Cache' => 'HIT']);
        }

        $url = Url::findOrFail($url);
        Redis::set('url:'.$url->hash, $url->full_url);

        return redirect($url->full_url, 302, ['X-Redis-Cache' => 'MISS']);
    }
}
