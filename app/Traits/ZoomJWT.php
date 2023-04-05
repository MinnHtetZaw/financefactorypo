<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * trait ZoomMeetingTrait
 */
trait ZoomJWT
{
    private function generateZoomToken()
{
    $key = env('ZOOM_API_KEY', '4ZnfdbMjRvqs8VQV0z-daA');
    $secret = env('ZOOM_API_SECRET', 'Kl4eZZU2CApjDjascSFollDXQLKWnvAU24pi');
    $payload = [
        'iss' => $key,
        'exp' => strtotime('+1 minute'),
    ];
    return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
}
private function retrieveZoomUrl()
{
    return env('ZOOM_API_URL', '');
}

private function zoomRequest()
{
    $jwt= 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IjRabmZkYk1qUnZxczhWUVYwei1kYUEiLCJleHAiOjE4OTM0NzcwMDAsImlhdCI6MTYyOTIwMTI2Nn0.S2eNvWniZInfXG-SLz1JIupmZ_HqHKP3HkNtV3idaR4';
    // $jwt = $this->generateZoomToken();
    return \Illuminate\Support\Facades\Http::withHeaders([
        'authorization' => 'Bearer ' . $jwt,
        'content-type' => 'application/json',
    ]);
}

public function zoomGet(string $path, array $query = [])
{
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();
    return $request;
    return $request->get($url . $path, $query);
}

public function zoomPost(string $path, array $body = [])
{
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();
    return $request->post($url . $path, $body);
}

public function zoomPatch(string $path, array $body = [])
{
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();
    return $request->patch($url . $path, $body);
}

public function zoomDelete(string $path, array $body = [])
{
    $url = $this->retrieveZoomUrl();
    $request = $this->zoomRequest();
    return $request->delete($url . $path, $body);
}
public function toZoomTimeFormat(string $dateTime)
{
    try {
        $date = new \DateTime($dateTime);
        return $date->format('Y-m-d\TH:i:s');
    } catch(\Exception $e) {
        Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());
        return '';
    }
}

public function toUnixTimeStamp(string $dateTime, string $timezone)
{
    try {
        $date = new \DateTime($dateTime, new \DateTimeZone($timezone));
        return $date->getTimestamp();
    } catch (\Exception $e) {
        Log::error('ZoomJWT->toUnixTimeStamp : ' . $e->getMessage());
        return '';
    }
}
}