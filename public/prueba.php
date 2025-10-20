<?php
require '../vendor/autoload.php';

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

$writer = new PngWriter();

// Create QR code
$qrCode = new QrCode(
    data: 'Life is too short to be generating QR codes',
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::Low,
    size: 300,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    foregroundColor: new Color(0, 0, 0),
    backgroundColor: new Color(255, 255, 255)
);


$result = $writer->write($qrCode);

// Directly output the QR code
header('Content-Type: '.$result->getMimeType());
echo $result->getString();

// Save it to a file
$result->saveToFile(__DIR__.'/qrcode.png');

// Generate a data URI to include image data inline (i.e. inside an <img> tag)
$dataUri = $result->getDataUri();
