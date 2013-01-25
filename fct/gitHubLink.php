<?php

$data = 'client_id=' . '47884071d6faa11df001' . '&' .
		'client_secret=' . '8cb7dea35c1bdcf026d0170a0403e31210c633a2' . '&' .
		'code=' . urlencode($_GET['code']);

$ch = curl_init('https://github.com/login/oauth/access_token');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

preg_match('/access_token=([0-9a-f]+)/', $response, $out);
echo @$out[1];
curl_close($ch);

?>
