<?php

namespace App\Service;


class RsaService
{


    protected $private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXgIBAAKBgQDIlaEGaNQ726AUjXfezwCW9h6igNR8/qsQoiTIY76BSu2MDtLW
QUn1Ui/HjtS7u1/TVmnGkS5boBZovsuNZtF3NyYKf/Ajh8uR8P5ytEiq2WPJrcAW
OyRpbbuiLX3TQj+8aerfpP1dNiQrndjM9VSDqZ6WhjgZ+e4h50HPNJmT2QIDAQAB
AoGBAJ9KXGcnpqumfVj1A6W4hAJej/ODFbvxzk3WRhmxRF+O7liUiRDHJoGgc/sp
TX2MjsvZSwT61HLFDia+pg20AlEe7pALmdd6TFGbEJFO1WdACpDKOLqM9GEGNKu5
jIwCfuskrSve5++yJOkPzAH7P8aZCQhzON+9AetfPzRQb3bRAkEA7eoJ9KfDXMxL
RD5D+I/OjO8/KbEXyTRF+mkloW4RSk+xVXQP2e86701Vu/FQTC1Q8QePtKymWrEs
fuSFZprl9QJBANfVIUmw2JmDpFoTB0XFLUZmrP4vdtRwETfsjdw7aNMTjdQ/UyAT
9bEvn8RbRu5kQZYvQwEDwaAQ8DAf7FqQ49UCQBvlCO3KjblfqqOBuW53TfxwQLOe
s+8/VcUadvMKeLSBy4T9aq5ewkY0hwzWKlgEKC1aeZrxcz/G7jSijpGNL9ECQQCo
pkeul1uJCU6Be+Dw6dQo8M44iMon0bICqvtmnZ2ZYewvb5P6ut3/KCGFg3V3jiuZ
uTB4OIEyHEoysJ81XYZJAkEAlim6un8OR/fsScnu1JAcVvHhP4mJSfcrnJUgeKWz
1QLfTQTAyBhXYkdny0cuQe4AN8pAStKPpplOP3+XEqEtdw==
-----END RSA PRIVATE KEY-----';

    protected $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIlaEGaNQ726AUjXfezwCW9h6i
gNR8/qsQoiTIY76BSu2MDtLWQUn1Ui/HjtS7u1/TVmnGkS5boBZovsuNZtF3NyYK
f/Ajh8uR8P5ytEiq2WPJrcAWOyRpbbuiLX3TQj+8aerfpP1dNiQrndjM9VSDqZ6W
hjgZ+e4h50HPNJmT2QIDAQAB
-----END PUBLIC KEY-----';

    public $pi_key;
    public $pu_key;


    function __construct()
    {
        //这个函数可用来判断私钥是否是可用的，可用返回资源id Resource id
        $this->pi_key = openssl_pkey_get_private($this->private_key);
        //这个函数可用来判断公钥是否是可用的
        $this->pu_key = openssl_pkey_get_public($this->public_key);
    }

    /**
     * @desc 私匙加密 [公钥可解密]
     * @param $data [待加密数据]
     * @return string
     */
    public function privateEncrypt($data)
    {
        openssl_private_encrypt($data, $encrypted, $this->pi_key);//私钥加密
        $encrypted = base64_encode($encrypted);

        return $encrypted;
    }

    /**
     * @desc 公钥解密 [解密私匙加密的数据]
     * @param $encrypted [已加密数据，待解密数据]
     * @return bool
     */
    public function publicDecrypt($encrypted)
    {
        openssl_public_decrypt(base64_decode($encrypted), $decrypted, $this->pu_key);
        return $decrypted;
    }


    /**
     * @desc 公钥加密 [私匙可解密]
     * @param $data [待加密数据]
     * @return string
     */
    public function publicEncrypt($data)
    {
        $encrypted = '';
        openssl_public_encrypt($data, $encrypted, $this->pu_key);//公钥加密
        $encrypted = base64_encode($encrypted);

        return $encrypted;
    }

    /**
     * @desc 私匙解密 [解密公匙加密的数据]
     * @param $encrypted [已加密数据，待解密数据]
     * @return bool
     */
    public function privateDecrypt($encrypted)
    {
        $decrypted = '';
        openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->pi_key);
        return $decrypted;
    }
}


