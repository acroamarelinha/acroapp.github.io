<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
   

    <title>Acroapp</title>


        <style type ="text/css">

            body{
                padding: 100px;
                background: #64a19d;
            }


            .balao{
                background: #fff;
                padding: 15px;
                position: fixed;
                width: 300px;
                z-index: 5;

            }
            .balao:before{
                content: '';
                position: absolute;
                width: 20px;
                height: 20px;
                left: -10px;
                top: 25px;
                background: #fff;
                z-index: 1;
                -webkit-transform: rotate(45deg);
            }

        </style>

    </head>
    
    <body>
        
    <div class="container">
		<br>
			<h2 class="balao">Mensagem confirmada</h2>
			<br>
		
		</div>
		



        <?php
	
        $email = $_POST['email'];
       
	
        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "$email");
        $subject = "Email de contato";
        $to = new SendGrid\Email(null, "acroapp.inovacao@gmail.com");
        $content = new SendGrid\Content("text/html", "Olá Acroapp, <br><br>Nova email cadastrado<br><br>Email: $email");
        $mail = new SendGrid\Mail($from, $email, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
       
		
        ?>
    </body>
</html>
