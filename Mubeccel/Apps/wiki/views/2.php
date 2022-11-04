<h3>Controller</h3>
<p>
    
homeController.php dosyasını oluşturduktan sonra içinde `homeController` sınıfını tanımlıyoruz.

<pre><code>
<?php
$text = '
<?php
    class homeController{
        //
    }
?>';
echo htmlentities($text);
?>
</code></pre>
</p>

<p>
    Burada Controller sınıfının yeteneklerinden biraz bahsetmeliyim.
    Sınıfımızda çalışmasını istediğimiz her sayfanın fonksiyonunu eklemeliyiz.
    Yani '/home/index' e gitmek istiyorsak homeController' da index adında bir fonksiyon
    oluşturmalıyız.  
    Bunu yaparken;
    <pre><code>
<?php
$text = '
<?php
class homeController{
    
    public function index($param){
        return View::load("main", "index");
    }

}
?>'; echo htmlentities($text);
?>
</code></pre>
</p>
<p>
    $param değeri opsiyoneldir. İhtiyaç yoksa (pagination vs) burada bu şekilde tanımlamak yerine index() diyerek de geçebiliriz.
</p>
<hr>
<p>
    <code>return View::load("main", "index");</code>
    kısmında <code>load($layoutName, $viewName)</code> olarak çalışır. Esnek bir şekilde hem layout hem de
    view i buradan editleyebiliriz.
</p>



<div class="container d-flex justify-content-around text-center">
    <?=View::$content['oncekiSayfa']?>
    <?=View::$content['sonrakiSayfa']?>
</div>