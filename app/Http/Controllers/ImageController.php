<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\Image;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //Middleware para los roles
    public function __construct()
    {
        $this->middleware('CheckNormalRole');
    }


    public function index2(Estate $estate)
    {
        return view('images.index', [
            'estate' => $estate,
            'images' => Image::where('images.estate_id', '=', $estate->id)->get()
        ]);
    }


    public function create2(Estate $estate)
    {
        return view('images.create', [
            'estate' => $estate,
            'images' => Image::all()
        ]);
    }

    public function store2(Request $request, Estate $estate, Image $image)
    {
        /* $request->validate([
            'url' => 'required|image|max:3072'
        ]);
        $img = $request->file('url')->store('public/img');
        //Ejecutar php artisan storage:link
        $url = Storage::url($img);

        Image::create([
            'url' => $url,
            'estate_id' => $estate->id
        ]); */
        $request->validate([
            'url' => 'required|image|max:3072'
        ]);

        if (Image::where('images.estate_id', '=', $estate->id)->count() >= 10) {
            return redirect()->route('images.index2', $estate->id)->with('status', 'No pueden añadirse más de 10 imágenes.');
        } elseif (Image::where('images.estate_id', '=', $estate->id)->count() < 10) {
            //$url = $request->file('url')->storeOnCloudinary()->getSecurePath();

            $url = cloudinary()->upload($request->file('url')->getRealPath(), [
                'folder' => 'inmodata',
                'transformation' => [
                    'width' => 1280,
                    'height' => 720,
                ]
            ])->getSecurePath();
            $urlWeb = cloudinary()->upload($request->file('url')->getRealPath(), [
                'folder' => 'inmodata/web',
                'transformation' => [
                    'width' => 600,
                    'height' => 800,
                    'crop' => 'fill'
                ]
            ])->getSecurePath();
            //dd($resizedImage);

            //$request->file('url')->store('inmodata', 'cloudinary');

            Image::create([
                'url' => $url,
                'urlWeb' => $urlWeb,
                'estate_id' => $estate->id
            ]);

            return redirect()->route('images.index2', $estate->id)->with('status', 'Imagen añadida con éxito.');
        }
    }

    public function setMainImage(Image $image, Estate $estate)
    {
        $estate->estate_image = $image->url;
        $estate->estate_image_url = $image->urlWeb;
        $estate->save();
        return redirect()->route('images.index2', $estate->id)->with('status', 'Imagen principal añadida con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image, Estate $estate, Request $request)
    {
        /* $url = str_replace('storage', 'public', $image->url);
        Storage::delete($url); */
        if ($estate->images->count() == 1) {
            return redirect()->back()->with('status', 'Las propiedades no pueden quedarse sin imágenes.');
        } elseif ($estate->images->count() > 1) {
            $image->delete();
            return redirect()->back()->with('status', 'Imágen eliminada con éxito.');
        }
    }
}
