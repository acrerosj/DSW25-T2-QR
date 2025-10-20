<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
use Dsw\Generadorqr\CodigoQr;

require '../vendor/autoload.php';

if (isset($_POST['texto']) && !empty($_POST['texto'])) {
    $miCodigoQR = new CodigoQr($_POST['texto']);
    
    printf('<p>%s</p>', $miCodigoQR->texto);
    printf('<p>%s</p>', $miCodigoQR->getURL());
    printf('<p><img src="%s"></p>', $miCodigoQR->getURL());
    
} else {
    ?>
<form action="index.php" method="post">
    <input type="text" name="texto" id="" placeholder="Escribe el texto del QR">
    <input type="submit" value="Crear">
</form>

<?php
}
?>
</body>
</html>
