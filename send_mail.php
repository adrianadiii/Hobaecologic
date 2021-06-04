<?php

if(isset($_POST['submit']))
    {
        $name = $_POST['nume']; // Get Name value from HTML Form
        $second_name= $_POST['prenume'];
        $email_id = $_POST['email']; // Get Email Value
        $phone_no = $_POST['telefon']; // Get Mobile No
        $msg = $_POST['mesaj']; // Get Message Value
         
        $to = "info@hobaecologic.ro"; // You can change here your Email
        $subject = "'$name $second_name' a trimis un email"; // This is your subject
         
        // HTML Message Starts here
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Nume: </strong></td>
                            <td style='width:400px'>$name  $second_name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email: </strong></td>
                            <td style='width:400px'>$email_id</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Telefon: </strong></td>
                            <td style='width:400px'>$phone_no</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mesaj: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Admin <info@hobaecologic.ro>' . "\r\n"; // Give an email id on which you want get a reply. User will get a mail from this email id


         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
            echo "<script>
                    alert('Acest email a fost trimis cu succes. Iti multumim!');
                </script>";
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('ACESTY EMAIL NU A PUTUT FI TRIMIS. INCEARCA DIN NOU CU MAI MULTA ATENTIE.');
                </script>";
        }
    }


?>

<?php

if(isset($_POST['submit1']))
    {
        $name = $_POST['nume-1']; // Get Name value from HTML Form
        $second_name= $_POST['prenume-1'];
        $email_id = $_POST['email-1']; // Get Email Value
        $phone_no = $_POST['telefon-1']; // Get Mobile No
        $msg = $_POST['mesaj-1']; // Get Message Value
         
        $to = "info@hobaecologic.ro"; // You can change here your Email
        $subject = "'$name $second_name' a trimis un email"; // This is your subject
         
        // HTML Message Starts here
        $message ="
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Nume: </strong></td>
                            <td style='width:400px'>$name  $second_name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email: </strong></td>
                            <td style='width:400px'>$email_id</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Telefon: </strong></td>
                            <td style='width:400px'>$phone_no</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mesaj: </strong></td>
                            <td style='width:400px'>$msg</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Admin <info@hobaecologic.ro>' . "\r\n"; // Give an email id on which you want get a reply. User will get a mail from this email id

         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
            echo "<script>
                    alert('Acest email a fost trimis cu succes. Iti multumim!');
                </script>";
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('ACESTY EMAIL NU A PUTUT FI TRIMIS. INCEARCA DIN NOU CU MAI MULTA ATENTIE.');
                </script>";
        }
    }


?>