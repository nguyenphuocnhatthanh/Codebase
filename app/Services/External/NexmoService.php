<?php

namespace App\Services\External;

use Nexmo\Laravel\Facade\Nexmo;

/**
 * Class NexmoService
 * @package App\Services\External
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 18/09/28
 */
class NexmoService
{
    /**
     * @param $request
     * @return mixed
     */
    public function smsCode($request)
    {
        $verification = Nexmo::verify()->start([
            'number' => $request->get('phone_number'),
            'brand' => config('app.name')
        ]);

        return $verification;
    }

    public function verify($request)
    {
        return Nexmo::verify()->check(
            $request->get('request_id'),
            $request->get('code')
        );
    }
}
