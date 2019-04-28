
<?php
//$key is our base64 encoded 256bit key that we created earlier. You will probably store and define this key in a config file.
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function my_encrypt($data, $key) {
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('des-cbc'));
    //$iv can changed to 8 characters
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'des-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}
//our data to be encoded
echo $strenc = 'Kartu atm anda telah aktif, silahkan lakukan akifasi ke atm terdekat, jangan pernah beritahu kepada siapatun kode rahasia ini 0011';
echo "<br>";
//our data being encrypted. This encrypted data will probably be going into a database
//since it's base64 encoded, it can go straight into a varchar or text database field without corruption worry
$result = my_encrypt($strenc, $key);
echo $result . "<br>";


?>