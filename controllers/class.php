<?php 

Class Panier{
    private $userId;
    private static $total;
    private const LIVRAISON = 5;
    private $bdr;
    public $nbItem;
    private int $totalItem = 0;
    private array $produits = [];

    public function __construct($userId){
        $this->userId = $userId;
    }
    public function addPanier($produit){
        $id = $produit['id'];
        $type = $produit['type'];
        $nb = count($this->produits);
        $count = $nb;
        for ($i= 0; $i < $nb; $i++){
            if(isset($this->produits[$i]['id']) && $this->produits[$i]['id']==$id && $this->produits[$i]['type'] == $type){
                $this->produits[$i]['nb'] += $produit['nb'];
            } else {
                $count -= 1;
            }
        }
        if ($count == 0){
            $this->produits[] = $produit;
        }
        $this->setTotalItem($this->getTotalItem()+1);
    }
    public function delProduits($produit){
        $id = $produit['id'];
        $type = $produit['type'];
        $nb = count($this->produits);
        for ($i= 0; $i < $nb; $i++){
            if(isset($this->produits[$i]['id']) && $this->produits[$i]['id']==$id && $this->produits[$i]['type'] == $type){
                if($this->produits[$i]['nb'] > 1){
                    $this->produits[$i]['nb'] -= 1;
                } elseif($this->produits[$i]['nb'] == 1){
                    array_splice($this->produits, $i);
                }
                $this->setTotalItem($this->getTotalItem()-1);
            }
        }
    }
    public function getUserId(){
        return $this->userId;
    }
    private function setTotalItem($ici){
        $this->totalItem = $ici;
    }
    public function setNbItem(){
        $this->nbItem = count($this->produits);
    }
    public function getTotalItem() {
        return $this->totalItem;
    }
    public function getNbItem(){
        return $this->nbItem;
    }
    public function getProduits(){
        return $this->produits;
    }

}