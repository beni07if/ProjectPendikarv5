<?php


class Produk
{
    public    $judul,
        $penulis,
        $penerbit,
        $harga;

    public function __construct($judul, $penulis, $penerbit = "haha", $harga = "hai")
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }
    public function getLable()
    {
        return "$this->penulis, $this->penerbit";
    }
}

class Cetak
{
    public function haha($produk)
    {
        $str = "{$produk->judul} | {$produk->getLable()} (Rp. {$produk->harga})";
        return $str;
    }
}

$produk1 = new Produk("ini judul", "ini penulis", "ini penerbit", "ini yang akan dikirim ke construct");
$produk2 = new Produk("boleh membuat banyak objek dari satu class", "yang dikirim hanya judul dan penulis");

echo "mantap :" . $produk1->getLable();
echo "<br>";
echo "oke :" . $produk2->getLable();
// tanda () diugunakan karna dia method atau function, kalau properti tidak / langsung ;

$infoProduk = new Cetak();
echo $infoProduk->haha($produk1);
