# OpenCart-Customized Frontend + Admin İstifadə README

Bu sənəd bu layihəyə yeni qoşulan developer üçündür.
Məqsəd: tətbiqin ümumi quruluşunu, hansı dizaynın haradan dəyişdiyini və admin tərəfdə necə idarə olunduğunu bir yerdə, sadə dildə göstərmək.

---

## 1) Layihə nə edir? (Qısa ümumi şəkil)

Bu repo OpenCart 4 bazasında qurulmuş e-commerce layihəsidir.
Əsas xüsusiyyətlər:

- Home səhifə `Section Builder` modulu ilə hissə-hissə idarə olunur
- Product, Category, Checkout, Account, Blog, Information səhifələri OpenCart core route-ları ilə işləyir
- Guest wishlist üçün localStorage dəstəyi var (login məcburiyyəti yoxdur)
- Coupon kodları cart/checkout axınında işləyir
- Register/Login/Newsletter axınları AJAX ilə işləyir

Əsas layihə kökü:

- OpenCart core + custom kodlar: `documents/`
- Bu README (developer sənədi): repo root `README.md`

---

## 2) Tez start: Hansı hissə haradan idarə olunur?

### Home səhifə (section-based)

- Front route: `common/home`
- Main view: `documents/catalog/view/template/common/home.twig`
- Section render mexanizmi: `documents/extension/opencart/catalog/controller/module/section.php`
- Section template-ləri: `documents/catalog/view/template/sections/*.twig`
- Admin section formu: `documents/extension/opencart/admin/controller/module/section.php`
- Admin UI: `documents/extension/opencart/admin/view/template/module/section.twig`

### Product dizaynı

- Category listing page: `documents/catalog/view/template/product/category.twig`
- Product card (grid/list kart): `documents/catalog/view/template/product/thumb.twig`
- Product detail page: `documents/catalog/view/template/product/product.twig`
- Related products wrapper: `documents/catalog/view/template/product/related.twig`

### Blog dizaynı

- Blog list page: `documents/catalog/view/template/cms/blog.twig`
- Blog detail page: `documents/catalog/view/template/cms/blog_info.twig`
- Home blog section card dizaynı: `documents/catalog/view/template/sections/bloglar.twig`

### Checkout dizaynı

- Checkout əsas skelet: `documents/catalog/view/template/checkout/checkout.twig`
- Checkout register bloku: `documents/catalog/view/template/checkout/register.twig`
- Checkout confirm (order summary): `documents/catalog/view/template/checkout/confirm.twig`
- Cart page: `documents/catalog/view/template/checkout/cart.twig`
- Cart list partial: `documents/catalog/view/template/checkout/cart_list.twig`
- Coupon accordion UI: `documents/extension/opencart/catalog/view/template/checkout/coupon.twig`

### Information (statik səhifələr)

- Information page front view: `documents/catalog/view/template/information/information.twig`
- Information controller: `documents/catalog/controller/information/information.php`
- Footer-dakı information link listi: `documents/catalog/controller/common/footer.php` + `documents/catalog/view/template/common/footer.twig`

### Login/Register/Newsletter

- Login: `documents/catalog/controller/account/login.php` + `documents/catalog/view/template/account/login.twig`
- Register: `documents/catalog/controller/account/register.php` + `documents/catalog/view/template/account/register.twig`
- Newsletter: `documents/catalog/controller/account/newsletter.php` + `documents/catalog/view/template/account/newsletter.twig`

### Global stil/script

- Global CSS: `documents/catalog/view/stylesheet/stylesheet.css`
- Global JS: `documents/catalog/view/javascript/common.js`
- Header include point: `documents/catalog/controller/common/header.php` + `documents/catalog/view/template/common/header.twig`

---

## 3) Cari Home səhifədə hansı section-lar var?

SQL dump-a görə (`opencart.sql`) Home layout (`layout_id = 1`) üzərində bu section modulları var:

