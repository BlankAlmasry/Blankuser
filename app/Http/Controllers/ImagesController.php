<?php

namespace App\Http\Controllers;

class ImagesController extends Controller
{
    //
    public function index()
    {

        $imageName = time().'.'.request()->floara->getClientOriginalExtension();
        request()->floara->move(public_path('images'), $imageName);
        return response()->json(["link" =>url()->to('/')."/images/".$imageName
]);


     }
}
