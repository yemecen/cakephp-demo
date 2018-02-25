<?php

class ProductImportShell extends AppShell {
    /**
     * Veritabanın da bulunan products tablomuzun, modeli kullanmak icin $uses property e model adını yazıyoruz
     * Xml'i okuyup, tablomuza kaydecegiz
     */
    public $uses = array('Product');

    public function main() {
        $this->out('Veritabanına Import yapılacak xml in komut ve dosyanın yolunu(örn: Console\cake ProductImport import C:\simple.xml) yazınız');
    }

    //Xml ürünleri okuyup, veritabana kayıt
    public function import()
    {
    	$xmlPath = $this->args[0];

        $this->out($xmlPath);

        $xml = simplexml_load_file($xmlPath);
        
        foreach ($xml->product as $value) {

        	$this->Product->create();
        	$this->Product->save(Array(
								        'id' => $value->id,
								        'name' => $value->name,
								        'description' => $value->description,
								        'brandId' => $value->brandId,
								        'brandName' => $value->brandName,
								        'categoryId' => $value->categoryId,
								        'categoryName' =>  $value->categoryName,
								        'sku' => $value->sku,
								        'stock' => $value->stock,
								        'tax' => $value->tax,
								        'category' => $value->categories->category,
								        'image' => $value->images->image,
								        'price' => $value->price,
								        'priceNot' => $value->priceNot
								  	  )
        								
								);
        }

        $this->out("Xml'de bulunan veriler, veritabanına aktarıldı!");	
    }
}