1. `opencart.section.15` -> `banner`
2. `opencart.section.7` -> `ustunlukler`
3. `opencart.section.8` -> `mehsullarimiz`
4. `opencart.section.10` -> `haqqimizda`
5. `opencart.section.11` -> `bloglar`
6. `opencart.section.13` -> `partnyorlar`
7. `opencart.section.14` -> `cta`

Uyğun Twig faylları:

- `documents/catalog/view/template/sections/banner.twig`
- `documents/catalog/view/template/sections/ustunlukler.twig`
- `documents/catalog/view/template/sections/mehsullarimiz.twig`
- `documents/catalog/view/template/sections/haqqimizda.twig`
- `documents/catalog/view/template/sections/bloglar.twig`
- `documents/catalog/view/template/sections/partnyorlar.twig`
- `documents/catalog/view/template/sections/cta.twig`

Qeyd:

- `section.php` route check edir, yalnız `common/home` üçün render edir.
- Yəni module layout-da olsa da section home-dan kənarda görünməyəcək.

---

## 4) Admin paneldən nələr necə idarə olunur?

### 4.1. Section Builder istifadəsi

Admin path:

- `Extensions -> Extensions -> Modules -> Section`

Burada hər modul üçün:

- `Name`
- `Section Type` (homepage_slider, advantages, products, cta, about, blog, partners, legacy_html)
- `Template Slug`
- `Typed Fields`
- `Typed Items`
- `Custom Fields`
- `Custom Repeaters`
- `Status`

Sonra həmin modulu layout-a yerləşdirirsən:

- `Design -> Layouts -> Home`
- Position: adətən `content_top`
- Sort order ilə sıralama verilir

### 4.2. Product idarəetməsi

Admin path:

- `Catalog -> Products`

Buradan dəyişilən data frontda görünür:

- ad, təsvir, şəkil, qiymət, special qiymət
- model/stock/optionlar

### 4.3. Category idarəetməsi

Admin path:

- `Catalog -> Categories`

Category adı, image, təsvir, SEO URL dəyişiklikləri `product/category` səhifəsinə düşür.

### 4.4. Blog idarəetməsi

Admin path:

- `CMS -> Articles`
- `CMS -> Topics`

Home blog section (`bloglar.twig`) və blog list/detail səhifələri bu datadan qidalanır.

### 4.5. Information (statik səhifə) idarəetməsi

Admin path:

- `Catalog -> Information`

Buradan:

- About us, Delivery info, Privacy policy və s. statik səhifələr yaradılır
- Footer-də avtomatik listlənir (status aktivdirsə)

### 4.6. Coupon idarəetməsi

Admin path:

- Kupon yaratmaq/redaktə: `Marketing -> Coupons`
- Coupon total extension statusu: `Extensions -> Order Totals -> Coupon`

---

## 5) Information (statik səhifə) linki necə əlavə olunur?

### Variant A: Admin-dən yaradıb footer-də avtomatik göstərmək (tövsiyə)

1. `Catalog -> Information` daxil ol
2. Yeni information yarat (`title`, `description`, `status=enabled`)
3. Save et
4. Footer-də `informations` döngüsü ilə link avtomatik görünəcək

Bu mexanizm bu fayllarda işləyir:

- `documents/catalog/controller/common/footer.php`
- `documents/catalog/view/template/common/footer.twig`

### Variant B: Manual olaraq xüsusi link əlavə etmək

Əgər xüsusi route/manual link lazımdırsa:

1. Controller-də link hazırla

```php
// documents/catalog/controller/common/footer.php
$data['my_custom_page'] = $this->url->link('information/information', 'language=' . $this->config->get('config_language') . '&information_id=12');
```

2. Twig-də linki göstər

```twig
{# documents/catalog/view/template/common/footer.twig #}
<li><a href="{{ my_custom_page }}">Custom Page</a></li>
```

---

## 6) Checkout dizaynı haradan dəyişir?

Checkout bir fayl deyil, bir neçə hissədən ibarətdir.

Əsas dizayn faylları:

