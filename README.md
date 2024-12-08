# Domain Değeri Hesaplama Scripti

Bu proje, bir alan adının tahmini değerini hesaplayan bir PHP tabanlı uygulamadır. 
Domain bilgileri WHOIS API'den alınarak, çeşitli kriterlere göre hesaplanan sonuçlar kullanıcıya sunulur.

## Özellikler:
1. **WHOIS API Entegrasyonu**: Domain yaşı ve uzantı bilgileri otomatik olarak API üzerinden alınır.
2. **Kriterlere Göre Değerleme**:
   - Aylık kazanç çarpanı (6 kat)
   - Günlük hit
   - İçerik durumu (özgün, kopya vs.)
   - Domain yaşı ve uzantı etkisi
   - Domain otoritesi
3. **Şık Tasarım**: Tabler.io CSS kullanılarak modern ve responsive bir arayüz oluşturulmuştur.

## Gereksinimler:
- PHP 7.4 veya üstü
- cURL desteği etkinleştirilmiş PHP
- İnternet bağlantısı (API'ye erişim için)

## Kurulum:
1. Tüm proje dosyalarını web sunucusuna yükleyin.
2. Sunucunuzda `cURL` desteğinin etkinleştirildiğinden emin olun.
3. `index.php` dosyasını tarayıcınızda açarak scripti kullanmaya başlayabilirsiniz.

## Kullanım:
1. Kullanıcı, formda aşağıdaki bilgileri doldurur:
   - Domain Adı
   - Aylık Kazanç
   - Günlük Hit
   - İçerik Durumu
   - Domain Otoritesi
2. Gönderilen veriler WHOIS API'den alınan bilgilerle birleştirilir.
3. Sistem, verilen kriterlere göre domainin tahmini değerini hesaplar ve kullanıcıya sonuçları sunar.

## Dosyalar:
- **index.php**: Kullanıcı arayüzünü sunar ve veri toplar.
- **calculate.php**: Hesaplama ve API entegrasyonu işlemlerini gerçekleştirir.
- **README.txt**: Bu dosya, proje hakkında bilgi verir.

## WHOIS API:
Bu proje için kullanılan API: https://who-dat.as93.net/url  
API'den alınan veriler JSON formatındadır ve aşağıdaki gibi bir yapıdadır:

```json
{
  "domain": {
    "id": "2816316592_DOMAIN_COM-VRSN",
    "domain": "abdullahki.com",
    "created_date": "2023-09-23T15:56:17Z",
    "extension": "com"
  }
}
```
## Yazar:
Bu kod Abdullahki.com [Abdullah Kıvrak] tarafından geliştirilmiştir. 
https://github.com/abdullahkitr0/Alan-Adi-Degeri-Hesaplayici [Github] Katkı yapmak isterseniz.
