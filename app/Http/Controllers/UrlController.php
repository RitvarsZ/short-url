<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use Illuminate\Http\RedirectResponse;
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

        $existingUrl = Url::firstWhere('full_url', $fullUrl);

        if ($existingUrl) {
            $url = $existingUrl;
        } else {
            $url = Url::create([
                'full_url' => $fullUrl
            ]);
        }

        $shortUrl = url('/'.$url->hash);

        return view('success', ['shortUrl' => $shortUrl]);
    }

    /**
     * Redirect to a url
     * 
     * @param Url $url
     * @return RedirectResponse
     */
    public function show(Url $url)
    {
        return redirect($url->full_url);
    }
}
