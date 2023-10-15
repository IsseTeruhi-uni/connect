<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Models\Assist;

class AssistController extends Controller
{
    public function index()
    {
        $assists = Assist::getAllOrderByCreated_at();
        return response()->view('assist.index', compact('assists'));
    }
    public function show($id)
    {
        $assist = Assist::find($id);
        return response()->view('assist.show', compact('assist'));
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
        $validator = Validator::make($request->all(), [
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            //$path=$request()->file('image')->store('images', 'public');
            $client = new ImageAnnotatorClient();
            $response = $client->textDetection($request->image);

            if (!is_null($response->getError())) {
                $result = '読み込みに失敗しました。もう一度お試しください';
            } else {
                $result = $response;
            }
            return view('assist.create', compact('answer', 'result'));
            // $annotations = $response->getTextAnnotations();
            // $description = str_replace('"""', '', $annotations[0]->getDescription());
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => 'required|max:255',
            'criterion' => 'required|max:255',
            'answer' => 'required|max:255',
            'result' => 'max:255'
        ]);
        if ($validator->fails()) {
            return redirect()
                ->route('assist.show')
                ->withInput()
                ->withErrors($validator);
        }
        // 文章
        $question = $request->input('question');
        $criterion = $request->input('criterion');
        $answer = $request->input('answer');
        $sentence = "質問内容:{$question}\n採点基準:{$criterion}\n回答内容:{$answer}";
        $chat_response = $this->chat_gpt("質問内容、採点基準、回答内容が提供されます。採点と添削を行い、日本語で応答してください", $sentence);
        $request['result'] = $chat_response;
        $result = $request->result;
        // ChatGPT API処理

        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $result = Assist::create($data);
        $id = $result->id;
        return redirect()->route('assist.show', $result->id);
        // sample code
        // $request->validate([
        //     'sentence' => 'required',
        // ]);

        // // 文章
        // $sentence = $request->input('sentence');

        // // TODO: ChatGPT API処理

        // return view('chat', compact('sentence'));
    }


    function chat_gpt($system, $user)
    {
        $url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $api_key = env('CHAT_GPT_KEY');

        // ヘッダー
        $headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "Bearer $api_key"
        );
        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $response = Http::withHeaders($headers)->post($url, $data);

        if ($response->json('error')) {
            // エラー
            return $response->json('error')['message'];
        }

        return $response->json('choices')[0]['message']['content'];
    }
}
