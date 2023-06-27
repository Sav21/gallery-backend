<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class GalleryService {

    public function showGalleries(Request $request)
    {
        $title = $request->input('title');

        if ($name) {
            $galleries = Gallery::search($name);
        } else {
            $galleries = Gallery::paginate(10);
        }

        return $galleries;
    }

    public function showGallery($id)
    {

        $gallery = Gallery::find($id);
        return $gallery;
    }

  public function postGallery(Request $request)
   {

    $request->validate([
      'name' => 'required|min:2|max:255',
      'description' => 'required|min:5|max:500',
      'urls' => 'required|url',
    //   'author_id' => 'required'
    ]);

    $gallery = new Gallery;

    $gallery->name = $request->name;
    $gallery->description = $request->description;
    $gallery->urls = $request->urls;

    if($request->author_id) {
      $Gallery->author_id = $request->author_id;
    }
    $Gallery->save();

    return $Gallery;
  }


//   public function createComment(Request $request) {
//     $request->validate([
//       'text' => 'required|min:1|max:255'
//     ]);

//     $comment = new Comment();
//     $comment->text = $request->text;
//     $comment->user_id = $request->user_id;
//     $comment->Gallery_id = $request->Gallery_id;
//     $comment->save();

//     return $comment;
//   }
}