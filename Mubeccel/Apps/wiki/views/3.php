<h3>View</h3>
<p>
Controller sınıfımızdan `View::load()` statik metodu ile View dosyalarımızı çağırırız. 
Ardından `Apps/Layouts/` dizini altında layout dosyamızı oluşturuyoruz örnek: 'main.php'. 
Layout dosyamızı düzenledikten sonra view'in gelmesi gereken yere aşağıdaki kodu eklemeliyiz.
</p>
<code><?php $text = "<?=View::render()?>"; echo htmlentities($text); ?>
</code>
<hr>
<p>
Controller tarafından view e değişken ulaştırabilmek için <code>View::$content[];</code> statik arrayi kullanabiliriz.
Örnek <code>View::$content["name"];</code>
</p>


<div class="container d-flex justify-content-around text-center">
    <?=View::$content['oncekiSayfa']?>
    <?=View::$content['sonrakiSayfa']?>
</div>