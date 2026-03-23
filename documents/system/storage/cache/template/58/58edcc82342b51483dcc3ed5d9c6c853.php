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

/* catalog/view/template/cms/blog.twig */
class __TwigTemplate_e256632bb5c0eb78bac5e53288c272b3 extends Template
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
        yield "
<div id=\"product-category\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            yield "      <li class=\"breadcrumb-item\"><a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 5);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 5);
            yield "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['breadcrumb'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        yield "  </ul>
  <div class=\"row\">
    ";
        // line 9
        yield ($context["column_left"] ?? null);
        yield "
    <div id=\"content\" class=\"col\">
      ";
        // line 11
        yield ($context["content_top"] ?? null);
        yield "
      <h1>";
        // line 12
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      ";
        // line 13
        if (($context["image"] ?? null)) {
            // line 14
            yield "        <img src=\"";
            yield ($context["image"] ?? null);
            yield "\" alt=\"";
            yield ($context["heading_title"] ?? null);
            yield "\" title=\"";
            yield ($context["heading_title"] ?? null);
            yield "\" class=\"img-fluid cms-original-image mb-3\"/>
      ";
        }
        // line 16
        yield "      ";
        if (($context["description"] ?? null)) {
            // line 17
            yield "        <div class=\"mb-3\">";
            yield ($context["description"] ?? null);
            yield "</div>
      ";
        }
        // line 19
        yield "      <hr/>
      <h3>";
        // line 20
        yield ($context["text_refine"] ?? null);
        yield "</h3>
      <div class=\"input-group dropdown mb-3\">
        <input type=\"text\" name=\"search\" value=\"";
        // line 22
        yield ($context["search"] ?? null);
        yield "\" placeholder=\"";
        yield ($context["entry_search"] ?? null);
        yield "\" id=\"input-search\" class=\"form-control\"/>
        ";
        // line 23
        if (($context["topics"] ?? null)) {
            // line 24
            yield "          <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\" onchange=\"\">
            <option value=\"\">";
            // line 25
            yield ($context["text_all"] ?? null);
            yield "</option>
            ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["topics"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                // line 27
                yield "              <option value=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 27);
                yield "\"";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "topic_id", [], "any", false, false, false, 27) == ($context["topic_id"] ?? null))) {
                    yield " selected";
                }
                yield ">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["topic"], "name", [], "any", false, false, false, 27);
                yield "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            yield "          </select>
        ";
        }
        // line 31
        yield "        <button id=\"button-search\" class=\"btn btn-primary\">";
        yield ($context["button_search"] ?? null);
        yield "</button>
      </div>
      <div class=\"row mb-3\">
        <div class=\"col-lg offset-lg-8\">
          <div class=\"input-group\">
            <label for=\"input-sort\" class=\"input-group-text\">";
        // line 36
        yield ($context["text_sort"] ?? null);
        yield "</label> <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
              ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable($context["sorts"]);
        foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
            // line 38
            yield "                <option value=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 38);
            yield "\"";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 38) == Twig\Extension\CoreExtension::sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                yield " selected";
            }
            yield ">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 38);
            yield "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['sorts'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        yield "            </select>
          </div>
        </div>
      </div>
      ";
        // line 44
        if (($context["articles"] ?? null)) {
            // line 45
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["articles"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
                // line 46
                yield "          <div class=\"mb-3\">
            <h2><a href=\"";
                // line 47
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 47);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 47);
                yield "</a></h2>
            ";
                // line 48
                if (CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 48)) {
                    // line 49
                    yield "              <div><a href=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 49);
                    yield "\"><img src=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 49);
                    yield "\" title=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 49);
                    yield "\" alt=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "name", [], "any", false, false, false, 49);
                    yield "\" class=\"img-fluid cms-original-image mb-1\"/></a></div>
            ";
                }
                // line 51
                yield "            <ul class=\"list-inline\">
              <li class=\"list-inline-item\">";
                // line 52
                yield ($context["text_by"] ?? null);
                yield " <a href=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "filter_author", [], "any", false, false, false, 52);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "author", [], "any", false, false, false, 52);
                yield "</a></li>
              <li class=\"list-inline-item\">";
                // line 53
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "date_added", [], "any", false, false, false, 53);
                yield "</li>
              <li class=\"list-inline-item\">";
                // line 54
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "comment_total", [], "any", false, false, false, 54);
                yield " ";
                yield ($context["text_comment"] ?? null);
                yield "</li>
            </ul>
            <p class=\"mb-3\">";
                // line 56
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "description", [], "any", false, false, false, 56);
                yield "</p>
            <div class=\"text-end\"><a href=\"";
                // line 57
                yield CoreExtension::getAttribute($this->env, $this->source, $context["article"], "href", [], "any", false, false, false, 57);
                yield "\" class=\"btn btn-primary\">";
                yield ($context["button_continue"] ?? null);
                yield "</a></div>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['article'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            yield "        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">";
            // line 61
            yield ($context["pagination"] ?? null);
            yield "</div>
          <div class=\"col-sm-6 text-end\">";
            // line 62
            yield ($context["results"] ?? null);
            yield "</div>
        </div>
      ";
        } else {
            // line 65
            yield "        <p class=\"text-center\">";
            yield ($context["text_no_results"] ?? null);
            yield "</p>
      ";
        }
        // line 67
        yield "      ";
        yield ($context["content_bottom"] ?? null);
        yield "
    </div>
    ";
        // line 69
        yield ($context["column_right"] ?? null);
        yield "
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-search').bind('click', function() {
    url = 'index.php?route=cms/blog&language=";
        // line 74
        yield ($context["language"] ?? null);
        yield "';

    var search = \$('#input-search').val();

    if (search) {
        url += '&search=' + encodeURIComponent(search);
    }

    var topic_id = \$('#input-topic').prop('value');

    if (topic_id > 0) {
        url += '&topic_id=' + topic_id;
    }

    location = url;
});

