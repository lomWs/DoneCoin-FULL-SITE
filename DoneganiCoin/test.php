<?php

$keys = openssl_pkey_new(array(
    "private_key_bits" => 4096,
    "private_key_type" => OPENSSL_KEYTYPE_RSA));

$public_key_pem = openssl_pkey_get_details($keys)['key'];
openssl_pkey_export($keys, $private_key_pem);


//write keys to files #1
file_put_contents("PublicKey.pem", $public_key_pem);
file_put_contents("PrivateKey.pem", $private_key_pem);

//Remove header, footer and line feeds to get a simple Base64 encoded string #2
$public_key_pem_raw= str_replace (array("-----BEGIN PUBLIC KEY-----","-----END PUBLIC KEY-----","\r\n", "\n", "\r"), '', $public_key_pem);
$private_key_pem_raw= str_replace (array("-----BEGIN PRIVATE KEY-----","-----END PRIVATE KEY-----","\r\n", "\n", "\r"), '', $private_key_pem);

file_put_contents("PublicKey4B4x.raw", $public_key_pem_raw);
file_put_contents("PrivateKey4B4x.raw", $private_key_pem_raw);

echo $private_key_pem_raw."\n";
echo $public_key_pem_raw;

?>