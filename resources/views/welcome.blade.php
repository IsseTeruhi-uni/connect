<!DOCTYPE html> <html lang="en"> <head>
<meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Welcome to Edu-GPT
</title>
<style> body { min-height: 100vh; display: flex; justify-content: center; align-items: center; background:
    linear-gradient(to right, #3498db, #8e44ad); margin: 0; } .container { width: 100%; text-align: center; } .content {
    background: white; padding: 20px; border: 2px solid mint; text-align: center; max-width: 800px; margin: 0 auto; }
    .content h1 { font-size: 26px; font-weight: bold; color: black; margin-bottom: 16px; } .content p { font-size: 18px;
    font-weight: bold; color: black; margin-bottom: 16px; } @media (max-width: 768px) { .content { padding: 10px; }
    .content h1 { font-size: 20px; } .content p { font-size: 16px; } } .login-box { position: absolute; top: 95%; left:
    50%; transform: translate(-50%, -50%); width: 300px; height: 50px; background: #3498db; /* blue */ box-shadow: 0px
    4px 6px rgba(0, 0, 0, 0.1); border: 2px solid #8e44ad; /* blue */ border-radius: 12px; color: #fff; } .login-box a
    { font-size: 20px; background-color: #FF69B4; /* blue */ padding: 10px 20px; border-radius: 8px; } </style>
    </head>

    <body>
        <div class="container">
            <div class="content">
                <h1>ようこそ👏採点補助サービスEdu-GPTに,,,</h1>
                <p>Team: CONNECT <br>
                (Data Engineer Catapult Phase02_Fianl Project)</p>
            </div>
            <div class="content">
                <h1>制作物説明概要</h1>
                <p>教育現場において教師の負担を軽減し、生徒の演習機会を増やすためのシステム<br>
                このシステムは、生徒の回答を自動的に採点し、さまざまな項目を評価して個別のカスタマイズされた学習を可能にし、コストを削減し、教師の時間を節約し、教育格差を縮小し、学習者のパフォーマンスを評価し向上させるのに役立ちます。</p>
            </div>
            <div class="content">
                <h1>使用方法</h1>
                <p>教育現場において教師の負担を軽減し、生徒の演習機会を増やすためのシステム<br>
                ユーザーが質問と生徒の回答をシステムに入力すると、システムは自動的に回答を採点し、入力された採点基準に基づいて評価します。その後、生徒にフィードバックを提供し、改善策をサポートし、さらに学習すべき領域についてのフィードバックを提供します。</p>
            </div>

            <div class="login-box">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover-text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover-text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover-text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </body>

    </html>