\$('#input-search').bind('keydown', function(e) {
    if (e.keyCode == 13) {
        \$('#button-search').trigger('click');
    }
});
//--></script>
";
        // line 97
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
        return "catalog/view/template/cms/blog.twig";
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
        return array (  311 => 97,  285 => 74,  277 => 69,  271 => 67,  265 => 65,  259 => 62,  255 => 61,  252 => 60,  241 => 57,  237 => 56,  230 => 54,  226 => 53,  218 => 52,  215 => 51,  203 => 49,  201 => 48,  195 => 47,  192 => 46,  187 => 45,  185 => 44,  179 => 40,  164 => 38,  160 => 37,  156 => 36,  147 => 31,  143 => 29,  128 => 27,  124 => 26,  120 => 25,  117 => 24,  115 => 23,  109 => 22,  104 => 20,  101 => 19,  95 => 17,  92 => 16,  82 => 14,  80 => 13,  76 => 12,  72 => 11,  67 => 9,  63 => 7,  52 => 5,  48 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}
<div id=\"product-category\" class=\"container\">
  <ul class=\"breadcrumb\">
    {% for breadcrumb in breadcrumbs %}
      <li class=\"breadcrumb-item\"><a href=\"{{ breadcrumb.href }}\">{{ breadcrumb.text }}</a></li>
    {% endfor %}
  </ul>
  <div class=\"row\">
    {{ column_left }}
    <div id=\"content\" class=\"col\">
      {{ content_top }}
      <h1>{{ heading_title }}</h1>
      {% if image %}
        <img src=\"{{ image }}\" alt=\"{{ heading_title }}\" title=\"{{ heading_title }}\" class=\"img-fluid cms-original-image mb-3\"/>
      {% endif %}
      {% if description %}
        <div class=\"mb-3\">{{ description }}</div>
      {% endif %}
      <hr/>
      <h3>{{ text_refine }}</h3>
      <div class=\"input-group dropdown mb-3\">
        <input type=\"text\" name=\"search\" value=\"{{ search }}\" placeholder=\"{{ entry_search }}\" id=\"input-search\" class=\"form-control\"/>
        {% if topics %}
          <select name=\"topic_id\" id=\"input-topic\" class=\"form-select\" onchange=\"\">
            <option value=\"\">{{ text_all }}</option>
            {% for topic in topics %}
              <option value=\"{{ topic.topic_id }}\"{% if topic.topic_id == topic_id %} selected{% endif %}>{{ topic.name }}</option>
            {% endfor %}
          </select>
        {% endif %}
        <button id=\"button-search\" class=\"btn btn-primary\">{{ button_search }}</button>
      </div>
      <div class=\"row mb-3\">
        <div class=\"col-lg offset-lg-8\">
          <div class=\"input-group\">
            <label for=\"input-sort\" class=\"input-group-text\">{{ text_sort }}</label> <select id=\"input-sort\" class=\"form-select\" onchange=\"location = this.value;\">
              {% for sorts in sorts %}
                <option value=\"{{ sorts.href }}\"{% if sorts.value == '%s-%s'|format(sort, order) %} selected{% endif %}>{{ sorts.text }}</option>
              {% endfor %}
            </select>
          </div>
        </div>
      </div>
      {% if articles %}
        {% for article in articles %}
          <div class=\"mb-3\">
            <h2><a href=\"{{ article.href }}\">{{ article.name }}</a></h2>
            {% if article.image %}
              <div><a href=\"{{ article.href }}\"><img src=\"{{ article.image }}\" title=\"{{ article.name }}\" alt=\"{{ article.name }}\" class=\"img-fluid cms-original-image mb-1\"/></a></div>
            {% endif %}
            <ul class=\"list-inline\">
              <li class=\"list-inline-item\">{{ text_by }} <a href=\"{{ article.filter_author }}\">{{ article.author }}</a></li>
              <li class=\"list-inline-item\">{{ article.date_added }}</li>
              <li class=\"list-inline-item\">{{ article.comment_total }} {{ text_comment }}</li>
            </ul>
            <p class=\"mb-3\">{{ article.description }}</p>
            <div class=\"text-end\"><a href=\"{{ article.href }}\" class=\"btn btn-primary\">{{ button_continue }}</a></div>
          </div>
        {% endfor %}
        <div class=\"row\">
          <div class=\"col-sm-6 text-start\">{{ pagination }}</div>
          <div class=\"col-sm-6 text-end\">{{ results }}</div>
        </div>
      {% else %}
        <p class=\"text-center\">{{ text_no_results }}</p>
      {% endif %}
      {{ content_bottom }}
    </div>
    {{ column_right }}
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-search').bind('click', function() {
    url = 'index.php?route=cms/blog&language={{ language }}';

    var search = \$('#input-search').val();

    if (search) {
        url += '&search=' + encodeURIComponent(search);
    }

    var topic_id = \$('#input-topic').prop('value');

    if (topic_id > 0) {
        url += '&topic_id=' + topic_id;
    }

    location = url;
});

\$('#input-search').bind('keydown', function(e) {
    if (e.keyCode == 13) {
        \$('#button-search').trigger('click');
    }
});
//--></script>
{{ footer }}
", "catalog/view/template/cms/blog.twig", "/Applications/MAMP/htdocs/catalog/view/template/cms/blog.twig");
    }
}
