<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TP - Calculatrice</title>
    </head>
  
    <body>

        <? 
        include 'calculatrice/calculatrice.php';

        if(isset($_POST['operation'])){
            $value_op = $_POST['operation'];
            //echo $value_op;
        }
        ?>
        <form name="formulaire" method="post" action="index.php">
            <p>nombre1:<input name="nombre1" type="text" value="<?if(isset($_POST['nombre1'])){echo $_POST['nombre1'];}?>"></p>
            <p>nombre2:<input name="nombre2" type="text" value="<?if(isset($_POST['nombre2'])){echo $_POST['nombre2'];}?>"></p>

            <select name="operation">
                <option value="addition" selected = "<?if($value_op == 'addition'){ echo 'selected';}?>">+</option>
                <option value="soustraction" selected = "<?if($value_op == 'soustraction'){ echo 'selected';}?>">-</option>
                <option value="division" selected = "<?if($value_op == 'division'){ echo 'selected';}?>">/</option>
                <option value="multiplication" selected = "<?if($value_op == 'multiplication'){ echo 'selected';}?>">*</option>
            </select>

            <input type="submit" value="calculer">
            <input type="reset" value="effacer"><br>

        </form>
    

        <?php
        if(isset($_POST['nombre1']) and isset($_POST['nombre2']) and isset($_POST['operation'])) 
        {
            $nombre1 =$_POST['nombre1'];
            $nombre2 = $_POST['nombre2'];
            $operation = $_POST['operation'];
        
            if($nombre1 != null and $nombre2 != null){
                $result = new Calculatrice($nombre1, $nombre2);
                
                if($operation == 'addition'){
                    $resultat = $result->add();
                    $phrase = "La somme";
                }
                
                if($operation == 'soustraction'){
                    $resultat = $result->sub();
                    $phrase = 'La différence';
                }
                
                if($operation == 'multiplication'){  
                    $resultat = $result->mul();
                    $phrase = 'Le produit';
                }
            
                if($operation == 'division'){
                    if($nombre2 == 0){
                        echo 'Division par 0 impossible';
                        exit();
                    }
                    $resultat = $result->div();
                    $phrase = 'Le quotient';
                }

                echo $phrase.' de ces deux nombres est '.$resultat;
                
            }else{
                echo 'Veuillez renseigner tous les champs.';
            }
        }

        ?>
    </body>
</html>