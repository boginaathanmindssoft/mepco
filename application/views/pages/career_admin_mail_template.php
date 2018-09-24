<?php
$static_path = base_url()."assets/site/";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <title>Careers - Mepco</title>
    </head>
    <body>
    <style>
        table{
            border-collapse:collapse;
            border-color: #ccc;
            width: 50%;

        }
        td{
            width: 50%;
            padding: 3%;
            word-break: break-word;
        }
        .title{
            background-color: #f5f5f5;
        }
        .maillogo{
            background-color: #ccc;
        }
    </style>

    <table border="1">
        <tr>
            <td class="maillogo" colspan="2" align="center"><img src="<?php echo $static_path; ?>img/logo.png"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">Applying for <?php echo $job_position; ?></td>
        </tr>
        <tr>
            <td class="title">Name</td>
            <td><?php echo $career_name; ?></td>
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
            <td class="title">Description</td>
            <td><?php echo $user_message; ?></td>
        </tr>
    </table>
</body>
</html>
