<?php

return [
  'token' => env('WHATSAPP_API_TOKEN', ''),
  'url' => env('WHATSAPP_API_URL', 'https://graph.facebook.com/v20.0/'),
  'language_code' => 'en', // Default language for templates
];
