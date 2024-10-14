<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Post::with('user','kategori'))
            ->addColumn('img', function ($row) {
                if ($row->img) {
                    return '<img src="' . asset('storage/' . $row->img) . '" width="50" height="50" title="Image">';
                }
                return 'No Logo';
            })
            ->addColumn('action', function ($row) {
                $btn = "<a href='/post/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-pencil-square'></i></a>";
                // $btn .= "<a href='/post/" . $row->id . "' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-eye'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','img'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kategori'] = Kategori::all();
        $data['user'] = User::all();
        
        return view('post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            'content' => 'required',
            'status' => 'required',
            'kategori_id' => 'required',
            'created_by' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('img-post', 'public');
        }

        Post::create($data);

        return redirect(route('post.index'))->with('message','Post berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['post'] = Post::findOrFail($id);
        $data['kategori'] = Kategori::all();
        $data['user'] = User::all();

        return view('post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = post::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('img')) {
            if ($post->img) {
                Storage::disk('public')->delete($post->img);
            }
            $data['img'] = $request->file('img')->store('img-post', 'public');
        }

        $post->update($data);

        return redirect(route('post.index'))->with('message', 'Post berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        if ($post->img) {
            Storage::disk('public')->delete($post->img);
        }

        return $post->delete();
    }
}
