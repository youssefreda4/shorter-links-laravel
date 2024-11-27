<?php

namespace App\Http\Controllers;

use App\Models\ShorterLink;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ShorterLinkRequest;

class ShorterLinkController extends Controller
{
    public function index()
    {
        $shortlinks = ShorterLink::paginate(5);
        return view('shorterlink', compact('shortlinks'));
    }

    public function store(ShorterLinkRequest $request)
    {

        $data['link'] = $request->link;
        $data['code'] = Str::random(6);
        ShorterLink::create($data);
        return redirect()->route('home')->with('success', 'link stored successfully');
    }

    public function show($code)
    {
        $row = ShorterLink::where('code', $code)->firstOrFail();
        $row->visit_count += 1;
        $row->save();
        return redirect($row->link);
    }
}
