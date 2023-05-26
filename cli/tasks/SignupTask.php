<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use Phalcon\Cli\Task;
use Phalcon\Security\JWT\Builder;
use Phalcon\Security\JWT\Signer\Hmac;


class SignupTask extends Task
{

    public function signupAction($id, $name, $email, $pswd)
    {
        $sign = new SignupTask();
        $token = $sign->getToken($email);
        $data = [
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'pswd' => $pswd,
            'token' => $token,
            'role' => 'user'
        ];
        $ch = curl_init();
        $url = 'http://192.168.64.5/adduser?role=admin';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // execute!
        $response = json_decode(curl_exec($ch));
        if ($response) {
            echo "User Added Succesfully";
            echo "<br>Your Token is :" . $token;
        } else {
            echo "Something Went Wrong.......";
        }
    }
    public function getToken($email)
    {

        // Defaults to 'sha512'
        $signer  = new Hmac();

        // Builder object
        $builder = new Builder($signer);

        $now        = new \DateTimeImmutable();
        $issued     = $now->getTimestamp();
        $notBefore  = $now->modify('-1 minute')->getTimestamp();
        $expires    = $now->modify('+30 day')->getTimestamp();
        $passphrase = 'QcMpZ&b&mo3TPsPk668J6QH8JA$&U&m2';

        // Setup
        $builder
            ->setAudience('https://target.phalcon.io')  // aud
            ->setContentType('application/json')        // cty - header
            ->setExpirationTime($expires)               // exp
            ->setId('abcd123456789')                    // JTI id
            ->setIssuedAt($issued)                      // iat
            ->setIssuer('https://phalcon.io')           // iss
            ->setNotBefore($notBefore)                  // nbf
            ->setSubject('user')   // sub
            ->setPassphrase($passphrase)                // password
        ;

        // Phalcon\Security\JWT\Token\Token object
        $tokenObject = $builder->getToken();

        // The token
        return $tokenObject->getToken();
    }
}
