<?php
$apiKey = "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";
$prompt = $_GET['message'];

function callOpenAI($prompt)
{
    global $apiKey;
    $prompt = strtolower($prompt);

    if (strpos($prompt, "how to") === false && strpos($prompt, "about") === false) {
        $prompt = "How to cure " . $prompt . "?";
    }

    $data = array(
        "model" => "text-davinci-003",
        "prompt" => $prompt,
        "temperature" => 0.9,
        "max_tokens" => 150,
        "top_p" => 1,
        "frequency_penalty" => 0.0,
        "presence_penalty" => 0.0
    );

    $ch = curl_init("https://api.openai.com/v1/completions");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKey
    ));

    $response = curl_exec($ch);

    curl_close($ch);
    return $response;
}

function main()
{
    global $prompt;
    $response = callOpenAI($prompt);
    echo $response;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    main();
}