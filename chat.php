<?php

$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = $data['message'] ?? '';

// API key
$apiKey = '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';


$postData = json_encode([
    'model' => 'gpt-4o-mini',
    'messages' => [
        [ 'role' => 'system', 'content' => 'Ti je nje asistent i Illyric website, ti duhet ti pergjigjesh kerkesave te perdoruesve. Ne kemi nje qmiore ku pako mujore e planit te pare eshte falas dhe planit te dyte eshte 29$ ndersa pako vjetore e planit te dyte eshte 299$. Pakoja e dyte ofron qasje ekskluzive në publikime të reja muzikore, prioritet për rezervime në evente, një playlist i personalizuar në muaj. Sherbimet qe ofrojme jane Ne ofrojmë mundësi të shkëlqyera për krijimin e muzikës profesionale. Mund të prodhojmë këngë, albume dhe kompozime të personalizuara për artistë, Ofrojmë shërbime për krijimin e videove muzikore me një cilësi të lartë. Nga konceptimi deri në post-produksion, ne kujdesemi për çdo detaj.Sigurojmë një eksperiencë të shkëlqyer audio për artistët tanë, duke ofruar shërbime profesionale të mastering dhe miximi për të sjellë tinguj të pastër dhe të fuqishëm.
        gjithmone pyeti klientet nese ka diqka tjeter qe mund ti ndihmosh pasi ta perfundosh pergjigjen' ],
        [ 'role' => 'user', 'content' => $message ]
    ]
]);


$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(['error' => curl_error($ch)]);
    exit;
}
curl_close($ch);


$result = json_decode($response, true);
$reply = $result['choices'][0]['message']['content'] ?? 'No response';
header('Content-Type: application/json');
echo json_encode(['reply' => $reply]);
?>