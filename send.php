<?php

    $url = 'https://fcm.googleapis.com/fcm/send';
    $server_key = "AAAAHAbUe2o:APA91bE7owmYQqZN1izfI_tbjam_z1VuRimiL4iG5lsR6AY40LqcvNXfcBHJviBbrIArpyTzZes8lAfa6QpXvARn1hIqQBToK3Kj8ni-4h3EKsxJnq2eTBLY289t4S3kd7GmTFhuWfI4";
   
    $message =array(
        "data" => array(
            "title" => "Title",
            "body" => "This message is from local server.",
            "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
            "image" => "https://images.unsplash.com/photo-1514473776127-61e2dc1dded3?w=871&q=80",
            "click_action" => "https://example.com"
        ),
        "registration_ids" => [
            "cKpLdpR8mwmRL8zWNn3Ao7:APA91bFDD6Bqq_Y3KvHgpi5ZWPXvyjyAqQcxKFfYmsyedMqPF0OPUGn27u4VfN7M56cfdQsctfV7z8ohHDv3hvrHqaorL2Uub2PmiJ-GQd3uWai-dXS0xUMvDreZtTs3zq4dxkMjbaAv",
            "cRP9O6v1YHODroQpjUpv4q:APA91bFY0Yzz8QMXSK8BpalENrtR314wggC0Ab9ysi09iqnUnpKB4QvCFYwa54kDkVXWgB_ec3Jsh-VETBkLeyQwcbwkFDRB0NxAeDpi4infboyzRr7Z2zqZ1ehJEsWUEE4aZEmnMdeM"
        ],

    );
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $server_key,
            "Content-Type: application/json",
        ),
        CURLOPT_POSTFIELDS => json_encode($message),
    );
    $curl = curl_init();
    curl_setopt_array($curl, $options);
    $response = curl_exec($curl);
    if($response === false){
        echo "Error sending messages".curl_error($curl);
    }else{
        echo "Message sent successfully !! ";
    }
    curl_close($curl);
   

/*include "./get_access_token.php";
function sendFCMNotification($access_token, $token) {
    $url = "https://fcm.googleapis.com/v1/projects/your-project-id-here/messages:send";
    $data = [
        'message' => [
            "data"=> [
                "title" => "Title",
                "body" => "This is message body.",
                "icon" => "https://www.clipscutter.com/image/brand/brand-256.png",
                "image" => "https://images.unsplash.com/photo-1514473776127-61e2dc1dded3?w=871&q=80",
                "click_action" => "https://example.com"
            ],
            'token' => $token
        ]
    ];
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer " . $access_token,
            "Content-Type: application/json",
        ),
        CURLOPT_POSTFIELDS => json_encode($data),
    );
    $curl = curl_init();
    curl_setopt_array($curl, $options);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

$access_token = get_access_token("push-notify-28f5f-firebase-adminsdk-do993-836796aaf7.json");
$device_tokens = [
    "device-token-here",
    "device-token-here"
];

foreach ($device_tokens as $token) {
    $response = sendFCMNotification($access_token, $token);
    echo $response . '<br>';
} */

?>