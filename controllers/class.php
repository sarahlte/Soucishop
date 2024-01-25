<?php 
Class Menu{
    private $id = false;
    private $nom;
    private $prix;
    private $image1;
    private $image2;
    private $image3;
    public function hydrate(array $props){
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method)) {
                    // On appelle le setter
                    $this->$method($value);
                    }
            }
        }
    }
    public function __construct($props = array()){
        $this->hydrate($props);
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrix($prix){
        $this->prix = $prix;
    }
    public function setImage1($image1){
        $this->image1 = $image1;
    }
    public function setImage2($image2){
        $this->image2 = $image2;
    }
    public function setImage3($image3){
        $this->image3 = $image3;
    }
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getImage1(){
        return $this->image1;
    }
    public function getImage2(){
        return $this->image2;
    }
    public function getImage3(){
        return $this->image3;
    }
}

Class Produit{
    private $id = false;
    private $nom;
    private $prix_achat;
    private $prix_vente;
    private $img1;
    private $img2;
    private $img3;
    public function hydrate(array $props){
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method)) {
                    // On appelle le setter
                    $this->$method($value);
                    }
            }
        }
    }
    public function __construct($props = array()){
        $this->hydrate($props);
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrix_achat($prix){
        $this->prix_achat = $prix;
    }
    public function setPrix_vente($prix){
        $this->prix_vente = $prix;
    }
    public function setImg1($image1){
        $this->img1 = $image1;
    }
    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrix_achat(){
        return $this->prix_achat;
    }
    public function getPrix_vente(){
        return $this->prix_vente;
    }
    public function getImg1(){
        return $this->img1;
    }
}

Class AlimentProduit{
    private $produit_id;
    private $aliment_id;
    public function hydrate(array $props){
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method)) {
                    // On appelle le setter
                    $this->$method($value);
                    }
            }
        }
    }
    public function __construct($props = array()){
        $this->hydrate($props);
    }
    public function setAliment_id($aliment_id){
        $this->aliment_id = $aliment_id;
    }
    public function setProduit_id($produit_id){
        $this->produit_id = $produit_id;
    }
    public function getAliment_id(){
        return $this->aliment_id;
    }
    public function getProduit_id(){
        return $this->produit_id;
    }
}

Class MenuProduit{
    private $produit_id;
    private $menu_id;
    public function hydrate(array $props){
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method)) {
                    // On appelle le setter
                    $this->$method($value);
                    }
            }
        }
    }
    public function __construct($props = array()){
        $this->hydrate($props);
    }
    public function setAliment_id($menu_id){
        $this->menu_id = $menu_id;
    }
    public function setProduit_id($produit_id){
        $this->produit_id = $produit_id;
    }
    public function getMenu_id(){
        return $this->menu_id;
    }
    public function getProduit_id(){
        return $this->produit_id;
    }
}

Class Commande{
    private $id;
    private $reference;
    private $date;
    private $prix_total;
    private $livraison;
    private $recu;
    private $nom;
    private $prenom;
    private $adresse;
    private $code_postal;
    private $ville;
    private $complement_d_adresse;
    public function hydrate(array $props){
        if (is_array($props) && count($props)) {
            foreach ($props as $key => $value) {
                // On récupère le nom du setter correspondant à l'attribut
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method)) {
                    // On appelle le setter
                    $this->$method($value);
                    }
            }
        }
    }
    public function __construct($props = array()){
        $this->hydrate($props);
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setReference($reference){
        $this->reference = $reference;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setPrix_total($prix){
        $this->prix_total = $prix;
    }
    public function setLivraison($livraison){
        $this->livraison = $livraison;
    }
    public function setRecu($recu){
        $this->recu = $recu;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setAdresse($adresse){
        $this->adresse=$adresse;
    }
    public function setCode_postal($cp){
        $this->code_postal = $cp;
    }
    public function setVille($ville){
        $this->ville=$ville;
    }
    public function setComplement_d_adresse($cda){
        $this->complement_d_adresse = $cda;
    }
    public function getId(){
        return $this->id;
    }
    public function getReference(){
        return $this->reference;
    }
    public function getDate(){
        return $this->date;
    }
    public function getPrix_total(){
       return $this->prix_total;
    }
    public function getLivraison(){
        return $this->livraison;
    }
    public function getRecu(){
       return $this->recu;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function getCode_postal(){
       return $this->code_postal;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getComplement_d_adresse($cda){
        return $this->complement_d_adresse = $cda;
    }
}
