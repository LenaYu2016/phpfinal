<?php

namespace Project\Classes\Config;


class OAuthInfo {
  const GITHUB = [
    'callbackUrl' => 'https://github.com/login/oauth/authorize?scope=user:email&client_id=76410de7fda4780c4caa',
    'tokenUrl' => 'https://github.com/login/oauth/access_token',
    'client_id' => '786cab0ad0dd11841b29',
    'client_secret' => '02b638f5ab2541b02300141ba92c0c9c1bd9e990',
  ];
}