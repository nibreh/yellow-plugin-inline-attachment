<?php

$uploadFolder = __DIR__ . '/';
$onlinePath = (isset($_SERVER['HTTPS']) ? "https" : "http") . '://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['REQUEST_URI'])."/";

$response = array();

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $filename = uniqid() . '.' . (pathinfo($file['name'], PATHINFO_EXTENSION) ? : 'png');

    move_uploaded_file($file['tmp_name'], $uploadFolder . $filename);

    //$response['filename'] = $onlinePath . $filename;
    $response['filename'] = $filename;
} else {
    $response['error'] = 'Error while uploading file';
}

echo json_encode($response);
