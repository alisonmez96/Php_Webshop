
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Werkstuk_Back-end Development</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Username</th> 
    <th>WachtWoord</th>
    <th>Delete</th>
  </tr>

<?php include_once 'Dao/LoginDao.php';
      foreach (LoginDao::getAll() as $admin) { ?>
<tr>
    <td><?php echo $admin->getLoginId() ?></td>
    <td><?php echo $admin->getUsername() ?></td>
    <td><?php echo $admin->getWachtwoord() ?></td>
   
    <td>
       <form action='DeleteAdmin.php' method='POST'>
      <input type='hidden' name='loginId' value="<?php echo $admin->getLoginId()?>">
      <input type='image' value='verwijderen 'src='img/remove.svg' id='removeButton' width="30" height="30">
    </form> 
   </td>
</tr>

<?php } ?>
</table>

<a href="Admin.php" id="btnProduct"> Terug naar admin</a>
</body>
</html>
