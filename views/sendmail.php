<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'mail/src/Exception.php';
    require 'mail/src/PHPMailer.php';
    require 'mail/src/SMTP.php';

    if (isset($_POST["send"])) {
        $mail = new PHPMailer(true);

        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'longstar981@gmail.com';
        $mail -> Password = 'lzftwsiuccspeaao';
        $mail -> SMTPSecure = 'ssl';
        $mail -> Port = 465;

        $mail -> setFrom('longstar981@gmail.com');
        $mail -> addAddress($_POST['email']);
        $mail -> isHTML(true);
        $mail -> Subject = $_POST['subject'];
        $mail -> Body = $_POST['message'];
        
        $mail -> send();

        echo
        "
            <script>
                alert('Sent Successfully');
                document.location.href = 'index.php'
            </script>
        ";
    }
?>