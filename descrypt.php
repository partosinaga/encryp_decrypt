<?php

$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function my_decrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('des-cbc'));
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'des-cbc', $encryption_key, 0, $iv);
}

//our data to be encoded
$strenc = 'dzNZaWtyVVhLMHRUZkM5QnNsZWZpVzVSV3poNVhwYlRKc202RisxSGRGamlYbVZSWHM2RytxMDBaWGhSRCt4M3o3czdBZUJyaFFST2NBL1A2MkVyVHhLaTNJY1RxNFhXMjVXcWhiSlJBbDByc2xxeGN5eEZ5ZzB5UXkwMkMvL3E2TGJyTVMybC9FVmNJUXFyUldTRTJzMDl4b2kvK21jdGMwQUdTbURBQ0RUdG5pbFZoNEVuelE9PTo6cH1xHJUszhw=';

//now we turn our encrypted data back to plain text
$result = my_decrypt($strenc, $key);
echo $result . "<br>";