        <!-- Contact Section -->
    
    <div class="container-fluid jumbotron">
            <h1 style="text-align:center;" class="lead"> Contact </h1>
            <p style="text-align:center;">Please feel free to say hello! </p>

            <?php 

                //Check for header injections
                function has_header_injection($str) {
                    return preg_match("/[\r\n]/", $str);

            }

                // Check to see if the Contact Submit was pressed 
                if (isset($_POST["contact_submit"])) {

                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $msg = $_POST['message'];
                
                // Check to see if $name or $email have header injections

                if (has_header_injection($name) || has_header_injection($email)) {
                    die(); // IF true, will quit script
                }

                // Add a recipient email to a variable 
                $to = "deaundrie7@gmail.com";

                //Create a subject 
                $subject = "$name sent you a message via your portfolio\'s contact form";

                //Construct the message
                $message  = "Name: $name\r\n";
                $message .= "Email: $email\r\n";
                $message .= "Message: $message\r\n";

                $message = wordwrap($message, 72);

                // Set the mail header into a variable
                $headers = "MIME-Verson: 1.0\r\n";
                $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                $headers .= "From: $name <$email> \r\n";
                $headers .= "X-Priority: 1\r\n";
                $headers .= "X-MSMail-Priority: High\r\n\r\n";

                // Send the email!!

                mail($to, $subject, $message, $headers)
            ?>
            <h5> Thank you for contacting me! </h5>
            <br/>
            <p> Please allow 24 hours for a response. </p>
            <p><a href="../../index.html"> Back to Home Page </a></p>
            <?php } else { ?>