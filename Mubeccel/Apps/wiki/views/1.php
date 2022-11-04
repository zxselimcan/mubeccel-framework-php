<h3>Nasıl Çalışır ?</h3>
<p>
    Çalışması için htaccess ve php7 desteğine ihtiyacınız var.
    Benim kullandığım htaccess burada buyrun
    <pre>
    RewriteEngine on
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [QSA,L]
    </pre>
    <hr>
    <h4>Kurulum</h4>
    İndirdiğiniz dosyaları yanyana çıkartın public_html/ in ismi önemli değil o web dizinine gelmeli ancak diğerini değiştirmemelisiniz ! 
    <hr>
</p>
<p>
    Geliştirmek istediğimiz web uygulamasını modüllere ayırıp ( Home, User, Admin, Editor) gibi.
    Her modül için '<span class="text-danger">Mubeccel/Apps/</span>' dizini altında 
    klasörünü açmalıyız. Dizin yapısı Aşağıdakine benzer olmalıdır.
</p>

<ul class="bg-warning col-6 rounded container">
    <li>
        <span>Apps/</span>
        <ul>
            <li>
                home/
                <ul>
                    <li>
                        Views/
                    </li>
                    <li>
                        homeController.php   
                    </li>
                    <li>
                        homeModel.php
                    </li>
                </ul>
            </li>
            <li>
                wiki/
            </li>
        </ul>
    </li>
</ul>

<p>
    Url Yapımız : localhost/controller/action/parametre
     (parametre zorunlu değil, ileride göreceğiz).
</p>


<div class="container d-flex justify-content-around text-center">
    <?=View::$content['oncekiSayfa']?>
    <?=View::$content['sonrakiSayfa']?>
</div>