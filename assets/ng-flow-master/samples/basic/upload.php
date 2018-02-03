<?php
$tempDir = __DIR__ . DIRECTORY_SEPARATOR . 'temp';
if (!file_exists($tempDir)) {
	mkdir($tempDir);
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$chunkDir = $tempDir . DIRECTORY_SEPARATOR . $_GET['flowIdentifier'];
	$chunkFile = $chunkDir.'/chunk.part'.$_GET['flowChunkNumber'];
	if (file_exists($chunkFile)) {
		header("HTTP/1.0 200 Ok");
	} else {
		header("HTTP/1.1 204 No Content");
	}
}else{
	echo __DIR__;
	echo $tempDir;
	//md5(uniqid(mt_rand()))
	$target_file = $tempDir . basename($_FILES["file"]["name"]);
	move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
}
// Just imitate that the file was uploaded and stored.
sleep(2);
echo json_encode([
    'success' => true,
    'files' => $_FILES,
    'get' => $_GET,
    'post' => $_POST,
    //optional
    'flowTotalSize' => isset($_FILES['file']) ? $_FILES['file']['size'] : $_GET['flowTotalSize'],
    'flowIdentifier' => isset($_FILES['file']) ? $_FILES['file']['name'] . '-' . $_FILES['file']['size']
        : $_GET['flowIdentifier'],
    'flowFilename' => isset($_FILES['file']) ? $_FILES['file']['name'] : $_GET['flowFilename'],
    'flowRelativePath' => isset($_FILES['file']) ? $_FILES['file']['tmp_name'] : $_GET['flowRelativePath']
]);
