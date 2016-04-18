<?php

namespace O365Graph\Managers;

/**
 * It manages all request to graph api
 */
class RequestManager
{
    private $url;
    private $postString;
    private $httpResponse;
    private $ch;
    private $headers;
    private $errNo;
    private $accessToken;


    public function __construct($url, $data=[], $method='GET',$headers=[])
    {
        $this->url = $url;
        $this->errNo = null;
        $this->ch = curl_init($this->url);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($this->ch, CURLOPT_HEADER, false);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 1000);

        $this->headers = $headers;
        $this->setMethod(strtoupper($method));
        $this->setPostData($data);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function setPostData($paramStr)
    {
        $this->postString = $paramStr;
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->postString);
    }

    public function send()
    {
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $this->headers);
        $this->httpResponse = curl_exec($this->ch);
        $this->errNo = curl_errno($this->ch);
    }

    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    public function isSuccess()
    {
        return !$this->errNo;
    }

    public function getErrorMessage()
    {
        if ($this->errNo) {
            return curl_strerror($this->errNo);
        }

        return null;
    }

    public function setMethod($method)
    {
        $method = strtoupper($method);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, $method);
    }

    public function setHeader($header = array())
    {
        $this->headers = array_merge($header, $this->headers);
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;

        $this->headers = array_merge($this->headers, ["Authorization: Bearer {$accessToken}"]);
    }


}