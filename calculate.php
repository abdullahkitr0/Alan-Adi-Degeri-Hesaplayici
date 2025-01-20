<!-- 
Bu kod Abdullahki.com [Abdullah Kıvrak] tarafından geliştirilmiştir. 
https://github.com/abdullahkitr0/Alan-Adi-Degeri-Hesaplayici [Github] Katkı yapmak isterseniz.
-->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $domain = filter_var($_POST['domain'], FILTER_SANITIZE_STRING);
    $monthly_income = floatval($_POST['monthly_income']);
    $daily_hits = intval($_POST['daily_hits']);
    $content_status = $_POST['content_status'];
    $authority = intval($_POST['authority']);

    // WHOIS API'sini kullanarak domain bilgilerini al
    $whois_api_url = "https://whois-psi-eight.vercel.app/$domain";
    
    // cURL ile API'ye istek gönder
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $whois_api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // HTTP kodunu kontrol et ve hata varsa bildir
    if ($http_code !== 200 || !$response) {
        die("Domain bilgileri alınamadı. Lütfen tekrar deneyin.");
    }

    $whois_data = json_decode($response, true);

    // Domain bilgilerini kontrol et
    if (!isset($whois_data['domain'])) {
        die("API tarafından bir hata döndürüldü. Domain bilgileri bulunamadı.");
    }

    // Domain bilgilerini al
    $domain_info = $whois_data['domain'];
    $created_date = isset($domain_info['created_date']) ? $domain_info['created_date'] : null;
    $tld = isset($domain_info['extension']) ? $domain_info['extension'] : null;

    // Domain yaşı hesapla
    $domain_age = 0;
    if ($created_date) {
        $created_timestamp = strtotime($created_date);
        $current_timestamp = time();
        $domain_age = floor(($current_timestamp - $created_timestamp) / (365 * 24 * 60 * 60)); // Yıl olarak yaş
    }

    // Aylık kazanç çarpanı
    $base_value = $monthly_income * 6;

    // Günlük hit etkisi
    $base_value += ($daily_hits > 10000) ? 5000 : (($daily_hits > 1000) ? 2000 : 500);

    // İçerik durumu etkisi
    $base_value *= ($content_status == 'unique') ? 1.5 : (($content_status == 'partially_unique') ? 1.2 : 0.8);

    // Domain otoritesi etkisi
    $base_value += $authority * 50;

    // Domain yaşı etkisi
    $base_value += ($domain_age > 10) ? 3000 : ($domain_age * 200);

    // TLD etkisi
    $base_value *= ($tld === 'com') ? 1.2 : 1;

    // Tabler.io stiliyle sonuçları göster
    echo "
      <link href='https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css' rel='stylesheet'>
    <div class='container py-4'>
        <div class='card'>
            <div class='card-header'>
                <h2 class='card-title'>Değerlendirme Sonuçları</h2>
            </div>
            <div class='card-body'>
                <ul class='list-group list-group-flush'>
                    <li class='list-group-item'><strong>Domain:</strong> $domain</li>
                    <li class='list-group-item'><strong>Domain Yaşı:</strong> $domain_age yıl</li>
                    <li class='list-group-item'><strong>Domain Uzantısı:</strong> .$tld</li>
                    <li class='list-group-item'><strong>Hesaplanan Değer:</strong> " . number_format($base_value, 2) . " TL</li>
                </ul>
            </div>
            <div class='card-footer text-end'>
                <a href='index.php' class='btn btn-primary'>Yeni Bir Değerlendirme Yap</a>
            </div>
        </div>
    </div>";
}
?>
