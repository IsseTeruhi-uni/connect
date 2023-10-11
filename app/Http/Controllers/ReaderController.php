<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReaderController extends Controller
{
    public function index() {

        return view('business_card.index');

    }

    public function extract(Request $request) {

        $client = new ImageAnnotatorClient();

        $image = $client->createImageObject(file_get_contents($request->image));
        // テストする場合は直接こちらから画像データを読み込んでください。
//        $image = $client->createImageObject(file_get_contents(public_path('/images/business_card_example.png')));

        $response = $client->textDetection($image);

        if(!is_null($response->getError())) {

            return ['result' => false];

        }

        $annotations = $response->getTextAnnotations();
        $description = str_replace('"""', '', $annotations[0]->getDescription());

        return [
            'result' => true,
            'text' => $description
        ];

    }
}