<?php



    if(isset($_POST['suma'])){
        if(isset($_POST['num1']) && isset($_POST['num2'])){
            if(is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
                $solucion = $_POST['num1'] + $_POST['num2'];

                $mensaje = $_POST['num1'] .' + '.$_POST['num2']. ' = ' .$solucion;







            }else{
                $error = 'Ambos campos deben ser numeros';
            }


        }else{

            $error = 'No has rellenedo alguno de los campos';
            


        }
    }

    if(isset($_POST['resta'])){
        if(isset($_POST['num1']) && isset($_POST['num2'])){
            if(is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
                $solucion = $_POST['num1'] - $_POST['num2'];

                $mensaje = $_POST['num1'] .' - '.$_POST['num2']. ' = ' .$solucion;







            }else{
                $error = 'Ambos campos deben ser numeros';
            }


        }else{

            $error = 'No has rellenedo alguno de los campos';
            


        }
    }



    if(isset($_POST['multiplicacion'])){
        if(isset($_POST['num1']) && isset($_POST['num2'])){
            if(is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
                $solucion = $_POST['num1'] * $_POST['num2'];

                $mensaje = $_POST['num1'] .' * '.$_POST['num2']. ' = ' .$solucion;







            }else{
                $error = 'Ambos campos deben ser numeros';
            }


        }else{

            $error = 'No has rellenedo alguno de los campos';
            


        }
    }




    if(isset($_POST['division'])){
        if(isset($_POST['num1']) && isset($_POST['num2'])){
            if(is_numeric($_POST['num1']) && is_numeric($_POST['num2'])){
                
                if($_POST['num2'] == 0){

                    $error = 'No se puede dividir entre 0';
                }else{

                    $solucion = $_POST['num1'] / $_POST['num2'];

                    $mensaje = $_POST['num1'] .' / '.$_POST['num2']. ' = ' .$solucion;
    
                }
                
               






            }else{
                $error = 'Ambos campos deben ser numeros';
            }


        }else{

            $error = 'No has rellenedo alguno de los campos';
            


        }
    }
    

?>