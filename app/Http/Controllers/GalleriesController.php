<?php

namespace App\Http\Controllers;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
        $this->middleware('auth:api');
    }


    public function index(Request $request)
    {
        $galleries = $this->galleryService->showGalleries($request);

        return $galleries;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $gallery = $this->galleryService->postGallery($request);

        return $movie;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = $this->galleryService->showGallery($id);
        return $gallery;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = $this->movieService->editMovie($request, $id);
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteMovie($id)
    {
        Movie::destroy($id);
    }
}
