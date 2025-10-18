<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function __construct(protected UrlService $urlService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('urls.index', [
            'urls' => $user->urls()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('urls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $urlData = $request->validate([
            'title' => ['nullable', 'required', 'string', 'max:255'],
            'destination_url' => ['required', 'url'],
            'domain' => ['required', 'string'],
            'back_half' => ['nullable', 'unique:urls', 'string', 'max:255'],
        ]);

        if (empty($urlData['back_half'])) {
            $urlData['back_half'] = $this->urlService->generateBackHalf();
        }

        $urlData['user_id'] = Auth::id();

        Url::create($urlData);

        return redirect()->route('urls.index')->with('success', 'Shorten URL created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('urls.view', [
            'url' => Url::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('urls.edit', [
            'url' => Url::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        $urlData = $request->validate([
            'id' => ['required', 'exists:urls'],
            'title' => ['nullable', 'required', 'string', 'max:255'],
        ]);

        $url = Url::find($urlData['id']);
        $url->title = $urlData['title'];

        $url->save();

        return redirect()->route('urls.index')->with('success', 'Shorten URL updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $url = Url::find($id);
 
        $url->delete();

        return redirect()->route('urls.index')->with('success', 'Shorten URL deleted successfully.');
    }
}
