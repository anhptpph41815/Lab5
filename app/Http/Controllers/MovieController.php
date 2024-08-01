<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Movie::orderByDesc('id')->paginate(8);
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('poster');
        $data['poster'] = "";
        if ($request->hasFile('poster')) {
            //Upload file
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }
        Movie::create($data);
        return redirect()->route('index')->with('message', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     
        $movie = Movie::findorFail($id);
        return view('show', compact('movie'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        $genre = Genre::all();
        return view('edit', compact('movie', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::query()->findOrFail($id);
        $data = $request->except('poster');
        if ($request->hasFile('poster')) {
            //Upload file
            $data['poster'] = Storage::put('poster', $request->poster);
        }
        $currentImage = $movie->poster;
        $movie->update($data);
        // if (isset($path_poster)) {
        //     if (file_exists('storage/' . $old_poster)) {
        //         unlink('storage/' . $old_poster);
        //     }
        // }
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::query()->findOrFail($id);
        $movie->delete($id);
        return redirect()->route('index')->with('message', 'Xóa thành công');
    }
    public function search(Request $request){
     $data =   Movie::query()->where('title', 'LIKE', '%'.$request->input('search').'%')->paginate(8);

        return view('index', compact('data'));
    }
}
