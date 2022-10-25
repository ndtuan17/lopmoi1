<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Center;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('admin.centers.index', compact('centers'));
    }
    public function create()
    {
        return view('admin.centers.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required',
            'avatar' => 'required|image',
            'fee_percent' => 'numeric|min:0|max:100|nullable'
        ]);
        $path = $request->file('avatar')->store('photos', ['disk' => 'mpublic']);
        $center = new Center([
            'name' => $request->name,
            'description' => $request->description,
            'fanpage' => $request->fanpage,
            'website' => $request->website,
            'fee_percent' => $request->fee_percent,
            'url_show_classes' => $request->url_show_classes,
            'avatar_path' => $path,
        ]);
        $center->save();
        return redirect()->route('admin.centers.index')->with('message', 'create center success');
    }
    public function show(Center $center)
    {
        return redirect()->route('admin.centers.index');
    }
    public function edit(Center $center)
    {
        return view('admin.centers.edit', compact('center'));
    }
    public function update(Request $request, Center $center)
    {
        $request->validate([
            'name' => 'string|nullable',
            'avatar' => 'image|nullable',
            'fee_percent' => 'numeric|min:0|max:100|nullable'
        ]);

        if ($request->file('avatar')) {
            File::delete(public_path($center->avatar_path));
            $path = $request->file('avatar')->store('photos', 'mpublic');
        }
        $center->update([
            'name' => $request->name ?? $center->name,
            'description' => $request->description ?? $center->description,
            'avatar_path' => $path ?? $center->avatar_path,
            'fanpage' => $request->fanpage ?? $center->fanpage,
            'website' => $request->website ?? $center->website,
            'fee_percent' => $request->fee_percent ?? $center->fee_percent,
            'url_show_classes' => $request->url_show_classes ?? $center->url_show_classes,
        ]);
        return redirect()->route('admin.centers.index')->with('message', 'update successfully!');
    }
    public function destroy(Center $center)
    {
        File::delete($center->avatar_path);
        $center->delete();
        return redirect()->route('admin.centers.index')->with('message', 'delete success!');
    }
}
