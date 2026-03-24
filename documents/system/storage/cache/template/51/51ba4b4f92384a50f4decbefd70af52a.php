<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* catalog/view/template/product/thumb.twig */
class __TwigTemplate_9a51564d95afbd83eb81903ec3abc437 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"product-thumb\">
  <div class=\"image\"><a href=\"";
        // line 2
        yield ($context["href"] ?? null);
        yield "\"><img src=\"";
        yield ($context["thumb"] ?? null);
        yield "\" alt=\"";
        yield ($context["name"] ?? null);
        yield "\" title=\"";
        yield ($context["name"] ?? null);
        yield "\" class=\"img-fluid\"/></a></div>
  <div class=\"content\">
    <div class=\"description\">
      <h4><a href=\"";
        // line 5
        yield ($context["href"] ?? null);
        yield "\">";
        yield ($context["name"] ?? null);
        yield "</a></h4>
      <p>";
        // line 6
        yield ($context["description"] ?? null);
        yield "</p>
      ";
        // line 7
        if (($context["price"] ?? null)) {
            // line 8
            yield "        <div class=\"price\">
          ";
            // line 9
            if ( !($context["special"] ?? null)) {
                // line 10
                yield "            <span class=\"price-new\">";
                yield ($context["price"] ?? null);
                yield "</span>
          ";
            } else {
                // line 12
                yield "            <span class=\"price-new\">";
                yield ($context["special"] ?? null);
                yield "</span> <span class=\"price-old\">";
                yield ($context["price"] ?? null);
                yield "</span>
          ";
            }
            // line 14
            yield "          ";
            if (($context["tax"] ?? null)) {
                // line 15
                yield "            <span class=\"price-tax\">";
                yield ($context["text_tax"] ?? null);
                yield " ";
                yield ($context["tax"] ?? null);
                yield "</span>
          ";
            }
            // line 17
            yield "        </div>
      ";
        }
        // line 19
        yield "      ";
        if ((($context["review_status"] ?? null) && ($context["rating"] ?? null))) {
            // line 20
            yield "        <div class=\"rating\">
          ";
            // line 21
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 22
                yield "            ";
                if ((($context["rating"] ?? null) < $context["i"])) {
                    // line 23
                    yield "              <span class=\"fa-stack\"><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
            ";
                } else {
                    // line 25
                    yield "              <span class=\"fa-stack\"><i class=\"fa-solid fa-star fa-stack-1x\"></i><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
            ";
                }
                // line 27
                yield "          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            yield "        </div>
      ";
        }
        // line 30
        yield "    </div>
    <form method=\"post\" data-oc-toggle=\"ajax\"";
        // line 31
        if (($context["cart_enabled"] ?? null)) {
            yield " data-oc-load=\"";
            yield ($context["cart"] ?? null);
            yield "\" data-oc-target=\"#cart\"";
        }
        yield ">
      <div class=\"button\">
        ";
        // line 33
        if (($context["cart_enabled"] ?? null)) {
            // line 34
            yield "          <button type=\"submit\" formaction=\"";
            yield ($context["cart_add"] ?? null);
            yield "\" data-bs-toggle=\"tooltip\" title=\"";
            yield ($context["button_cart"] ?? null);
            yield "\"><i class=\"fa-solid fa-shopping-cart\"></i></button>
        ";
        }
        // line 36
        yield "        ";
        if (($context["wishlist_enabled"] ?? null)) {
            // line 37
            yield "          <button type=\"submit\" formaction=\"";
            yield ($context["wishlist_add"] ?? null);
            yield "\" data-bs-toggle=\"tooltip\" title=\"";
            yield ($context["button_wishlist"] ?? null);
            yield "\" ><i class=\"fa-solid fa-heart\"></i></button>
        ";
        }
        // line 39
        yield "        ";
        if (($context["compare_enabled"] ?? null)) {
            // line 40
            yield "          <button type=\"submit\" formaction=\"";
            yield ($context["compare_add"] ?? null);
            yield "\" data-bs-toggle=\"tooltip\" title=\"";
            yield ($context["button_compare"] ?? null);
            yield "\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i></button>
        ";
        }
        // line 42
        yield "      </div>
      <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 43
        yield ($context["product_id"] ?? null);
        yield "\"/> <input type=\"hidden\" name=\"quantity\" value=\"";
        yield ($context["minimum"] ?? null);
        yield "\"/>
    </form>
  </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/product/thumb.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  181 => 43,  178 => 42,  170 => 40,  167 => 39,  159 => 37,  156 => 36,  148 => 34,  146 => 33,  137 => 31,  134 => 30,  130 => 28,  124 => 27,  120 => 25,  116 => 23,  113 => 22,  109 => 21,  106 => 20,  103 => 19,  99 => 17,  91 => 15,  88 => 14,  80 => 12,  74 => 10,  72 => 9,  69 => 8,  67 => 7,  63 => 6,  57 => 5,  45 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"product-thumb\">
  <div class=\"image\"><a href=\"{{ href }}\"><img src=\"{{ thumb }}\" alt=\"{{ name }}\" title=\"{{ name }}\" class=\"img-fluid\"/></a></div>
  <div class=\"content\">
    <div class=\"description\">
      <h4><a href=\"{{ href }}\">{{ name }}</a></h4>
      <p>{{ description }}</p>
      {% if price %}
        <div class=\"price\">
          {% if not special %}
            <span class=\"price-new\">{{ price }}</span>
          {% else %}
            <span class=\"price-new\">{{ special }}</span> <span class=\"price-old\">{{ price }}</span>
          {% endif %}
          {% if tax %}
            <span class=\"price-tax\">{{ text_tax }} {{ tax }}</span>
          {% endif %}
        </div>
      {% endif %}
      {% if review_status and rating %}
        <div class=\"rating\">
          {% for i in 1..5 %}
            {% if rating < i %}
              <span class=\"fa-stack\"><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
            {% else %}
              <span class=\"fa-stack\"><i class=\"fa-solid fa-star fa-stack-1x\"></i><i class=\"fa-regular fa-star fa-stack-1x\"></i></span>
            {% endif %}
          {% endfor %}
        </div>
      {% endif %}
    </div>
    <form method=\"post\" data-oc-toggle=\"ajax\"{% if cart_enabled %} data-oc-load=\"{{ cart }}\" data-oc-target=\"#cart\"{% endif %}>
      <div class=\"button\">
        {% if cart_enabled %}
          <button type=\"submit\" formaction=\"{{ cart_add }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_cart }}\"><i class=\"fa-solid fa-shopping-cart\"></i></button>
        {% endif %}
        {% if wishlist_enabled %}
          <button type=\"submit\" formaction=\"{{ wishlist_add }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_wishlist }}\" ><i class=\"fa-solid fa-heart\"></i></button>
        {% endif %}
        {% if compare_enabled %}
          <button type=\"submit\" formaction=\"{{ compare_add }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_compare }}\"><i class=\"fa-solid fa-arrow-right-arrow-left\"></i></button>
        {% endif %}
      </div>
      <input type=\"hidden\" name=\"product_id\" value=\"{{ product_id }}\"/> <input type=\"hidden\" name=\"quantity\" value=\"{{ minimum }}\"/>
    </form>
  </div>
</div>
", "catalog/view/template/product/thumb.twig", "/Applications/MAMP/htdocs/catalog/view/template/product/thumb.twig");
    }
}
