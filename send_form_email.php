<?php



*/
session_start();

if($_POST){
//Atribuindo valores das inputs nas variáveis
    $nome = $_POST['first_name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $comentario = $_POST['comments'];

    if(isset($_POST['email'])) {

        // EDIT THE 2 LINES BELOW AS REQUIRED

        //Para onde o e-mail será enviado
        $email_to = "wilian_lopess@hotmail.com";

        //Qual o título do e-mail
        $email_subject = "Nova Mensagem do Site John Haste";

        function died($error) {

            // your error code can go here

            echo "We are very sorry, but there were error(s) found with the form you submitted. ";

            echo "These errors appear below.<br /><br />";

            echo $error."<br /><br />";

            echo "Please go back and fix these errors.<br /><br />";

            die();

        }

        $error_message = "";

        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

        if(strlen($error_message) > 0) {

          died($error_message);

        }

        $email_message = "Detalhes abaixo.\n\n";



        function clean_string($string) {

          $bad = array("content-type","bcc:","to:","cc:","href");

          return str_replace($bad,"",$string);

        }



        $email_message .= "Nome: ".clean_string($nome)."\n";

        $email_message .= "Email: ".clean_string($email)."\n";

        $email_message .= "Mensagem: ".clean_string($comentario)."\n";

        // create email headers

        $headers = 'From: '.$email."\r\n".

        'Reply-To: '.$email."\r\n" .

        'X-Mailer: PHP/' . phpversion();

        @mail($email_to, $email_subject, $email_message, $headers);

        }
    }

    //Mensagem de sucesso
    $_SESSION['msg'] = "Formulário enviado com sucesso!";

    //Redireciona para a index
    header('location:index.php');

?>
