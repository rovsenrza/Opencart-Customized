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

/* admin/view/template/setting/feature.twig */
class __TwigTemplate_af766bf65eeae417bb33b6d9628cb03f extends Template
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
        yield ($context["header"] ?? null);
        yield ($context["column_left"] ?? null);
        yield "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-feature\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        yield ($context["button_save"] ?? null);
        yield "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"";
        // line 7
        yield ($context["back"] ?? null);
        yield "\" data-bs-toggle=\"tooltip\" title=\"";
        yield ($context["button_back"] ?? null);
        yield "\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>";
        // line 9
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            yield "          <li class=\"breadcrumb-item\"><a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 12);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 12);
            yield "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['breadcrumb'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> ";
        // line 19
        yield ($context["text_edit"] ?? null);
        yield "</div>
      <div class=\"card-body\">
        <p class=\"text-muted mb-4\">";
        // line 21
        yield ($context["text_description"] ?? null);
        yield "</p>
        <form id=\"form-feature\" action=\"";
        // line 22
        yield ($context["save"] ?? null);
        yield "\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3\">
            <label for=\"input-feature-account\" class=\"col-sm-3 col-form-label\">";
        // line 24
        yield ($context["entry_account"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_account\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_account\" value=\"1\" id=\"input-feature-account\" class=\"form-check-input\"";
        // line 28
        if (($context["config_feature_account"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 30
        yield ($context["help_account"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-wishlist\" class=\"col-sm-3 col-form-label\">";
        // line 34
        yield ($context["entry_wishlist"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_wishlist\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_wishlist\" value=\"1\" id=\"input-feature-wishlist\" class=\"form-check-input\"";
        // line 38
        if (($context["config_feature_wishlist"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 40
        yield ($context["help_wishlist"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-checkout\" class=\"col-sm-3 col-form-label\">";
        // line 44
        yield ($context["entry_checkout"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_checkout\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_checkout\" value=\"1\" id=\"input-feature-checkout\" class=\"form-check-input\"";
        // line 48
        if (($context["config_feature_checkout"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 50
        yield ($context["help_checkout"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-cart\" class=\"col-sm-3 col-form-label\">";
        // line 54
        yield ($context["entry_cart"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_cart\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_cart\" value=\"1\" id=\"input-feature-cart\" class=\"form-check-input\"";
        // line 58
        if (($context["config_feature_cart"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 60
        yield ($context["help_cart"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-coupon\" class=\"col-sm-3 col-form-label\">";
        // line 64
        yield ($context["entry_coupon"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_coupon\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_coupon\" value=\"1\" id=\"input-feature-coupon\" class=\"form-check-input\"";
        // line 68
        if (($context["config_feature_coupon"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 70
        yield ($context["help_coupon"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-affiliate\" class=\"col-sm-3 col-form-label\">";
        // line 74
        yield ($context["entry_affiliate"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_affiliate\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_affiliate\" value=\"1\" id=\"input-feature-affiliate\" class=\"form-check-input\"";
        // line 78
        if (($context["config_feature_affiliate"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 80
        yield ($context["help_affiliate"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-review\" class=\"col-sm-3 col-form-label\">";
        // line 84
        yield ($context["entry_review"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_review\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_review\" value=\"1\" id=\"input-feature-review\" class=\"form-check-input\"";
        // line 88
        if (($context["config_feature_review"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 90
        yield ($context["help_review"] ?? null);
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-compare\" class=\"col-sm-3 col-form-label\">";
        // line 94
        yield ($context["entry_compare"] ?? null);
        yield "</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_compare\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_compare\" value=\"1\" id=\"input-feature-compare\" class=\"form-check-input\"";
        // line 98
        if (($context["config_feature_compare"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
              <div class=\"form-text\">";
        // line 100
        yield ($context["help_compare"] ?? null);
        yield "</div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
";
        // line 108
        yield ($context["footer"] ?? null);
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/view/template/setting/feature.twig";
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
        return array (  275 => 108,  264 => 100,  257 => 98,  250 => 94,  243 => 90,  236 => 88,  229 => 84,  222 => 80,  215 => 78,  208 => 74,  201 => 70,  194 => 68,  187 => 64,  180 => 60,  173 => 58,  166 => 54,  159 => 50,  152 => 48,  145 => 44,  138 => 40,  131 => 38,  124 => 34,  117 => 30,  110 => 28,  103 => 24,  98 => 22,  94 => 21,  89 => 19,  82 => 14,  71 => 12,  67 => 11,  62 => 9,  55 => 7,  51 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-feature\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-floppy-disk\"></i></button>
        <a href=\"{{ back }}\" data-bs-toggle=\"tooltip\" title=\"{{ button_back }}\" class=\"btn btn-light\"><i class=\"fa-solid fa-reply\"></i></a>
      </div>
      <h1>{{ heading_title }}</h1>
      <ol class=\"breadcrumb\">
        {% for breadcrumb in breadcrumbs %}
          <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
        {% endfor %}
      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-pencil\"></i> {{ text_edit }}</div>
      <div class=\"card-body\">
        <p class=\"text-muted mb-4\">{{ text_description }}</p>
        <form id=\"form-feature\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3\">
            <label for=\"input-feature-account\" class=\"col-sm-3 col-form-label\">{{ entry_account }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_account\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_account\" value=\"1\" id=\"input-feature-account\" class=\"form-check-input\"{% if config_feature_account %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_account }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-wishlist\" class=\"col-sm-3 col-form-label\">{{ entry_wishlist }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_wishlist\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_wishlist\" value=\"1\" id=\"input-feature-wishlist\" class=\"form-check-input\"{% if config_feature_wishlist %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_wishlist }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-checkout\" class=\"col-sm-3 col-form-label\">{{ entry_checkout }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_checkout\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_checkout\" value=\"1\" id=\"input-feature-checkout\" class=\"form-check-input\"{% if config_feature_checkout %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_checkout }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-cart\" class=\"col-sm-3 col-form-label\">{{ entry_cart }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_cart\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_cart\" value=\"1\" id=\"input-feature-cart\" class=\"form-check-input\"{% if config_feature_cart %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_cart }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-coupon\" class=\"col-sm-3 col-form-label\">{{ entry_coupon }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_coupon\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_coupon\" value=\"1\" id=\"input-feature-coupon\" class=\"form-check-input\"{% if config_feature_coupon %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_coupon }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-affiliate\" class=\"col-sm-3 col-form-label\">{{ entry_affiliate }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_affiliate\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_affiliate\" value=\"1\" id=\"input-feature-affiliate\" class=\"form-check-input\"{% if config_feature_affiliate %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_affiliate }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-review\" class=\"col-sm-3 col-form-label\">{{ entry_review }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_review\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_review\" value=\"1\" id=\"input-feature-review\" class=\"form-check-input\"{% if config_feature_review %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_review }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label for=\"input-feature-compare\" class=\"col-sm-3 col-form-label\">{{ entry_compare }}</label>
            <div class=\"col-sm-9\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"config_feature_compare\" value=\"0\"/>
                <input type=\"checkbox\" name=\"config_feature_compare\" value=\"1\" id=\"input-feature-compare\" class=\"form-check-input\"{% if config_feature_compare %} checked{% endif %}/>
              </div>
              <div class=\"form-text\">{{ help_compare }}</div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{ footer }}
", "admin/view/template/setting/feature.twig", "/Applications/MAMP/htdocs/admin/view/template/setting/feature.twig");
    }
}
