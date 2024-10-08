<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Validator;
use App\Models\Config;
use App\Models\Device;
use App\Models\Summary;
class TextSummarizationController extends Controller
{
    // index
    public function index()
    {
        return view('pages.text-summarization.main');
    }

    // show
    public function show($id)
    {
        $summary = Summary::find($id);
        $text = $summary->text;
        $summarizedText = $summary->summary;

        return view('pages.text-summarization.main', compact('text','summarizedText', 'id'));
    }

    // summarize
    public function summarize(Request $request)
    {

        //custom error messages
        $messages = [
            'text.required' => 'Văn bản cần trích chọn không được để trống',
            'text.min' => 'Văn bản cần trích chọn phải có ít nhất 20 ký tự',
        ];
        // return if validation fails with errors
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|min:20',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $text = $request->input('text');

        if (isset($request->id)) {
            $summary = Summary::find($request->id);

            $summarizedText = $this->summarizeText($text);
            $summary->text = $text;
            $summary->summary = $summarizedText;
            $summary->save();
 
            return view('pages.text-summarization.main', ['text' => $text, 'summarizedText' => $summarizedText, 'id' => $request->id]);

        }
        $summarizedText = $this->summarizeText($text);

        $summary = Summary::create([
            'text' => $text,
            'summary' => $summarizedText,
        ]);
        $summary->save();
        //redirect to the same page with the summarized text
        return view('pages.text-summarization.main', ['text' => $text, 'summarizedText' => $summarizedText]);
    }

    // summarize text
    public function summarizeText($text)
    {
        $url = Config::orderBy('created_at', 'desc')->first();
        
        $response = $this->sendHttpRequest($url['url'], 'POST', [], ['text' => $text]);
        return $response['summary'];
    }

    function sendHttpRequest($url, $method = 'GET', $params = [], $body = [], $headers = [])
    {
        $client = new Client([
            'verify' => false, // Disable SSL verification
        ]);

        $response = $client->request($method, $url, [
            'query' => $params,
            'json' => $body,
            'headers' => $headers,
        ]);
        return json_decode($response->getBody()->getContents(), true);

    }

    //config
    public function config()
    {
        return view('config');
    }

    public function configUpdate(Request $request)
    {
        $url = $request->input('url');
        // save the url to the database
        $config = Config::create([
            'url' => $url,
        ]);
    
        $config->save();
        return redirect()->route('text-summarization');
    }

    //device
    public function device()
    {
        return view('device');
    }

    public function deviceStore(Request $request)
    {
        $device = $request->input('device');

        //get ip address
        $ip = $request->ip();
        //update with ip address
        $device = Device::where('ip', $ip)->update(['code' => $device]);
        return redirect()->route('text-summarization');
    }
}
