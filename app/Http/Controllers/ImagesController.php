<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload', [
            "data" => [
                ["id" => 1, "name" => "Omar"],
                ["id" => 2, "name" => "Omar"],
                ["id" => 3, "name" => "Omar"],
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);

        if ($request->img) {
            // $file = $request->file('img');
            // $imageData = file_get_contents($file);
            // $base64Image = base64_encode($imageData);

            $image = new Image();
            $image->image = $request->img;
            $image->save();

            return response()->json(["img" => $request->img], 200);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
