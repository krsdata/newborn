<?php

return [

	// The default gateway to use
	'default' => 'paypal',

	// Add in each gateway here
	'gateways' => [
    'paypal' => [
        'driver'  => 'PayPal_Express',
        'options' => [
            'username'  => env( 'OMNIPAY_PAYPAL_EXPRESS_USERNAME', 'kundan.r-facilitator-2_api1.cisinlabs.com' ),
            'password'  => env( 'OMNIPAY_PAYPAL_EXPRESS_PASSWORD', 'MSQS653H9A4QS7FB' ),
            'signature' => env( 'OMNIPAY_PAYPAL_EXPRESS_SIGNATURE', 'ABr3Vod5oMAm7SisuCYQGg59mo7fAexp9AJrWOgeSGOQrSWc4RLWIDfr' ),
            'solutionType' => env( 'OMNIPAY_PAYPAL_EXPRESS_SOLUTION_TYPE', '' ),
            'landingPage'    => env( 'OMNIPAY_PAYPAL_EXPRESS_LANDING_PAGE', '' ),
            'headerImageUrl' => env( 'OMNIPAY_PAYPAL_EXPRESS_HEADER_IMAGE_URL', '' ),
            'brandName' =>  'Your app name',
            'testMode' => env( 'OMNIPAY_PAYPAL_TEST_MODE', true )
        ]
    ],
]

];