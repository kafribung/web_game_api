<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show(Participant $participant)
    {
        return view('backend.images', compact('participant'));
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete($image->img);
        $image->delete();
    }
}
