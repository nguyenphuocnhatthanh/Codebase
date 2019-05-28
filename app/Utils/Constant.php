<?php

namespace App\Utils;

/**
 * Class Constant
 * @package App\Utils
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 18/09/28
 */
final class Constant
{
    const SOCIAL_FACEBOOK = 'facebook';
    const SOCIAL_GOOGLE = 'google';

    const PHONE_NUMBER_REGEX = '/^\+?[1-9]\d{10,14}$/';
    const LATITUDE_REGEX = '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/';
    const LONGITUDE_REGEX = '/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/';

    const WIDTH_IMAGE_RESIZE = 400;
    const HEIGHT_IMAGE_RESIZE = 600;

}
