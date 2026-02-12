# OpenCart Front-End Sənədləşməsi (Azərbaycan dili)

Bu sənəd hazırkı layihə strukturuna (`htdocs/`) uyğun hazırlanıb və front hissədə işləyərkən lazım olan əsas `Twig` tag-ları, bölmə (section) idarəsi, static page/CTA əlavə etmə və hostinqə köçürmə addımlarını əhatə edir.

## 1) Front üçün əsas fayl yolları

- `htdocs/catalog/view/template/common/header.twig`
- `htdocs/catalog/view/template/common/footer.twig`
- `htdocs/catalog/view/template/product/thumb.twig`
- `htdocs/catalog/view/template/product/product.twig`
- `htdocs/catalog/view/template/product/category.twig`
- `htdocs/catalog/view/template/account/account.twig`

Bu fayllar front görünüşünün əsas skeletini təşkil edir.

## 2) Ən vacib Twig tag-ları (front)

Aşağıdakı tag-lar OpenCart front üçün praktik olaraq ən çox istifadə olunanlardır.

### 2.1) Global layout tag-ları (demək olar bütün səhifələrdə)

- `{{ header }}`
- `{{ footer }}`
- `{{ column_left }}`
- `{{ column_right }}`
- `{{ content_top }}`
- `{{ content_bottom }}`
- `{{ breadcrumbs }}` loop ilə:
  - `{{ breadcrumb.href }}`
  - `{{ breadcrumb.text }}`

### 2.2) Header tag-ları (`common/header.twig`)

- SEO/meta:
  - `{{ title }}`
  - `{{ description }}`
  - `{{ keywords }}`
  - `{{ base }}`
- Texniki/UI:
  - `{{ direction }}`, `{{ lang }}`
  - `{{ jquery }}`, `{{ bootstrap }}`, `{{ icons }}`, `{{ stylesheet }}`
  - `{{ styles }}`, `{{ scripts }}`, `{{ links }}`
  - `{{ analytics }}`
- Top bar və account:
  - `{{ currency }}`, `{{ language }}`
  - `{{ contact }}`, `{{ telephone }}`
  - `{{ logged }}`
  - `{{ register }}`, `{{ login }}`, `{{ logout }}`
  - `{{ account }}`, `{{ order }}`, `{{ transaction }}`, `{{ download }}`
- Mağaza naviqasiyası:
  - `{{ wishlist }}`, `{{ compare }}`
  - `{{ shopping_cart }}`, `{{ checkout }}`
  - `{{ search }}`, `{{ cart }}`, `{{ menu }}`
  - `{{ home }}`, `{{ logo }}`, `{{ name }}`

### 2.3) Footer tag-ları (`common/footer.twig`)

- İnformasiya və xidmət:
  - `{{ informations }}` loop:
    - `{{ information.href }}`
    - `{{ information.title }}`
  - `{{ blog }}`, `{{ gdpr }}`
  - `{{ contact }}`, `{{ return }}`, `{{ sitemap }}`
- Əlavə bölmələr:
  - `{{ manufacturer }}`, `{{ affiliate }}`, `{{ special }}`
- Hesab:
  - `{{ account }}`, `{{ order }}`, `{{ wishlist }}`, `{{ newsletter }}`
- Aşağı hissə:
  - `{{ powered }}`
  - `{{ cookie }}`

### 2.4) Product (məhsul) tag-ları

#### Məhsul kartı (`product/thumb.twig`)

- Əsas:
  - `{{ href }}`, `{{ thumb }}`, `{{ name }}`, `{{ description }}`
- Qiymət:
  - `{{ price }}`, `{{ special }}`, `{{ tax }}`, `{{ text_tax }}`
- Reytinq:
  - `{{ review_status }}`, `{{ rating }}`
- Action URL-lər:
  - `{{ cart_add }}`, `{{ wishlist_add }}`, `{{ compare_add }}`
  - `{{ cart }}` (AJAX load üçün)
- Digər:
  - `{{ product_id }}`, `{{ minimum }}`

#### Məhsul detalı (`product/product.twig`)

- Məhsul məlumatı:
  - `{{ heading_title }}`
  - `{{ manufacturer }}`, `{{ manufacturers }}`
  - `{{ model }}`, `{{ stock }}`, `{{ reward }}`
  - `{{ product_codes }}` loop (SKU/EAN və s.)
- Qiymət və endirim:
  - `{{ price }}`, `{{ special }}`, `{{ tax }}`, `{{ points }}`
  - `{{ discounts }}` loop
- Seçimlər (options):
  - `{{ options }}` və alt dəyərlər (`option_value.*`)
- Səbət əməliyyatı:
  - `{{ button_cart }}`, `{{ minimum }}`, `{{ product_id }}`
- Tab-lar:
  - `{{ description }}`
  - `{{ attributes }}` loop
  - `{{ review }}`
  - `{{ related }}`
  - `{{ tags }}` loop (`{{ tag.href }}`, `{{ tag.tag }}`)

### 2.5) Account tag-ları (`account/account.twig`)

- Əsas:
  - `{{ text_my_account }}`, `{{ success }}`
