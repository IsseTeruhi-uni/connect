<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Assist;

class AssistController extends Controller
{
    public function index() 
    {
        $assists=Assist::getAllOrderByCreated_at();
        return response()->view('assist.index',compact('assists'));
    }
    public function show() 
    {
        return response()->view('assist.show');
    }
    public function create() 
    {
        return response()->view('assist.create');
    }
    public function scan()
    {
        return response()->view('assist.scan');
    }
    public function ocr(Request $request)
    {
        $validator=Validator::make($request->all(),[
           'image'=>'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')){
            //$path=$request()->file('image')->store('images', 'public');
            $client = new ImageAnnotatorClient();
            $response = $client->textDetection($request->image);

            if(!is_null($response->getError())) {
              $result='読み込みに失敗しました。もう一度お試しください';
            }else{
             $result=$response;}
            return view('assist.create',compact('answer','result'));
            // $annotations = $response->getTextAnnotations();
            // $description = str_replace('"""', '', $annotations[0]->getDescription());
        }
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
           'question'=>'required|max:255',
           'criterion'=>'required|max:255',
              'answer'=>'required|max:255',
              'result'=>'required|max:255',
        ]);
        if ($validator->fails()) {
        return redirect()
          ->route('assist.show')
          ->withInput()
          ->withErrors($validator);
        }

    }


    public function extract(Request $request) {

        

        $image = $client->createImageObject(file_get_contents($request->image));
        // テストする場合は直接こちらから画像データを読み込んでください。
//        $image = $client->createImageObject(file_get_contents(public_path('/images/Assist_example.png')));

       

       
    }

}