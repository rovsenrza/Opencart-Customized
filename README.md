# OpenCart Frontend Inteqrasiya (Sadə README)

Bu sənəd yeni developer üçün qısa və praktik bələdçidir.
Məqsəd: frontend dizaynı OpenCart-a düzgün qoşulsun və Twig məntiqi sadə olsun.

---

## 1) Hansı fayllarda işləyəcəksən?

- `catalog/controller/.../*.php` -> data burada hazırlanır
- `catalog/view/template/.../*.twig` -> HTML/Twig burada yazılır

Sadə qayda:
- PHP (`controller`) data hazırlayır
- Twig (`view`) data göstərir

---

## 2) Twig-də əsas taglar

### `{{ ... }}`
Ekrana dəyər çıxarmaq üçündür.

```twig
<h1>{{ heading_title }}</h1>
<p>{{ product.name }}</p>
```

### `{% ... %}`
Məntiq üçündür (`for`, `if`, `set` və s.).

```twig
{% if products %}
  <p>Məhsul var</p>
{% endif %}
```

### `{# ... #}`
Komment üçündür (brauzerdə görünmür).

```twig
{# bu hissə yalnız developer üçündür #}
```

---

## 3) OpenCart-da ən çox istifadə olunan view dəyişənləri

- `{{ header }}` -> saytın baş hissəsi
- `{{ footer }}` -> saytın alt hissəsi
- `{{ column_left }}` -> sol sütun
- `{{ column_right }}` -> sağ sütun
- `{{ content_top }}` -> kontentin üst bloku
- `{{ content_bottom }}` -> kontentin alt bloku

Ən sadə səhifə skeleti:

```twig
{{ header }}
<main>
  {{ content_top }}
  <!-- əsas kontent -->
  {{ content_bottom }}
</main>
{{ footer }}
```

---

## 4) Controller-dən Twig-ə data necə gedir?

```php
// catalog/controller/common/home.php
$data['heading_title'] = 'Yeni Məhsullar';
$data['products'] = [
    ['name' => 'iPhone 15', 'price' => '$999', 'thumb' => 'image/catalog/demo/iphone.jpg'],
    ['name' => 'MacBook', 'price' => '$1499', 'thumb' => 'image/catalog/demo/macbook.jpg']
];

$this->response->setOutput($this->load->view('common/home', $data));
```

---

## 5) Array elementlərini Twig-də oxuma

### Dot sintaksis (ən rahat)

```twig
{{ product.name }}
{{ product.price }}
```

### Bracket sintaksis

```twig
{{ product['name'] }}
{{ products[0]['price'] }}
```

### İç-içə array

```twig
{{ category.children[0].name }}
```

---

## 6) `for` döngüsü Twig-də

### Sadə döngü

```twig
{% for product in products %}
  <h3>{{ product.name }}</h3>
{% endfor %}
```

### Boş olduqda fallback (`else`)

```twig
{% for product in products %}
  <h3>{{ product.name }}</h3>
{% else %}
  <p>Məhsul tapılmadı.</p>
{% endfor %}
```

### İndeks + element

```twig
{% for i, product in products %}
  <p>{{ i + 1 }}. {{ product.name }}</p>
{% endfor %}
```

Faydalı `loop` dəyişənləri:
- `loop.index` -> 1-dən başlayır
- `loop.index0` -> 0-dan başlayır
- `loop.first` -> ilk elementdir?
- `loop.last` -> son elementdir?

---

## 7) `if` məntiqi Twig-də

```twig
{% if product.special %}
  <span class="badge">Endirim</span>
{% elseif product.price %}
  <span class="price">{{ product.price }}</span>
{% else %}
  <span>Qiymət yoxdur</span>
{% endif %}
```

Tez-tez lazım olan şərtlər:

```twig
{% if products is not empty %}...{% endif %}
{% if product.rating is defined %}...{% endif %}
{% if not product.stock %}Stokda yoxdur{% endif %}
{% if product.quantity > 0 and product.status %}...{% endif %}
```

---

## 8) Lazım ola biləcək kiçik Twig məntiqləri

### `set` (dəyişən yaratmaq)

```twig
{% set total = products|length %}
```

### `default` (null/boş üçün default dəyər)

```twig
{{ product.model|default('Model yoxdur') }}
```

### `length` (say)

```twig
{{ products|length }}
```

### Ternary

```twig
{{ product.special ? product.special : product.price }}
```

### `slice` (kəsmək/limit)

```twig
{% for product in products|slice(0, 4) %}
  {{ product.name }}
{% endfor %}
```

### `join` (array-i mətnə çevirmək)

```twig
{{ tags|join(', ') }}
```

---

## 9) Qısa real nümunə (product card)

```twig
{% for product in products %}
  <article class="product-card">
    <img src="{{ product.thumb }}" alt="{{ product.name }}">
    <h3>{{ product.name }}</h3>

    {% if product.special %}
      <p class="price">
        <span class="old">{{ product.price }}</span>
        <span class="new">{{ product.special }}</span>
      </p>
    {% else %}
      <p class="price">{{ product.price }}</p>
    {% endif %}
  </article>
{% else %}
  <p>Bu bölmədə məhsul yoxdur.</p>
{% endfor %}
```

---

## 10) Vacib qeyd (Twig vs PHP)

- Twig faylında `<?php ... ?>` yazmırıq
- Ağır məntiqi controller/model-də yazırıq
- Twig-də yalnız göstərmə məntiqi saxlayırıq (`if`, `for`, sadə formatlama)

Bu qayda ilə kod həm təmiz qalır, həm də yeni developer üçün oxunaqlı olur.
