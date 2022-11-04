<h3>Routing</h3>

<p>
    Mubeccel Routing yani yönlendirmeyi de destekliyor. Normalde parçalı url ler kullanırken
    <code>/home/index</code>, ya da <code>/wiki/page/2</code> gibi durumlarda Mubeccel otomatik olarak
    gideceğiniz controller ı ve fonksiyonu seçer. Ancak tek parçalı url olursa yani direk <code>/iletisim</code>
    gibi durumlarda anlaması mümkün değildir. Burada devreye routing sistemi girer. 
</p>

<p>
    <code>Mubeccel/Route.php</code> konumunda route olayını görebilirsiniz. 
    <pre>
    Statik fonksiyonun
    1. parametresi: tetikleyecek url, 
    2. parametresi: gideceğimiz controller,
    3. parametresi: çalışacak fonksiyon.
    </pre>
</p>


<div class="container d-flex justify-content-around text-center">
    <?=View::$content['oncekiSayfa']?>
    <?=View::$content['sonrakiSayfa']?>
</div>