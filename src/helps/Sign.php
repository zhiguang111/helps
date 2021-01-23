<?php


namespace src\helps;


class Sign
{
    public $privateKey;
    public $publicKey;
    public $redis;
    public $config = [
        'digest_alg' => 'sha512',
        'private_key_bits' => '512',
        'private_key_type' => OPENSSL_KEYTYPE_RSA,
    ];

    public function __construct($redis)
    {
        $this->redis = $redis;
        $this->privateKey = $this->redis->get('privateKey');
        $this->publicKey = $this->redis->get('publicKey');
        if (!$this->privateKey || !$this->publicKey) {
            $this->init();
        }
    }

    private function init()
    {
        $res = openssl_pkey_new($this->config);
        openssl_pkey_export($res, $this->privateKey);
        $this->publicKey = openssl_pkey_get_details($res)['key'];

        $this->redis->set('privateKey', $this->privateKey, 86400);
        $this->redis->set('publicKey', $this->publicKey, 86400);
    }
}