<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index()
    {
        return view('backend.author.index', ['authors' => Author::all()]);
    }

    public function search(Request $request)
    {
        $year_of_birth_start = $request->year_of_birth_start ?? '1900-1-1';
        $year_of_birth_end = $request->year_of_birth_end ?? now();

        $authors = Author::where('name', 'LIKE', "%$request->name%")->whereBetween('year_of_birth', [$year_of_birth_start, $year_of_birth_end])->get();

        return view('backend.author.index', compact('authors', 'request'));
    }

    public function create()
    {
        return view('backend.author.create');
    }

    public function store(Request $request)
    {
        $author = new Author();
        $author->fill($request->all());

        if ($request->hasFile('image')) {
            $fileExtension = $request->image->getClientOriginalExtension();
            $fileName = hexdec(uniqid('', false));

            $author->image = "$fileName.$fileExtension";

            $request->file('image')->storeAs('public/images/author', $author->image);
        }

        $author->save();

        return redirect()->route('author.create')->with('success', 'Thêm tác giả thành công!');
    }

    public function edit($id)
    {
        return view('backend.author.edit', ['author' => Author::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::findOrFail($id);

        if ($request->hasFile('image')) {
            if (!empty($author->image) && Storage::exists('public/images/author/' . $author->image)) {
                Storage::delete('public/images/author/' . $author->image);
            }

            $fileExtension = Str::lower($request->image->getClientOriginalExtension());
            $fileName = hexdec(uniqid('', false));

            $author->fill($request->all());
            $author->image = "$fileName.$fileExtension";

            $request->file('image')->storeAs('public/images/author', $author->image);
        } else {
            $author->fill($request->all());
        }

        $author->save();

        return redirect()->route('author.edit', $id)->with('success', 'Cập nhật tác giả thành công!');
    }

    public function delete($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        if (!empty($author->image) && Storage::exists('public/images/author/' . $author->image)) {
            Storage::delete('public/images/author/' . $author->image);
        }

        return redirect()->back()->with('success', 'Xoá tác giả thành công!');
    }
}
