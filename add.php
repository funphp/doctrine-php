<?php
error_reporting(E_ALL);
require_once "bootstrap.php";
if($_POST){
   
    $user = new User();
$user->setName($_POST['name']);
$entityManager->persist($user);
$entityManager->flush();

echo "User Created Successfully";
}
?>
<html>
    <head>
        <title>Add new user-Dcotrine</title>
    </head>
    <body>
        <form method="post">

            <table>
                <tr>
                    <td>
                        Name
                    </td>
                    <td><input type="text" name="name"></td>

                </tr>
                
<tr>
                    <td colspan="2"><input type="submit" value="save"/></td>

                </tr>
            </table>

        </form>
    </body>
</html>
