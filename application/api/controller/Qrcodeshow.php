<?php
namespace app\api\controller;

use GuzzleHttp\Client;
use think\facade\Request;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;


class Qrcodeshow
{
    public function index()
    {
    	$qrcode = url('api/qrcodeshow/qrcode');
    	echo "<img src='{$qrcode}'>";
    }

    public function qrcode()
    {
    	$content = '123';

    	// Create a basic QR code
		$qrCode = new QrCode($content);
		$qrCode->setSize(300);

		// Set advanced options
		$qrCode->setWriterByName('png');
		$qrCode->setMargin(10);
		$qrCode->setEncoding('UTF-8');
		$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		// $qrCode->setLabel('Scan the code', 16, __DIR__.'/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
		// $qrCode->setLogoPath(__DIR__.'/../assets/images/symfony.png');
		$qrCode->setLogoWidth(150);
		// $qrCode->setRoundBlockSize(true);
		$qrCode->setValidateResult(false);

		// Directly output the QR code
		header('Content-Type: '.$qrCode->getContentType());
		echo $qrCode->writeString();
		die;

		// Save it to a file
		// $qrCode->writeFile(__DIR__.'/qrcode.png');

		// Create a response object
		// $response = new QrCodeResponse($qrCode);
    }
}
