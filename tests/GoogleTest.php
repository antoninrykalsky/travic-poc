<?php

class GoogleTest extends \TravisPoc\ConsoleTestCase
{
    private $curl;

    public function setUp()
    {
        $this->curl = curl_init();
    }

    /**
     * @test
     */
    public function checkGoogleResponse()
    {
        $agent = $_SERVER['AGENT'];

        curl_setopt_array($this->curl, array(
            CURLOPT_URL => "http://www.zive.cz/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: 76c3c4b3-67b8-dbc7-eac6-af4407e5c4b1",
                "user-agent: $agent"
            ),
        ));

        $response = curl_exec($this->curl);
        curl_close($this->curl);

        $this->assertRegexp('/O počítačích, IT a internetu - Živě.cz/', $response);
    }
}