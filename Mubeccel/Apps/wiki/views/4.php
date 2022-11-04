<h3>Model</h3>
<p>
Model, veritabanı ve Controller arasında köprü görevi gören kısımdır. 
<code>Mubeccel/Core/Config.php</code> içinde mysql giriş bilgilerini değiştirebilirsiniz.
Ben sql injectiondan korunmak için 
<a class="text-success" href="https://www.phpr.org/pdo-mysql-veritabani-sinifi/">phpr - Veritabanı Sınıfı</a> nı
hazır olarak bağladım. Örnek Model Class ımızı da oluşturuyoruz. 
</p>
<code>
    <pre>
class homeModel extends Model{

    public static function get_helloworld(){
        return "hello world";
    }
}
    </pre>

</code>
<hr>
<p>
Controller kısmından rahatça <code>homeModel::get_helloworld();</code> diyerek çağırabilmek için
statik oluşturduk.
</p>


<div class="container d-flex justify-content-around text-center">
    <?=View::$content['oncekiSayfa']?>
    <?=View::$content['sonrakiSayfa']?>
</div>