- Ümumi checkout layout: `documents/catalog/view/template/checkout/checkout.twig`
- Guest/Register form hissəsi: `documents/catalog/view/template/checkout/register.twig`
- Payment address hissəsi: `documents/catalog/view/template/checkout/payment_address.twig`
- Shipping address hissəsi: `documents/catalog/view/template/checkout/shipping_address.twig`
- Shipping method hissəsi: `documents/catalog/view/template/checkout/shipping_method.twig`
- Payment method hissəsi: `documents/catalog/view/template/checkout/payment_method.twig`
- Confirm table: `documents/catalog/view/template/checkout/confirm.twig`

Coupon UI bu hissədədir:

- `documents/extension/opencart/catalog/view/template/checkout/coupon.twig`

Coupon logic bu hissələrdədir:

- Apply/remove controller: `documents/extension/opencart/catalog/controller/checkout/coupon.php`
- Endirimin total-a tətbiqi: `documents/extension/opencart/catalog/model/total/coupon.php`

Praktik qayda:

- Layout dəyişiklikləri üçün `.twig`
- Business logic üçün `controller/model`

---

## 7) Coupon code işləmə məntiqi (sadə axın)

1. User cart-da coupon kod yazır
2. `extension/opencart/checkout/coupon.save` route-u işləyir
3. Kod doğrulanır, uğurludursa `session['coupon']` yazılır
4. Totals hesablananda `model/total/coupon.php` session-dakı kuponu tətbiq edir
5. Discount `totals` listinə mənfi dəyər kimi əlavə olunur

Dəstək verdiyi hallardan nümunə:

- `F` (fixed amount) kupon
- `P` (percent) kupon
- seçilmiş məhsullara tətbiq
- shipping discount daxil olmaqla tətbiq

Admin tərəfdə düzgün işləməsi üçün:

- Kuponun özü aktiv olmalıdır (`Marketing -> Coupons`)
- Total coupon extension aktiv olmalıdır (`Extensions -> Order Totals -> Coupon`)

---

## 8) Product design haradan dəyişir?

### 8.1. Product card (category/list/search/special kartları)

Əsas kart templati:

- `documents/catalog/view/template/product/thumb.twig`

Burada dəyişirsən:

- şəkil bloku
- məhsul adı və qısa təsvir
- qiymət/special görüntüsü
- wishlist/cart/compare button dizaynı

### 8.2. Category səhifə layout-u

- `documents/catalog/view/template/product/category.twig`

Burada dəyişirsən:

- list/grid wrapper
- sort/limit panel
- pagination üst/alt yerləşimi

### 8.3. Product detail səhifəsi

- `documents/catalog/view/template/product/product.twig`

Burada dəyişirsən:

- image gallery
- price zone
- options form
- add-to-cart, wishlist, compare UI
- tabs (description/specification/review)

---

## 9) Blog card design haradan dəyişir?

Blog üçün 2 fərqli card istifadəsi var:

### 9.1. Home səhifədə blog section kartları

- `documents/catalog/view/template/sections/bloglar.twig`

Bu section `Section Builder`-dən gələn `articles` datanı göstərir.

### 9.2. Blog list səhifəsində kartlar

- `documents/catalog/view/template/cms/blog.twig`

Burada list item dizaynı, tarix/author/comment meta hissəsi və continue button var.

### 9.3. Blog detail

- `documents/catalog/view/template/cms/blog_info.twig`

---

## 10) Section Builder ilə yeni section necə implement edilir?

Bu hissə praktik addımlarla:

### Addım 1: Admin-dən section modulu yarat

- `Extensions -> Extensions -> Modules -> Section -> Add New`
- `Section Type` seç
- `Template Slug` ver (məs: `my_new_section`)
- field/item dataları doldur
- save

### Addım 2: Section template faylını yaz

Path:

- `documents/catalog/view/template/sections/my_new_section.twig`

Qeyd:

- Əgər bu slug ilə fayl yoxdursa, save zamanı sistem scaffold yaradır
- Scaffold avtomatik `getTemplateScaffold()` ilə gəlir

### Addım 3: Layout-a qoş

- `Design -> Layouts -> Home`
- `opencart.section.<module_id>` modulunu `content_top` (və ya istədiyin position)-a əlavə et
- `sort_order` ver

### Addım 4: Frontda yoxla

