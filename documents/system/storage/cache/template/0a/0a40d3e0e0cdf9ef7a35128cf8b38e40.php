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

/* catalog/view/template/common/footer.twig */
class __TwigTemplate_27193f9315e28bcf1a5c7da4103a47c0 extends Template
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
        yield "</main>
<footer>
  <div class=\"container\">
    <div class=\"row\">
      ";
        // line 5
        if ((($context["informations"] ?? null) || ($context["blog"] ?? null))) {
            // line 6
            yield "        <div class=\"col-sm-3\">
          <h5>";
            // line 7
            yield ($context["text_information"] ?? null);
            yield "</h5>
          <ul class=\"list-unstyled\">
            ";
            // line 9
            if (($context["blog"] ?? null)) {
                // line 10
                yield "              <li><a href=\"";
                yield ($context["blog"] ?? null);
                yield "\">";
                yield ($context["text_blog"] ?? null);
                yield "</a></li>
            ";
            }
            // line 12
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["informations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
                // line 13
                yield "              <li><a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["information"], "href", [], "any", false, false, false, 13);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 13);
                yield "</a></li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['information'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            yield "          </ul>
        </div>
      ";
        }
        // line 18
        yield "      <div class=\"col-sm-3\">
        <h5>";
        // line 19
        yield ($context["text_service"] ?? null);
        yield "</h5>
        <ul class=\"list-unstyled\">
          <li><a href=\"";
        // line 21
        yield ($context["contact"] ?? null);
        yield "\">";
        yield ($context["text_contact"] ?? null);
        yield "</a></li>
          ";
        // line 22
        if (($context["return"] ?? null)) {
            // line 23
            yield "            <li><a href=\"";
            yield ($context["return"] ?? null);
            yield "\">";
            yield ($context["text_return"] ?? null);
            yield "</a></li>
          ";
        }
        // line 25
        yield "          ";
        if (($context["gdpr"] ?? null)) {
            // line 26
            yield "            <li><a href=\"";
            yield ($context["gdpr"] ?? null);
            yield "\">";
            yield ($context["text_gdpr"] ?? null);
            yield "</a></li>
          ";
        }
        // line 28
        yield "          <li><a href=\"";
        yield ($context["sitemap"] ?? null);
        yield "\">";
        yield ($context["text_sitemap"] ?? null);
        yield "</a></li>
        </ul>
      </div>
      <div class=\"col-sm-3\">
        <h5>";
        // line 32
        yield ($context["text_extra"] ?? null);
        yield "</h5>
        <ul class=\"list-unstyled\">
          <li><a href=\"";
        // line 34
        yield ($context["manufacturer"] ?? null);
        yield "\">";
        yield ($context["text_manufacturer"] ?? null);
        yield "</a></li>
          ";
        // line 35
        if (($context["affiliate"] ?? null)) {
            // line 36
            yield "            <li><a href=\"";
            yield ($context["affiliate"] ?? null);
            yield "\">";
            yield ($context["text_affiliate"] ?? null);
            yield "</a></li>
          ";
        }
        // line 38
        yield "          <li><a href=\"";
        yield ($context["special"] ?? null);
        yield "\">";
        yield ($context["text_special"] ?? null);
        yield "</a></li>
        </ul>
      </div>
      ";
        // line 41
        if (($context["account_links_visible"] ?? null)) {
            // line 42
            yield "        <div class=\"col-sm-3\">
          <h5>";
            // line 43
            yield ($context["text_account"] ?? null);
            yield "</h5>
          <ul class=\"list-unstyled\">
            ";
            // line 45
            if (($context["account_enabled"] ?? null)) {
                // line 46
                yield "              <li><a href=\"";
                yield ($context["account"] ?? null);
                yield "\">";
                yield ($context["text_account"] ?? null);
                yield "</a></li>
              <li><a href=\"";
                // line 47
                yield ($context["order"] ?? null);
                yield "\">";
                yield ($context["text_order"] ?? null);
                yield "</a></li>
            ";
            }
            // line 49
            yield "            ";
            if (($context["wishlist_enabled"] ?? null)) {
                // line 50
                yield "              <li><a href=\"";
                yield ($context["wishlist"] ?? null);
                yield "\">";
                yield ($context["text_wishlist"] ?? null);
                yield "</a></li>
            ";
            }
            // line 52
            yield "            ";
            if (($context["account_enabled"] ?? null)) {
                // line 53
                yield "              <li><a href=\"";
                yield ($context["newsletter"] ?? null);
                yield "\">";
                yield ($context["text_newsletter"] ?? null);
                yield "</a></li>
            ";
            }
            // line 55
            yield "          </ul>
        </div>
      ";
        }
        // line 58
        yield "    </div>
    <hr>
    <p>";
        // line 60
        yield ($context["powered"] ?? null);
        yield "</p>
    <!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
  </div>
</footer>
</div>
";
        // line 68
        yield ($context["cookie"] ?? null);
        yield "
<script src=\"";
        // line 69
        yield ($context["bootstrap"] ?? null);
        yield "\" type=\"text/javascript\"></script>
";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 71
            yield "  <script src=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["script"], "href", [], "any", false, false, false, 71);
            yield "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['script'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        yield "</body></html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog/view/template/common/footer.twig";
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
        return array (  253 => 73,  244 => 71,  240 => 70,  236 => 69,  232 => 68,  221 => 60,  217 => 58,  212 => 55,  204 => 53,  201 => 52,  193 => 50,  190 => 49,  183 => 47,  176 => 46,  174 => 45,  169 => 43,  166 => 42,  164 => 41,  155 => 38,  147 => 36,  145 => 35,  139 => 34,  134 => 32,  124 => 28,  116 => 26,  113 => 25,  105 => 23,  103 => 22,  97 => 21,  92 => 19,  89 => 18,  84 => 15,  73 => 13,  68 => 12,  60 => 10,  58 => 9,  53 => 7,  50 => 6,  48 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("</main>
<footer>
  <div class=\"container\">
    <div class=\"row\">
      {% if informations or blog %}
        <div class=\"col-sm-3\">
          <h5>{{ text_information }}</h5>
          <ul class=\"list-unstyled\">
            {% if blog %}
              <li><a href=\"{{ blog }}\">{{ text_blog }}</a></li>
            {% endif %}
            {% for information in informations %}
              <li><a href=\"{{ information.href }}\">{{ information.title }}</a></li>
            {% endfor %}
          </ul>
        </div>
      {% endif %}
      <div class=\"col-sm-3\">
        <h5>{{ text_service }}</h5>
        <ul class=\"list-unstyled\">
          <li><a href=\"{{ contact }}\">{{ text_contact }}</a></li>
          {% if return %}
            <li><a href=\"{{ return }}\">{{ text_return }}</a></li>
          {% endif %}
          {% if gdpr %}
            <li><a href=\"{{ gdpr }}\">{{ text_gdpr }}</a></li>
          {% endif %}
          <li><a href=\"{{ sitemap }}\">{{ text_sitemap }}</a></li>
        </ul>
      </div>
      <div class=\"col-sm-3\">
        <h5>{{ text_extra }}</h5>
        <ul class=\"list-unstyled\">
          <li><a href=\"{{ manufacturer }}\">{{ text_manufacturer }}</a></li>
          {% if affiliate %}
            <li><a href=\"{{ affiliate }}\">{{ text_affiliate }}</a></li>
          {% endif %}
          <li><a href=\"{{ special }}\">{{ text_special }}</a></li>
        </ul>
      </div>
      {% if account_links_visible %}
        <div class=\"col-sm-3\">
          <h5>{{ text_account }}</h5>
          <ul class=\"list-unstyled\">
            {% if account_enabled %}
              <li><a href=\"{{ account }}\">{{ text_account }}</a></li>
              <li><a href=\"{{ order }}\">{{ text_order }}</a></li>
            {% endif %}
            {% if wishlist_enabled %}
              <li><a href=\"{{ wishlist }}\">{{ text_wishlist }}</a></li>
            {% endif %}
            {% if account_enabled %}
              <li><a href=\"{{ newsletter }}\">{{ text_newsletter }}</a></li>
            {% endif %}
          </ul>
        </div>
      {% endif %}
    </div>
    <hr>
    <p>{{ powered }}</p>
    <!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
  </div>
</footer>
</div>
{{ cookie }}
<script src=\"{{ bootstrap }}\" type=\"text/javascript\"></script>
{% for script in scripts %}
  <script src=\"{{ script.href }}\" type=\"text/javascript\"></script>
{% endfor %}
</body></html>
", "catalog/view/template/common/footer.twig", "/Applications/MAMP/htdocs/catalog/view/template/common/footer.twig");
    }
}
