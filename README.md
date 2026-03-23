# OpenCart-da Tam Dinamik E-commerce Dizayn İnteqrasiyası

Bu sənəd, dizaynı artıq hazır olan bir e-commerce saytının OpenCart-a tam dinamik şəkildə necə inteqrasiya ediləcəyini addım-addım izah edir.

Hədəf:
- Frontend dizaynını qorumaq
- Məzmunu və məhsul datalarını admin paneldən idarə etmək
- Texniki borcu az, davamlı, genişlənə bilən arxitektura qurmaq

Bu bələdçi OpenCart 4 yanaşmasına uyğundur, amma OpenCart 3 layihələrinə də əsas prinsiplər eyni şəkildə tətbiq olunur.

---

## 1) “Tam Dinamik İnteqrasiya” nə deməkdir?

Tam dinamik inteqrasiya o deməkdir ki:
- statik HTML-dəki mətnlər, şəkillər, linklər, məhsullar, blog yazıları kodda “hardcode” qalmasın
- admin paneldən dəyişilən data frontend-ə dərhal əks olunsun
- yeni kontent əlavə etmək üçün developer müdaxiləsi minimum olsun
- dizayn və funksionallıq bir-birindən ayrılmış, idarə olunan olsun

Qısa prinsip:
- Dizayn frontenddə qalır
- Data backend/admindən gəlir
- Controller data hazırlayır, Twig render edir, JS interaktivlik verir

---

## 2) OpenCart arxitekturası: praktik baxış

OpenCart əsasən MVC-L modelində işləyir:
- `Controller`: route üzrə datanı toplayır
- `Model`: DB və biznes məntiqi
- `View (Twig)`: UI render
- `Language`: çoxdillilik mətnləri

Tipik axın:
1. Route çağırılır (`cms/blog`, `product/product`, `common/home`)
2. Controller modeldən data götürür
3. Data Twig-ə ötürülür
4. Twig HTML çıxış yaradır

Tam dinamik inteqrasiyada əsas qayda:
- Twig-də görünən hər şey admindən və ya sistem modelindən gəlməlidir

---

## 3) İnteqrasiyaya başlamazdan əvvəl analiz

Statik dizaynı dərhal koda köçürmək əvəzinə əvvəl xəritə çıxarın.

### 3.1. Səhifə inventarı
- Home
- Category list
- Product detail
- Cart/Checkout
- Blog list/detail
- Contact/About
- Hesab (login/register/wishlist)

### 3.2. Blok inventarı
Hər blok üçün qeyd edin:
- Data mənbəyi (product, category, banner, blog, custom section)
- Admində haradan idarə olunacaq
- Təkrarlanan elementdir, yoxsa tək blokdur
- Çoxdillilik tələb olunurmu

### 3.3. Dinamik data matrisi
Məsələn:
- Header menu -> Category tree (model)
- Home banner -> custom section builder (admin module)
- Məhsullarımız -> category_products (limit + category)
- Partnyorlar -> manual items (image + href)
- CTA social links -> manual items (icon/image + label + href)
- Bloglar -> cms articles

Bu matris sonradan kodda qarışıqlığı ciddi azaldır.

---

## 4) Layihə strukturu: tövsiyə olunan model

### 4.1. Core fayllar
- `catalog/controller/common/header.php`
- `catalog/controller/common/footer.php`
- `catalog/view/template/common/header.twig`
- `catalog/view/template/common/footer.twig`

### 4.2. Home section yanaşması (çox praktik)
- Admində modul: `extension/opencart/module/section`
- Frontend render: `extension/opencart/catalog/controller/module/section.php`
- Section şablonları: `catalog/view/template/sections/*.twig`

Bu modelin üstünlüyü:
- Hər section ayrıca Twig ilə idarə olunur
- Dizayn dəyişəndə yalnız aid section yenilənir
- Admindən section data-sı idarə olunur

---

