<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ImageRequest;
use App\Models\Participant;

class ApiImageController extends Controller
{
    public function __invoke(ImageRequest $request, Participant $participant)
    {
        if ($participant->images()->count() >= 6) {
            return response(['msg', 'data maximal 6'], 200);
        }
        $data = $request->validated();
        if ($img = $request->file('img')) {
            $data['img'] = $img->storeAs('img_images', time(). '.' .$img->getClientOriginalExtension());
        }
        $participant->images()->create($data);
        return response(['msg' => 'data berhasil ditambahkan'], 200);
    }
}