- Home route aç: `index.php?route=common/home`
- Section görünməlidir

### Data contract (section twig-də gələn dəyişənlər)

- `section`
- `fields`
- `items`
- `custom_fields`
- `custom_repeaters`
- `products`
- `articles`
- `links`

Sadə nümunə:

```twig
<section>
  {% if fields.headline %}<h2>{{ fields.headline }}</h2>{% endif %}

  {% for item in items %}
    <div>{{ item.text }}</div>
  {% endfor %}
</section>
```

### Vacib qeyd: `items|slice(1)` məsələsi

Bəzi hazır section template-lərdə (`banner`, `cta`, `partnyorlar`) bu pattern var:

```twig
{% for item in items|slice(1) %}
```

Səbəb:

- Admin UI-də ilk row placeholder/sentinel kimi saxlanıb
- Real item-lər 1-ci indeksdən başlayır

Bu layihədə hazır section-lara edit edəndə bunu nəzərə al.

---

## 11) Login / Register / Newsletter necə işləyir?

### Login

- Front form: `account/login.twig`
- Submit route: `account/login.login`
- Controller: `account/login.php`

Məntiq:

- login token yoxlanır
- cəhd limiti var
- uğurlu login-də `customer_token` yaradılır
- session wishlist varsa DB wishlist-ə merge edilir

### Register

- Front form: `account/register.twig`
- Submit route: `account/register.register`
- Controller: `account/register.php`

Məntiq:

- register token + captcha + custom field validation
- password policy config-lə yoxlanır
- account terms (information page) check edilir
- uğurlu olduqda login və redirect `account/success`

### Newsletter

- Front form: `account/newsletter.twig`
- Save route: `account/newsletter.save`
- Controller: `account/newsletter.php`

Məntiq:

- yalnız login olmuş user üçün işləyir
- `editNewsletter()` ilə customer record update olunur

---

## 12) Guest Wishlist bu layihədə necədir?

Bu layihədə guest wishlist üçün custom localStorage axını var.

Əsas JS:

- `documents/catalog/view/javascript/common.js`

Funksiyalar:

- `ocGuestWishlistGet/Set/Add/Remove`
- `ocGuestWishlistSyncTotal`

Məntiq:

- Guest user wishlist düyməsinə basanda DB yerinə localStorage yenilənir
- Wishlist səhifəsi guest modda `product_ids` göndərib HTML list alır
- Login olduqda normal DB wishlist axını işə düşür

Əsas backend:

- `documents/catalog/controller/account/wishlist.php`
- Guest list endpoint: `account/wishlist.guest`

---

## 13) Layout və module sistemi necə işləyir?

OpenCart layout modulu ilə hansı route-da hansı blokun görünəcəyini təyin edir.

Əsas axın:

1. Route müəyyən olunur (`common/home`, `product/product`, ...)
2. Layout tapılır (`oc_layout_route`)
3. Position üzrə module-lar tapılır (`oc_layout_module`)
4. Controller module-ları render edir (`content_top`, `content_bottom`, `column_left`, `column_right`)

Bu hissələr:

- `documents/catalog/controller/common/content_top.php`
- `documents/catalog/controller/common/content_bottom.php`
- `documents/catalog/model/design/layout.php`
- Admin tərəf: `documents/admin/controller/design/layout.php`

---

## 14) Bu app-də ən vacib admin istifadə ssenariləri

### Ssenari A: Home section mətni/şəkli dəyişmək

1. Admin -> Extensions -> Modules -> Section
2. Lazım olan section-u aç
3. `fields` və ya `items` datanı dəyiş
4. Save et
5. Home səhifəni refresh et

### Ssenari B: Yeni statik səhifə və footer link

1. Admin -> Catalog -> Information -> Add
2. Title/Description doldur, status aktiv et
3. Save et
4. Footer-də avtomatik görünür

### Ssenari C: Checkout coupon işlətmək

1. Admin -> Marketing -> Coupons -> kupon yarat
2. Admin -> Extensions -> Order Totals -> Coupon -> status = enabled
3. Front cart-da kuponu yoxla

