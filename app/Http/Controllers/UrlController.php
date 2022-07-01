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
