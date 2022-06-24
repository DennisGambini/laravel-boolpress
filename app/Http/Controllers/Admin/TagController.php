<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    protected $tagValidation = [
        'name' => 'required|max:70'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->tagValidation);

        $data = $request->all();
        $newTag = new Tag();

        $newTag->name = $data['name'];
        $slug = Str::of($data['name'])->slug('-');
        $k = 1;
        while (Tag::where('name', $slug)->first()){
            $slug = Str::of($data['name'])."-{$k}";
            $k++;
        }
        $newTag->slug = $slug;

        $newTag->save();

        return redirect()->route('admin.tags.show', $newTag->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->tagValidation);
        $tag = Tag::findOrFail($id);

        $data = $request->all();

        if ($tag->name != $data['name']){

            $tag->name = $data['name'];

            $slug = Str::of($data['name'])->slug('-');
            $k = 1;
            while (Tag::where('name', $slug)->first()){
                $slug = Str::of($data['name'])."-{$k}";
                $k++;
            }
            $tag->slug = $slug;
        }

        $tag->update();

        return redirect()->route('admin.tags.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }
}
