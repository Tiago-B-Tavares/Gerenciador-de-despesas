
<?php
class MensagensUser{
public function msgUser()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $horaDia = date('H');
        if ($horaDia >= 6 && $horaDia < 12) {
            return  "Bom dia, " ;
        }if($horaDia >= 12 && $horaDia < 18){
            return  "Boa tarde, " ;
        }if($horaDia >= 18){
            return  "Boa noite, " ;
        }
    }
}
    ?>