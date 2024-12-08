<!-- 
Bu kod Abdullahki.com [Abdullah Kıvrak] tarafından geliştirilmiştir. 
https://github.com/abdullahkitr0/Alan-Adi-Degeri-Hesaplayici [Github] Katkı yapmak isterseniz.
-->

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alan Adı Değeri Hesaplayıcı</title>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Alan Adı Değeri Hesaplayıcı</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="calculate.php">
                    <div class="mb-3">
                        <label class="form-label" for="domain">Alan Adı</label>
                        <input type="text" class="form-control" id="domain" name="domain" required placeholder="example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="monthly_income">Aylık Kazanç (TL)</label>
                        <input type="number" class="form-control" id="monthly_income" name="monthly_income" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="daily_hits">Günlük Hit</label>
                        <input type="number" class="form-control" id="daily_hits" name="daily_hits" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content_status">İçerik Durumu</label>
                        <select class="form-select" id="content_status" name="content_status">
                            <option value="unique">Tamamen Özgün</option>
                            <option value="partially_unique">Kısmen Özgün</option>
                            <option value="copied">Tamamen Kopya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="authority">Domain Otoritesi (0-100)</label>
                        <input type="number" class="form-control" id="authority" name="authority" min="0" max="100" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Değer Hesapla</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</body>
</html>