### Ssenari D: Blog kartlarını yeniləmək

1. Admin -> CMS -> Articles (content/image)
2. Dizayn lazım olsa:
   - Home kart: `sections/bloglar.twig`
   - Blog list kart: `cms/blog.twig`

---

## 15) Twig sürətli cheat sheet (bu layihədə lazım olan)

### Əsas taglar

- `{{ ... }}` -> ekrana dəyər çıxarır
- `{% ... %}` -> məntiq (`if`, `for`, `set`)
- `{# ... #}` -> comment

### `for` döngü nümunələri

```twig
{% for product in products %}
  <h3>{{ product.name }}</h3>
{% endfor %}
```

```twig
{% for product in products %}
  <h3>{{ product.name }}</h3>
{% else %}
  <p>Product yoxdur</p>
{% endfor %}
```

### `if` məntiqi

```twig
{% if product.special %}
  <span>{{ product.special }}</span>
{% elseif product.price %}
  <span>{{ product.price }}</span>
{% else %}
  <span>Qiymət yoxdur</span>
{% endif %}
```

### Array elementləri

```twig
{{ product.name }}
{{ product['name'] }}
{{ products[0].name }}
```

### Kiçik, faydalı filter/məntiqlər

```twig
{% set total = products|length %}
{{ product.model|default('Model yoxdur') }}
{{ tags|join(', ') }}
{% for product in products|slice(0, 4) %}...{% endfor %}
```

---

## 16) Yeni developer üçün "harada edit etməliyəm?" cədvəli

- Home section dizaynı -> `catalog/view/template/sections/*.twig`
- Header link/logo/topbar -> `catalog/view/template/common/header.twig`
- Footer linklər -> `catalog/view/template/common/footer.twig`
- Information səhifə dizaynı -> `catalog/view/template/information/information.twig`
- Category-də product kart -> `catalog/view/template/product/thumb.twig`
- Product detail dizaynı -> `catalog/view/template/product/product.twig`
- Blog list kart dizaynı -> `catalog/view/template/cms/blog.twig`
- Checkout ümumi dizayn -> `catalog/view/template/checkout/checkout.twig`
- Coupon görünüşü -> `extension/opencart/catalog/view/template/checkout/coupon.twig`
- Global JS davranışlar -> `catalog/view/javascript/common.js`
- Global stil -> `catalog/view/stylesheet/stylesheet.css`

---

## 17) Problemlər üçün sürətli yoxlama checklist

### Section görünmür

- Module status aktivdir?
- Module Home layout-a əlavə olunub?
- Position doğrudur (`content_top`)?
- `sort_order` konflikti yoxdur?
- `template_slug` faylı `catalog/view/template/sections/` altında var?
- Route həqiqətən `common/home`-dur?

### Coupon tətbiq olunmur

- `total_coupon_status = 1`?
- Kupon aktiv və tarix intervalındadır?
- Minimum total şərti ödənir?
- Product/category məhdudiyyəti varmı?

### Information link görünmür

- Information status aktivdir?
- Doğru store-a bağlıdır?
- Footer template-də `informations` döngüsü silinməyib?

### Guest wishlist işləmir

- `common.js` yüklənir?
- Browser localStorage açıqdır?
- `window.ocCustomerLogged` dəyəri düzgündür?
- wishlist səhifəsində `data-guest="1"` gəlir?

---

## 18) Qısa qayda: Twig-də nə etmə, nə et

Et:

- UI göstərmə məntiqi (`if`, `for`, `default`, `slice`)
- sadə formatlama

Etmə:

- ağır biznes məntiqi
- DB query düşüncəsi
- böyük data manipulyasiyası

Ağır məntiq yeri:

- Controller + Model (PHP)

Bu qayda kodu oxunaqlı və stabil saxlayır.

---

## 19) Hostingə atdıqdan sonra config-lər (mütləq oxu)

Bu layihədə hosting sonrası ən vacib hissə config-dir.
Ən azı aşağıdakı faylları yoxlamalısan:

- `documents/config.php`
- `documents/admin/config.php`
- `documents/.htaccess`

### 19.1. `documents/config.php` (catalog)

