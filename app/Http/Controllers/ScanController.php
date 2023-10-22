<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Validator;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->view('scan.index');
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
        $validator = Validator::make($request->all(), [
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
            'result' => 'max:255'
        ]);
        if ($request->hasFile('image')) {
            $client = new ImageAnnotatorClient([
                'credentials' => config_path('vision_api_key.json')]
            );
            $response = $client->textDetection(file_get_contents('storage/test.png'));
            $annotations = $response->getTextAnnotations();
            $description = str_replace('"""', '', $annotations[0]->getDescription());
            if (!is_null($response->getError())) {
                $result = '読み込みに失敗しました。もう一度お試しください';
            } else {
                $result = $description;
            }
            return redirect()->route('scan.show', $result);
            //return redirect->route('assist.create', compact('answer', 'result'));
            // $annotations = $response->getTextAnnotations();
            // $description = str_replace('"""', '', $annotations[0]->getDescription());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $content)
    {
        return response()->view('scan.show', compact('content'));
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
