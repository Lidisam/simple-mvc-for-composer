<?php

namespace App\Service;


class RsaService
{

    /**
     * 1024 位
     * 生成方法：
     * openssl genrsa -out rsa_private_key.pem 1024
     * openssl pkcs8 -topk8 -inform PEM -in rsa_private_key.pem -outform PEM -nocrypt -out private_key.pem
     * openssl rsa -in rsa_private_key.pem -pubout -out rsa_public_key.pem
     * @var string
     */
    protected $private_key = '-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQC3//sR2tXw0wrC2DySx8vNGlqt3Y7ldU9+LBLI6e1KS5lfc5jl
TGF7KBTSkCHBM3ouEHWqp1ZJ85iJe59aF5gIB2klBd6h4wrbbHA2XE1sq21ykja/
Gqx7/IRia3zQfxGv/qEkyGOx+XALVoOlZqDwh76o2n1vP1D+tD3amHsK7QIDAQAB
AoGBAKH14bMitESqD4PYwODWmy7rrrvyFPEnJJTECLjvKB7IkrVxVDkp1XiJnGKH
2h5syHQ5qslPSGYJ1M/XkDnGINwaLVHVD3BoKKgKg1bZn7ao5pXT+herqxaVwWs6
ga63yVSIC8jcODxiuvxJnUMQRLaqoF6aUb/2VWc2T5MDmxLhAkEA3pwGpvXgLiWL
3h7QLYZLrLrbFRuRN4CYl4UYaAKokkAvZly04Glle8ycgOc2DzL4eiL4l/+x/gaq
deJU/cHLRQJBANOZY0mEoVkwhU4bScSdnfM6usQowYBEwHYYh/OTv1a3SqcCE1f+
qbAclCqeNiHajCcDmgYJ53LfIgyv0wCS54kCQAXaPkaHclRkQlAdqUV5IWYyJ25f
oiq+Y8SgCCs73qixrU1YpJy9yKA/meG9smsl4Oh9IOIGI+zUygh9YdSmEq0CQQC2
4G3IP2G3lNDRdZIm5NZ7PfnmyRabxk/UgVUWdk47IwTZHFkdhxKfC8QepUhBsAHL
QjifGXY4eJKUBm3FpDGJAkAFwUxYssiJjvrHwnHFbg0rFkvvY63OSmnRxiL4X6EY
yI9lblCsyfpl25l7l5zmJrAHn45zAiOoBrWqpM5edu7c
-----END RSA PRIVATE KEY-----';
    protected $public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC3//sR2tXw0wrC2DySx8vNGlqt
3Y7ldU9+LBLI6e1KS5lfc5jlTGF7KBTSkCHBM3ouEHWqp1ZJ85iJe59aF5gIB2kl
Bd6h4wrbbHA2XE1sq21ykja/Gqx7/IRia3zQfxGv/qEkyGOx+XALVoOlZqDwh76o
2n1vP1D+tD3amHsK7QIDAQAB
-----END PUBLIC KEY-----';
    //传入数据   例：'我是数据~~~~~~~~'
    protected $data;

    function __construct($data)
    {
        $this->data = $data;
    }


    /**
     * 私匙加密
     * @param $data
     * @return string
     */
    public function private_encrypt($data)
    {
        openssl_private_encrypt($data, $encrypted, $this->pi_key);//私钥加密
        return base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的
    }

    /**
     * 公匙解密
     * @param $encrypted
     * @return bool
     */
    public function public_decrypt($encrypted)
    {
        return openssl_public_decrypt(base64_decode($encrypted), $decrypted, $this->pu_key);//私钥加密的内容通过公钥可用解密出来
    }

    /**
     * 公匙加密
     * @param $data
     */
    public function public_encrypt($data)
    {
        openssl_public_encrypt($data, $encrypted, $this->pu_key);//公钥加密
    }

    /**
     * 私匙解密
     * @param $encrypted
     */
    public function private_decrypt($encrypted)
    {
        openssl_private_decrypt(base64_decode($encrypted), $decrypted, $this->pi_key);//私钥解密
    }

}