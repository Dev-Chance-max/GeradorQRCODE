<?php 
    include './qrcode.php';
    if(isset($_POST['qr'])){
        $text = $_POST['qr'];
        $name = md5(time()) . ".png"; //time serve para gerar nome em forma de data,hora para nao subscrever o arquivo
        $file = "files/{$name}";
        //criando array para organizar altura e largura
        $options = array (
            'w'=> 500,
            'h'=> 500
        );
        $generator = new QRCode($text, $options);//parametro para mostrar na tela //$generator->output_image();
        $image = $generator->render_image();/* Create bitmap image. */
        imagepng($image, $file);
        imagedestroy($image);//destruit a imagem no servidor para nao ocupar espaco

        echo "<p>";
        echo "Imagem gerada com sucesso";
        echo "<a href='{$file}' target='_blank'> Clica aqui para ver o qr code</a>";
        
    }
?>