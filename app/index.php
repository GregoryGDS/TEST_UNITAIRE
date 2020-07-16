<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TP - User</title>
    </head>
  
    <body>

        <? 
        include 'User.php';

        if(isset($_POST['operation'])){
            $value_op = $_POST['operation'];
            //echo $value_op;
        }
        ?>
        <form name="formulaire" method="post" action="index.php">
            <p>Nom:<input name="nom" type="text" value="<?if(isset($_POST['nom'])){echo $_POST['nom'];}?>"></p>
            <p>Prénom:<input name="prenom" type="text" value="<?if(isset($_POST['prenom'])){echo $_POST['prenom'];}?>"></p>
            <p>Email:<input name="email" type="email" value="<?if(isset($_POST['email'])){echo $_POST['email'];}?>"></p>
            <p>Age:<input name="age" type="number" value="<?if(isset($_POST['age'])){echo $_POST['age'];}?>"></p>


            <input type="submit" value="Envoyer">
            <input type="reset" value="effacer"><br>

        </form>
    

        <?php
        if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['age'])) 
        {
            $nom =$_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $age = $_POST['age'];

            if($nom != null and $prenom != null and $email  != null and $age != null){
                $insert = new User($nom, $prenom, $email, $age);

                if($insert->isValid()){
                    foreach($insert->gets() as $info){
                        echo $info."<br>";
                    }
                }else{
                    echo 'Champs non conforme';
                }
                
            }else{
                echo 'Veuillez renseigner tous les champs.';
            }
        }

        ?>
    </body>
</html>