Dəyişməli hissələr:

- `DB_HOSTNAME`
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_DATABASE`
- `DB_PORT`
- `DB_PREFIX` (əgər fərqlidirsə)

Bu faylda `HTTP_SERVER` hostdan avtomatik qurulur, amma fallback dəyər var:

```php
$default_http_server = 'http://localhost:8888/';
```

Production üçün bunu real domain ilə dəyişmək tövsiyə olunur (xüsusilə CLI/cron üçün).

### 19.2. `documents/admin/config.php` (admin)

Eyni DB dəyərlərini burada da eyni şəkildə dəyişməlisən:

- `DB_HOSTNAME`
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_DATABASE`
- `DB_PORT`
- `DB_PREFIX`

Bu faylda 2 fallback var:

```php
$default_http_server = 'http://localhost:8888/admin/';
$default_http_catalog = 'http://localhost:8888/';
```

Bunları production domain-ə uyğunlaşdır:

- `https://your-domain.com/admin/`
- `https://your-domain.com/`

Qeyd:

- `HTTP_CATALOG` admin tərəfdə şəkil URL-ləri və linklər üçün vacibdir.
- Yanlış olarsa admin-də image/link problemləri çıxır.

### 19.3. `documents/.htaccess`

SEO URL üçün `mod_rewrite` aktiv olmalıdır.

Əgər sayt root-da deyilsə (`/store` altında işləyirsə), bunu dəyiş:

```apache
RewriteBase /store/
```

Root-da işləyirsə cari hal (`RewriteBase /`) düzgündür.

---

## 20) Hostingdən sonra admin paneldə edilməli config-lər

### 20.1. Store URL və əsas məlumatlar

Admin:

- `System -> Settings -> Edit Store` (store form)

Mütləq yoxla:

- `config_url` (düzgün domain, slash ilə bitməsi məsləhətdir)
- `config_name`, `config_email`, `config_telephone`
- logo/icon

### 20.2. Server/Mail/SEO parametrləri

Admin:

- `System -> Settings -> Settings` (global)

Yoxla:

- `config_mail_engine` və SMTP parametrləri
- `config_seo_url` (SEO URL açıqdırsa rewrite düzgün işləməlidir)
- `config_maintenance` (live olduqda adətən `0`)
- `config_error_display` (production-da `0`)
- `config_error_log` (adətən `1`)

### 20.3. Coupon/live satış parametrləri

- `Extensions -> Order Totals -> Coupon` -> aktiv olmalıdır
- `Marketing -> Coupons` -> kodlar aktiv və tarix intervalında olmalıdır

---

## 21) Fayl icazələri (permissions)

Hostingdə bu qovluqlar yazıla bilən olmalıdır:

- `documents/system/storage/cache`
- `documents/system/storage/logs`
- `documents/system/storage/session`
- `documents/system/storage/upload`
- `documents/system/storage/download`
- `documents/image/cache`

Əgər image upload aktivdirsə:

- `documents/image/catalog` də write hüququ olmalıdır.

---

## 22) Production-a çıxış üçün sürətli checklist

1. `documents/config.php` və `documents/admin/config.php` DB + fallback URL düzəldildi
2. `.htaccess` və `RewriteBase` düzgün quruldu
3. Admin `config_url` real domain-ə verildi
4. `config_error_display = 0` edildi
5. Mail (SMTP) test edildi
6. Home, category, product, cart, checkout, blog, information səhifələri açıldı
7. Image upload və image render test edildi
8. Coupon və newsletter axını test edildi

---

## 23) Admin açılmırsa və ya URL səhvdirsə (tez həll)

Ən çox səbəb URL/config uyğunsuzluğudur.
Birinci növbədə:

1. `documents/admin/config.php` içindəki fallback URL-ləri düzəlt
2. `documents/config.php` fallback URL-ni düzəlt
3. `.htaccess` rewrite base-i düzəlt

Sonra cache təmizlə:

- `documents/system/storage/cache/*` (faylları sil, qovluğu saxla)

Yenidən yoxla:

- `https://your-domain.com/admin/`
