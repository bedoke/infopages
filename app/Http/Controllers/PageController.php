<?php

namespace Infopages\Http\Controllers;

use Infopages\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = \Infopages\Page::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->save();

        return redirect('/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Infopages\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Infopages\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('pages.edit', compact($page));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Infopages\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        # TODO more validation
        $updated = false;

        if( ! empty($request->title)) {
            $page->title = $request->title;
            $updated = true;
        }

        if( ! empty($request->description)) {
            $page->description = $request->description;
            $updated = true;
        }

        if($updated) {
            $page->save();
        }

        return redirect('/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Infopages\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/pages');
    }
}
