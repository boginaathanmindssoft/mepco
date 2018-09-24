<?php
$static_path = base_url()."assets/site/";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <title>Feedback - Mepco</title>
    </head>
    <body>

    <table border="1">
        <tr>
           <td class="maillogo" colspan="2" align="center"><img src="<?php echo $static_path; ?>img/logo.png"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">Feedback From User</td>
        </tr>
        <tr>
            <td class="title">Name</td>
            <td><?php echo $feedback_user_name; ?></td>
        </tr>
        <tr>
            <td class="title">Phone number</td>
            <td><?php echo $phone; ?></td>
        </tr>
        <tr>
            <td class="title">Email</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td class="title">Company</td>
            <td><?php echo $company; ?></td>
        </tr>
        <tr>
            <td class="title">What is good about us?</td>
            <td><?php echo $good_about_us; ?></td>
        </tr>
        <tr>
            <td class="title">What we have to improve?</td>
            <td><?php echo $improve_msg; ?></td>
        </tr>
        <tr>
            <td class="title">Suggestions</td>
            <td><?php echo $suggestions; ?></td>
        </tr>
    </table>
    </body>
    </html>
