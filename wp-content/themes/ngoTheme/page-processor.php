<?php 
get_header(); 
?>
<div class="body-container index-page">
    <div class="row-container">
    <?php 
        $requestPayload = file_get_contents("php://input"); 
        $object = json_decode($requestPayload); 


    
            $name = filter_var($object->name, FILTER_SANITIZE_STRING);
            $email = filter_var($object->email, FILTER_SANITIZE_EMAIL);
            $msg =  $object->msg;
            
            


            
            $headers = 'From: ' . $email;

            $msg="Contact Form \n Name: $name \n Email: $email \nMessage: $msg \n";

            echo($msg);
        
            $to='info@shahsatnamjigreens.co.nz';
            $sub="Contact Form";
            mail($to,$sub,$msg, $headers);

?>
    </div>
</div>
    

<?php 
    get_footer();
?> 

