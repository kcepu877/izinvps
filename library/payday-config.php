<?php
class PaydayConfigClass {
    private $key = '263a29b84ead800';
    public function game($name, $server = null, $idGame) {
        $curl = curl_init();

        $base_url = 'https://payday.my.id/trueid/game/'. $name. '/?id='. $idGame. '&key='. $this->key;
        if (isset($server)) {
            $base_url .= '&server='. $server;
        }

        curl_setopt_array($curl, array(
          CURLOPT_URL => $base_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        $data = json_decode($response);
        return $data;
    }
    public function ewallet($name, $number) {
        $params = [
            'key' => 'LQKLV3aFxzo2izS8qCfgoARsUNJbAOsNsWU1EqzmgkYz0dO9i9SMHXfV0W86psZG',
            'sign' => md5('MxDoYFCh' . 'LQKLV3aFxzo2izS8qCfgoARsUNJbAOsNsWU1EqzmgkYz0dO9i9SMHXfV0W86psZG'),
            'type' => 'validation',
            'bank_code' => $name,
            'number' => $number
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://panel.7sstore.web.id/v1/bank',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
          CURLOPT_POSTFIELDS => http_build_query($params),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    public function pln($number) {
        $curl = curl_init();

        $base_url = 'https://payday.my.id/trueid/bill/pln/?no='. $number. '&key='. $this->key;

        curl_setopt_array($curl, array(
          CURLOPT_URL => $base_url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        $data = json_decode($response);
        return $data;
    }
}
$PaydayConfig = new PaydayConfigClass;