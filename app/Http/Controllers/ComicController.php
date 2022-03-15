<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Comic;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|string|between:5,100|unique:comics",
            'type' => ["required", Rule::in(['comic', 'novel'])],
            'price' => "required|numeric|min:0.5",
            'series' => "required|string",
            'description' => "required|string|min:10",
            'sale_date' => "required|date",
            'thumb' => "nullable|url",
        ]);

        $data = $request->all();


        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        if (!empty($data['thumb'])){
            $newComic->thumb = $data['thumb'];
        }

        $newComic->save();
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comic  $comic: comic with given id
     * @return \Illuminate\Http\Response:  HTTP response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Comic $comic: comic with given id
     * @return \Illuminate\Http\Response: HTTP response
     */
    public function update(Request $request, Comic $comic)
    {   
        $request->validate([
            'title' => "required|string|between:5,100|unique:comics,title,{$comic->id}",
            'type' => ["required", Rule::in(['comic', 'novel'])],
            'price' => "required|numeric|min:0.5",
            'series' => "required|string",
            'description' => "required|string|min:10",
            'sale_date' => "required|date",
            'thumb' => "nullable|url",
        ]);
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        if (!empty($data['thumb'])){
            $comic->thumb = $data['thumb'];
        }

        $comic->save();
        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comic  $comic: comic with given id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
