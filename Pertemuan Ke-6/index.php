<?php

interface Bentuk
{
    public function hitungLuas();
}

class Persegi implements Bentuk
{
    private $sisi;

    public function __construct($sisi)
    {
        $this->sisi = $sisi;
    }

    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }
}

class Lingkaran implements Bentuk
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function hitungLuas()
    {
        return 3.14 * $this->radius * $this->radius;
    }
}

$bentuk = [
    new Persegi(5),
    new Lingkaran(7)
];

foreach ($bentuk as $item) {
    if ($item instanceof Persegi) {
        echo "Luas Persegi (sisi=5): " . $item->hitungLuas() . "<br>";
    } elseif ($item instanceof Lingkaran) {
        echo "Luas Lingkaran (radius=7): " . $item->hitungLuas() . "<br>";
    }
}

?>