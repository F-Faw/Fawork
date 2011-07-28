<?php
/*
 * Classe parente à tous les modèles
 * Elle permet de faire disposer à ses classes filles
 * des outils nécéssaire au bon fonctionnement de l'appli
 * Auteur : RezA
*/

class Model {

    protected $haveTable;
    protected $Db;
    protected $testage;

    public function __construct(){
        $this->Db = Sg::$Db;
    }

    public function find($condition=false,$forme='array',$order=false,$rec='*') {
        if($this->haveTable) {
            $requete = 'SELECT '.$rec.' FROM '.$this->haveTable.(!empty($condition) ? ' WHERE '.$condition : '').(!empty($order) ? ' ORDER '.$order : '');
            $requete = $this->Db->query($requete);
            if($forme=='array') {
                $return = $requete;
            }
            else {
                preg_match_all('#\{(.*)\}#U',$forme,$search,PREG_PATTERN_ORDER);
                while($rect = $requete->fetchObject()) {
                    for($i=0; $i < count($search[1]); $i++) {
                        if(empty($dernier_return)) {
                            $dernier_return = str_replace($search[0][$i],$rect->$search[1][$i],$forme);
                        }
                        else {
                            $dernier_return = str_replace($search[0][$i],$rect->$search[1][$i],$dernier_return);
                        }
                    }
                    $return .= $dernier_return."\n";
                    unset($dernier_return);
                }
            }
        }
        else {
            $return = 'Erreur : Aucune table associée au module. ;)';
        }
        return $return;
    }

}
?>