## 5) Dizaynı dinamikləşdirmə mərhələləri

## 5.1. Global layout
İlk olaraq:
- header, footer, common style/script yüklənməsi sabitləşdirilir
- route-lar və əsas kontent yerləri sabitlənir

Yoxlama:
- səhifələrdə qırıq script/style yoxdur
- menu, logo, cart, wishlist, account linkləri işləyir

## 5.2. Home section-ların parçalanması
Statik home HTML-i bir faylda saxlamayın.
Ayrı section fayllarına bölün:
- `banner.twig`
- `mehsullarimiz.twig`
- `ustunlukler.twig`
- `haqqimizda.twig`
- `bloglar.twig`
- `partnyorlar.twig`
- `cta.twig`

Hər section üçün:
- field-lər (headline, description, image, limit və s.)
- item-lər (image/text/link)
- data source (manual, category_products, blog_articles)

## 5.3. Product/Catalog dinamikliyi
Dinamik olmalı hissələr:
- məhsul şəkli, ad, qiymət, special qiymət
- stok, rating, badge-lər
- category filter və pagination

Admindən idarə:
- məhsul məlumatları core OpenCart model-lərindən

## 5.4. Blog dinamikliyi
Dinamik olmalı hissələr:
- article list (image, title, description, date)
- detail page
- route və pagination

Search/sort ehtiyac deyilsə template-dən çıxarılır, controllerdə qalan parametrlər sadələşdirilir.

---

## 6) Admin paneli necə düzgün qurulmalıdır?

Dinamik inteqrasiya “admin idarəsi” ilə bitir.
Əgər admin rahat deyilsə layihə yarımçıqdır.

### 6.1. Section builder üçün əsas qaydalar
- Field tipini dəqiq verin (`text`, `textarea`, `image`, `url`, `number`)
- Repeater item-lərdə data key-lər sabit olsun
- Empty default row-lar DB-yə düşməsin
- Frontda lazım olmayan sentinel row-lar `slice(1)` ilə keçilsin

### 6.2. Image upload və path idarəsi
Ən kritik hissələrdən biri budur.

Doğru saxlama:
- DB-də şəkil yolu `catalog/...` formatında saxlanmalıdır
- `image/cache/...` və ya DOM `src` dəyəri DB-yə yazılmamalıdır

Yanlışlar:
- `.src` kimi pseudo dəyər
- `../image/...` kimi qarışıq path
- resize/cache URL-ni source kimi saxlamaq

Düzgün praktika:
- seçilən image path normalize edilir
- serverə save gedərkən canonical path saxlanır

---

## 7) Guest və Login məntiqləri: Wishlist nümunəsi

İnteqrasiyada ən çox pozulan hissələrdən biri guest axınıdır.

Tələb:
- guest user wishlist klik edəndə “you must login” bloklayıcı error çıxmasın
- məhsullar localStorage-də saxlanılsın
- wishlist səhifəsində guest list göstərilsin
- login olduqda default OpenCart DB wishlist axını davam etsin

Tövsiyə edilən model:
- Front JS:
  - `ocGuestWishlistGet/Set/Add/Remove`
  - `ocGuestWishlistSyncTotal`
- Form AJAX interceptor:
  - request `account/wishlist.add` və user guestdirsə localStorage axınına keç
- Backend:
  - guest üçün sərt `error_login` qaytarmayın
  - login olduqda standart model (`model_account_wishlist`) işləsin

Bu model UX-i yaxşılaşdırır və conversion-u qoruyur.

---

## 8) Şəkillərin kütləvi idarəsi (real layihə ehtiyacı)

Real integrasiyada tez-tez bu ehtiyac çıxır:
- bütün category və product şəkillərini toplu dəyişmək
- müəyyən fayl adını bütün kontentdə əvəzləmək

Praktik qayda:
- əvvəl backup
- sonra hədəf cədvəllərə dəqiq update (`oc_product`, `oc_product_image`, `oc_category`, lazımdırsa `oc_module.setting`)
- sonradan cache təmizliyi

