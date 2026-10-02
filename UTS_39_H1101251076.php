<?php

abstract class ProdukBunga{
    protected $id,$nama,$hargaDasar;
    public function __construct($id,$nama,$harga){
        $this->id=$id;$this->nama=$nama;$this->hargaDasar=$harga;
    }
    public function getId(){return $this->id;}
    public function getNama(){return $this->nama;}
    public function getHargaDasar(){return $this->hargaDasar;}
    abstract public function hitungTotal();
    abstract public function getJenis();
}

class Potong extends ProdukBunga{
    private $tangkai;
    public function __construct($id,$nama,$harga,$t){
        parent::__construct($id,$nama,$harga);$this->tangkai=$t;
    }
    public function hitungTotal(){return $this->hargaDasar+2000*$this->tangkai;}
    public function getJenis(){return "Potong";}
}

class Buket extends ProdukBunga{
    private $tangkai;
    public function __construct($id,$nama,$harga,$t){
        parent::__construct($id,$nama,$harga);$this->tangkai=$t;
    }
    public function hitungTotal(){
        $t=$this->hargaDasar+5000*$this->tangkai;
        if($this->tangkai>3)$t*=0.9;
        return $t;
    }
    public function getJenis(){return "Buket";}
}

class Hias extends ProdukBunga{
    private $pot;
    public function __construct($id,$nama,$harga,$p){
        parent::__construct($id,$nama,$harga);$this->pot=$p;
    }
    public function hitungTotal(){return $this->hargaDasar+15000*$this->pot;}
    public function getJenis(){return "Hias";}
}

$data=[
    new Potong(1,"Pierre Tristan LamaRio",10000,3),
    new Buket(2,"Fuad",20000,5),
    new Hias(3,"Rusdi",30000,2),
    new Potong(4,"netanyahu",15000,4),
    new Buket(5,"jakobi",25000,2)
];

$total=0;
foreach($data as $b){
    $t=$b->hitungTotal();
    echo "ID: ".$b->getId()." | Nama: ".$b->getNama().
         " | Jenis: ".$b->getJenis()." | Harga: Rp".$b->getHargaDasar().
         " | Total: Rp".$t."<br>";
    $total+=$t;
}
echo "<br>Total Keseluruhan = Rp".$total;

?>