- Profil linkləri:
  - `{{ edit }}`, `{{ password }}`, `{{ payment_method }}`, `{{ address }}`, `{{ wishlist }}`
- Sifarişlər:
  - `{{ order }}`, `{{ subscription }}`, `{{ download }}`, `{{ reward }}`, `{{ return }}`, `{{ transaction }}`
- Affiliate/newsletter:
  - `{{ affiliate }}`, `{{ tracking }}`, `{{ newsletter }}`

## 3) Static page necə əlavə edilir?

### 3.1) Admin paneldən (ən doğru və tez yol)

1. Admin panelə daxil olun.
2. `Catalog > Information` bölməsinə keçin.
3. Yeni static səhifə yaradın (`Title`, `Description`, SEO keyword və s.).
4. `Bottom` aktivdirsə footer-də avtomatik görünəcək (`common/footer.twig` içində `informations` loop-u ilə).
5. SEO URL aktivdirsə slug verin.

### 3.2) Front-da göstərmək üçün xüsusi link

Əgər xüsusi yerə çıxarmaq istəyirsinizsə:

- `header.twig` və ya `footer.twig`-də birbaşa link əlavə edin.
- Məsələn route formatı: `index.php?route=information/information&information_id=ID`

## 4) Static section və CTA section necə əlavə edilir?

OpenCart-da section məntiqi adətən `Layout + Module + Position` ilə idarə olunur.

### 4.1) No-code üsul (HTML Content modulu)

1. `Extensions > Extensions > Modules > HTML Content` bölməsindən yeni blok yaradın.
2. CTA məzmununu (başlıq, mətn, button) daxil edin.
3. `Design > Layouts` bölməsində uyğun route seçin:
   - Ana səhifə: `common/home`
   - Kateqoriya: `product/category`
   - Məhsul detalı: `product/product`
4. Position seçin:
   - `content_top`
   - `content_bottom`
   - `column_left`
   - `column_right`

### 4.2) Code ilə xüsusi CTA section

1. Controller yaradın: `catalog/controller/extension/module/your_cta.php`
2. Twig yaradın: `catalog/view/template/extension/module/your_cta.twig`
3. Language faylı yaradın: `catalog/language/en-gb/extension/module/your_cta.php`
4. Sonra Layout-a modul kimi bağlayın.

Bu yanaşma ilə CTA dinamik (məsələn məhsula görə dəyişən) ola bilər.

## 5) “Bütün faylları `htdocs`-dan `public_html`-a və `opencart.sql`-i phpMyAdmin-ə yükləyəcəyəm” – sonra nə etməli?

Sizin ssenari üçün düzgün ardıcıllıq:

1. `htdocs` içindəki bütün faylları hostinqdə `public_html/` qovluğuna yükləyin.
2. `opencart.sql` faylını phpMyAdmin ilə yeni DB-yə import edin.
3. Bu 2 faylı redaktə edin:
   - `htdocs/config.php`
   - `htdocs/admin/config.php`
4. DB parametrlərini hostinq məlumatları ilə dəyişin:
   - `DB_HOSTNAME`
   - `DB_USERNAME`
   - `DB_PASSWORD`
   - `DB_DATABASE`
   - `DB_PORT` (çox vaxt `3306`)
   - `DB_PREFIX` (`oc_` qalmalıdır, SQL də bu prefix-lə gəlir)
5. `DIR_*` yollarını adətən dəyişməyə ehtiyac yoxdur (bu build-də avtomatik hesablanır).
6. SEO URL üçün `public_html/.htaccess` faylının mövcud olduğuna əmin olun (bu layihədə artıq var).
7. Fayl icazələri:
   - Qovluqlar: `755`
   - Fayllar: `644`
   - `system/storage/` yazıla bilən olmalıdır
8. Admin-ə daxil olub:
   - `System > Settings > Server` bölümündə `Use SEO URL` aktiv edin
   - Mağaza URL-lərini (HTTP/HTTPS) yoxlayın
9. Cache təmizləyin:
   - `Dashboard > Developer Settings` və ya uyğun cache bölməsindən
10. SSL varsa hostinqdə sertifikatı aktiv edin və saytı `https://` ilə test edin.

## 6) İstənilən hostinqdə stabil işləməsi üçün minimum checklist

- PHP: `>= 8.0.2` (praktik olaraq 8.1/8.2 tövsiyə)
- MySQL/MariaDB işlək
- PHP extension-lar: `curl`, `gd`, `zip`, `mysqli`, `mbstring`, `openssl`
- `mod_rewrite` (Apache istifadə edilirsə)
- Cron istifadə olunacaqsa server cron düzgün qurulmalıdır

## 7) Sürətli debug məsləhəti

Deploy sonrası boş səhifə/xəta varsa:

1. `system/storage/logs/` içində log-ları yoxlayın.
2. `config.php` və `admin/config.php` DB dəyərlərini yenidən yoxlayın.
3. Domain/path dəyişibsə cache təmizləyin.
4. `.htaccess` aktiv və rewrite işləkdir yoxlayın.

---

Əgər istəsəniz növbəti addımda sizə ayrıca “ready-to-use” `CTA section` üçün nümunə modul skeleton-u da yarada bilərəm.