Qeyd:
- OpenCart-də canonical saxlanan dəyər `catalog/...`
- frontend bunu `image/catalog/...` kimi təqdim edir

---

## 9) Performans və stabil işləmə

## 9.1. Şəkil performansı
- resize/cache sistemindən istifadə edin
- böyük media üçün ölçü limitləri
- section-larda lazım olmayan ağır şəkilləri saxlamayın

## 9.2. Frontend JS
- 3rd party library (məs. Swiper) üçün:
  - bir dəfə yükləmə
  - init guard (`if (node.swiper) return`)
  - lazımdırsa lazy asset loading

## 9.3. Cache strategiyası
- dəyişiklikdən sonra:
  - theme cache clean
  - modification cache refresh
  - browser hard refresh

---

## 10) SEO və URL idarəsi

Tam inteqrasiyada:
- SEO URL-lər transliterasiya ilə düzgün yaranmalıdır
- page title, meta description dinamik verilməlidir
- canonical/prev/next linkləri doğru qurulmalıdır
- blog və category səhifələri indekslənə bilən olmalıdır

---

## 11) Təhlükəsizlik və keyfiyyət

## 11.1. Təhlükəsizlik
- bütün input-lar sanitize və validate edilməlidir
- image upload whitelist
- CSRF/token axınlarına toxunmayın

## 11.2. QA checklist
- Guest flow:
  - cart add
  - wishlist add/remove
  - checkout-a keçid
- Logged flow:
  - wishlist DB sinxronluğu
  - account order/history
- Admin flow:
  - section save/edit/delete
  - image upload + re-open + save + frontend render

---

## 12) Deployment (production-a çıxış)

Tövsiyə olunan ardıcıllıq:
1. Staging mühitində tam test
2. DB backup
3. Kod deploy
4. DB migration/update (lazımdırsa)
5. Cache clear
6. Smoke test (home, category, product, checkout, blog, wishlist)
7. Monitoring və rollback plan

Rollback üçün əvvəlcədən:
- backup SQL
- əvvəlki release artifact
- dəyişiklik logu

---

## 13) “Tam bitmiş dizaynı OpenCart-a tam dinamik inteqrasiya” üçün Definition of Done

Layihə yalnız aşağıdakılar tamam olanda “bitmiş” sayılır:
- bütün səhifələr dizayna vizual uyğun
- bütün kontent admin paneldən idarə olunur
- heç bir əsas blok hardcode data ilə qalmayıb
- guest/login axınları problemsizdir
- image path-lər canonical formatda saxlanır
- cache və performans yoxlanıb
- SEO əsasları yerindədir
- test checklist tam keçib

---

## 14) Praktik implementasiya planı (qısa)

1. Dizaynın data matrisi çıxarılır  
2. Section-lar ayrı Twig-lərə bölünür  
3. Controller data contract sabitlənir  
4. Admin builder field/item modeli tamamlanır  
5. Image upload canonical path qaydası tətbiq olunur  
6. Guest wishlist localStorage modeli qurulur  
7. Blog/product/category dinamik axınları bitirilir  
8. QA + cache + deploy

---

## 15) Yekun

OpenCart-a “tam dinamik inteqrasiya” sadəcə HTML köçürmək deyil. Bu, həm frontend dizaynın qorunması, həm admin idarə rahatlığı, həm də data axınının sağlam arxitektura ilə qurulmasıdır.

Ən vacib uğur faktorları:
- əvvəlcədən düzgün data matrisi
- section-based parçalama
- image path intizamı
- guest/login axınlarının düzgün ayrılması
- test və deploy intizamı

Bu sənəddəki ardıcıllığı izləsəniz, dizaynı tam bitmiş bir e-commerce layihəsini OpenCart-a çevik, idarə oluna bilən və davamlı şəkildə inteqrasiya edə bilərsiniz.

