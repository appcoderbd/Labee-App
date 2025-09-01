<?php

namespace App;

enum SocialLoginProvider: string
{
    // Social Login Provider
    case GITHUB = 'github';
    case FACEBOOK = 'facebook';
    case GOOGLE = 'google';
}
