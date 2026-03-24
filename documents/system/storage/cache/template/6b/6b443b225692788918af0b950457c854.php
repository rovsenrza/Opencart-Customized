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

/* catalog/view/template/account/wishlist_list.twig */
class __TwigTemplate_82b05f02387f07d0199378dbb601249c extends Template
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
        if (($context["products"] ?? null)) {
            // line 2
            yield "  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th class=\"text-center\">";
            // line 6
            yield ($context["column_image"] ?? null);
            yield "</th>
          <th>";
            // line 7
            yield ($context["column_name"] ?? null);
            yield "</th>
          <th>";
            // line 8
            yield ($context["column_model"] ?? null);
            yield "</th>
          <th class=\"text-end\">";
            // line 9
            yield ($context["column_stock"] ?? null);
            yield "</th>
          <th class=\"text-end\">";
            // line 10
            yield ($context["column_price"] ?? null);
            yield "</th>
          <th class=\"text-end\">";
            // line 11
            yield ($context["column_action"] ?? null);
            yield "</th>
        </tr>
      </thead>
      <tbody>
        ";
            // line 15
            $context["product_row"] = 0;
            // line 16
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 17
                yield "          <tr>
            <td class=\"text-center\">";
                // line 18
                if (CoreExtension::getAttribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 18)) {
                    yield "<a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 18);
                    yield "\"><img src=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 18);
                    yield "\" alt=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 18);
                    yield "\" title=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 18);
                    yield "\"/></a>";
                }
                yield "</td>
            <td><a href=\"";
                // line 19
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 19);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 19);
                yield "</a>
              ";
                // line 20
                if (($context["cart_enabled"] ?? null)) {
                    // line 21
                    yield "                <form id=\"form-product-";
                    yield ($context["product_row"] ?? null);
                    yield "\" action=\"";
                    yield ($context["cart_add"] ?? null);
                    yield "\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"";
                    yield ($context["cart"] ?? null);
                    yield "\" data-oc-target=\"#cart\">
                  <input type=\"hidden\" name=\"product_id\" value=\"";
                    // line 22
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 22);
                    yield "\"/>
                  <input type=\"hidden\" name=\"quantity\" value=\"";
                    // line 23
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 23);
                    yield "\"/>
                </form>
              ";
                }
                // line 26
                yield "            </td>
            <td>";
                // line 27
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 27);
                yield "</td>
            <td class=\"text-end\">";
                // line 28
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 28);
                yield "</td>
            <td class=\"text-end text-nowrap\">
              ";
                // line 30
                if (CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 30)) {
                    // line 31
                    yield "                <div class=\"price\">
                  ";
                    // line 32
                    if ( !CoreExtension::getAttribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 32)) {
                        // line 33
                        yield "                    ";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 33);
                        yield "
                  ";
                    } else {
                        // line 35
                        yield "                    <b>";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 35);
                        yield "</b> <s>";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 35);
                        yield "</s>
                  ";
                    }
                    // line 37
                    yield "                </div>
              ";
                }
                // line 38
                yield "</td>
            <td class=\"text-end text-nowrap\" style=\"width: 1px;\">
              <div class=\"d-grid\">
                ";
                // line 41
                if (($context["cart_enabled"] ?? null)) {
                    // line 42
                    yield "                  <button type=\"submit\" form=\"form-product-";
                    yield ($context["product_row"] ?? null);
                    yield "\" class=\"btn btn-primary mb-1\">";
                    yield ($context["button_cart"] ?? null);
                    yield "</button>
                ";
                }
                // line 44
                yield "                <a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "remove", [], "any", false, false, false, 44);
                yield "\" class=\"btn btn-danger btn-wishlist-remove\" data-remove-url=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "remove", [], "any", false, false, false, 44), "html_attr");
                yield "\" data-product-id=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 44);
                yield "\">";
                yield ($context["button_remove"] ?? null);
                yield "</a>
              </div>
            </td>
          </tr>
          ";
                // line 48
                $context["product_row"] = (($context["product_row"] ?? null) + 1);
                // line 49
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            yield "      </tbody>
    </table>
  </div>
";
        } else {
            // line 54
            yield "  <p>";
            yield ($context["text_no_results"] ?? null);
            yield "</p>
";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/account/wishlist_list.twig";
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
        return array (  208 => 54,  202 => 50,  196 => 49,  194 => 48,  180 => 44,  172 => 42,  170 => 41,  165 => 38,  161 => 37,  153 => 35,  147 => 33,  145 => 32,  142 => 31,  140 => 30,  135 => 28,  131 => 27,  128 => 26,  122 => 23,  118 => 22,  109 => 21,  107 => 20,  101 => 19,  87 => 18,  84 => 17,  79 => 16,  77 => 15,  70 => 11,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  44 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if products %}
  <div class=\"table-responsive\">
    <table class=\"table table-bordered table-hover\">
      <thead>
        <tr>
          <th class=\"text-center\">{{ column_image }}</th>
          <th>{{ column_name }}</th>
          <th>{{ column_model }}</th>
          <th class=\"text-end\">{{ column_stock }}</th>
          <th class=\"text-end\">{{ column_price }}</th>
          <th class=\"text-end\">{{ column_action }}</th>
        </tr>
      </thead>
      <tbody>
        {% set product_row = 0 %}
        {% for product in products %}
          <tr>
            <td class=\"text-center\">{% if product.thumb %}<a href=\"{{ product.href }}\"><img src=\"{{ product.thumb }}\" alt=\"{{ product.name }}\" title=\"{{ product.name }}\"/></a>{% endif %}</td>
            <td><a href=\"{{ product.href }}\">{{ product.name }}</a>
              {% if cart_enabled %}
                <form id=\"form-product-{{ product_row }}\" action=\"{{ cart_add }}\" method=\"post\" data-oc-toggle=\"ajax\" data-oc-load=\"{{ cart }}\" data-oc-target=\"#cart\">
                  <input type=\"hidden\" name=\"product_id\" value=\"{{ product.product_id }}\"/>
                  <input type=\"hidden\" name=\"quantity\" value=\"{{ product.minimum }}\"/>
                </form>
              {% endif %}
            </td>
            <td>{{ product.model }}</td>
            <td class=\"text-end\">{{ product.stock }}</td>
            <td class=\"text-end text-nowrap\">
              {% if product.price %}
                <div class=\"price\">
                  {% if not product.special %}
                    {{ product.price }}
                  {% else %}
                    <b>{{ product.special }}</b> <s>{{ product.price }}</s>
                  {% endif %}
                </div>
              {% endif %}</td>
            <td class=\"text-end text-nowrap\" style=\"width: 1px;\">
              <div class=\"d-grid\">
                {% if cart_enabled %}
                  <button type=\"submit\" form=\"form-product-{{ product_row }}\" class=\"btn btn-primary mb-1\">{{ button_cart }}</button>
                {% endif %}
                <a href=\"{{ product.remove }}\" class=\"btn btn-danger btn-wishlist-remove\" data-remove-url=\"{{ product.remove|e('html_attr') }}\" data-product-id=\"{{ product.product_id }}\">{{ button_remove }}</a>
              </div>
            </td>
          </tr>
          {% set product_row = product_row + 1 %}
        {% endfor %}
      </tbody>
    </table>
  </div>
{% else %}
  <p>{{ text_no_results }}</p>
{% endif %}
", "catalog/view/template/account/wishlist_list.twig", "/Applications/MAMP/htdocs/catalog/view/template/account/wishlist_list.twig");
    }
}
