<?php

namespace Bebo2xd\TryWhatsapp;

use Illuminate\Support\Facades\Http;

class TryWhatsapp
{
  /**
   * Send a text message.
   *
   * @param string $to
   * @param string $message
   * @return \Illuminate\Http\Client\Response
   */
  public function sendTextMessage(string $to, string $message)
  {
    $response = Http::withToken(config('trywhatsapp.token'))
      ->post(config('trywhatsapp.url') . '/messages', [
        'to' => $to,
        'type' => 'text',
        'text' => ['body' => $message],
      ]);

    return $response;
  }

  /**
   * Send a template message.
   *
   * @param string $to
   * @param string $templateName
   * @param array $templateParams
   * @return \Illuminate\Http\Client\Response
   */
  public function sendTemplateMessage(string $to, string $templateName, array $templateParams)
  {
    $response = Http::withToken(config('trywhatsapp.token'))
      ->post(config('trywhatsapp.url') . '/messages', [
        'to' => $to,
        'type' => 'template',
        'template' => [
          'name' => $templateName,
          'language' => ['code' => config('trywhatsapp.language_code')],
          'components' => [
            [
              'type' => 'body',
              'parameters' => $templateParams,
            ]
          ]
        ],
      ]);

    return $response;
  }
}
