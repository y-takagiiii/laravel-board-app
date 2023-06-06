<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Response;

class ChatgptController extends Controller
{
    public function getResponse(Request $request) {
        $inputText = $request->title;
        if($inputText !== null) {
            $responseText = trim($this->generateResponse($inputText));
            return Response::json($responseText);
        }
    }

    public function generateResponse($inputText) {
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => '「'.$inputText.'」という懺悔に対して神父っぽく100字以内で赦しをください',
            'temperature' => 1,
            'max_tokens' => 200,
        ]);
        return $result['choices'][0]['text'];
    }
}
