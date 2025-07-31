<?php
class Whatsapp
{

    //private $base_url = 'https://wa.srv10.wapanels.com'; // masukan link
    
    public function __construct($punten) {
        $this->base_url = $punten['domain'];
        $this->apikey = $punten['apikey'];
        $this->sender = $punten['sender'];
    }

    private function connect($end_point,$post)
    {
    
    $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://'.$end_point,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $post,
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }

    public function sendMessage($phone, $msg)
    {
        return $this->connect($this->base_url.'/send-message',array(
            'api_key' => $this->apikey,
            'sender' => $this->sender,
            'number' => $phone,
            'message' => $msg
        ));
    }

    public function sendPicture($phone, $msg, $url, $filetype)
    {
        return $this->connect($this->base_url.'/send-media',array(
            'api_key' => $this->apikey,
            'sender' => $this->sender,
            'number' => $phone,
            'caption' => $msg,
            'url' => $url, // 'Link image/pdf'
            'media_type' => $filetype
        ));
    }
    public function sendDocument($phone, $filetype, $filename, $url )
    {
        return $this->connect($this->base_url.'/send-media',array(
            'api_key' => $this->apikey,
            'sender' => $this->sender,
            'number' => $phone,
            'filetype' => $filetype,
            'filename' => $filename,
            'url' => $url
        ));
    }

    public function sendAudio($phone, $voice = true, $url, $filetype)
    {
        return $this->connect($this->base_url.'/send-media',array(
            'api_key' => $this->apikey,
            'sender' => $this->sender,
            'number' => $phone,
            'filetype' => $filetype,
            'ppt' => $voice,
            'url' => $url
        ));
    }
}
