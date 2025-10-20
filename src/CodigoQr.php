<?php

namespace Dsw\Generadorqr;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class CodigoQr
{
    public function __construct(
        public string $texto,
        public string $url = ''
    ) {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = new QrCode(
            data: $this->texto,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        $result = $writer->write($qrCode);

        $result->saveToFile(__DIR__.'/qrcode.png');

        $this->url = $result->getDataUri();
    }

    public function getURL(): string
    {
        return $this->url;
    }
}
