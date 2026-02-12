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

/* admin/view/template/tool/sitemap.twig */
class __TwigTemplate_4b5850fb140d3d4137939f46fc7eed66 extends Template
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
      <h1>";
        // line 5
        yield ($context["heading_title"] ?? null);
        yield "</h1>
      <ol class=\"breadcrumb\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            yield "          <li class=\"breadcrumb-item\"><a href=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 8);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 8);
            yield "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['breadcrumb'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        yield "      </ol>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"card\">
      <div class=\"card-header\"><i class=\"fa-solid fa-sitemap\"></i> ";
        // line 15
        yield ($context["heading_title"] ?? null);
        yield "</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>";
        // line 18
        yield ($context["text_information"] ?? null);
        yield "</legend>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 20
        yield ($context["entry_sitemap_url"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\"><a id=\"sitemap-url\" href=\"";
        // line 22
        yield ($context["sitemap_url"] ?? null);
        yield "\" target=\"_blank\">";
        yield ($context["sitemap_url"] ?? null);
        yield "</a></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 26
        yield ($context["entry_date_modified"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\" id=\"sitemap-date-modified\">";
        // line 28
        yield ((($context["date_modified"] ?? null)) ? (($context["date_modified"] ?? null)) : (($context["text_not_generated"] ?? null)));
        yield "</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 32
        yield ($context["entry_file_size"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\" id=\"sitemap-file-size\">";
        // line 34
        yield ((($context["file_size"] ?? null)) ? (($context["file_size"] ?? null)) : (($context["text_not_generated"] ?? null)));
        yield "</div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend>";
        // line 40
        yield ($context["text_generate"] ?? null);
        yield "</legend>
          <p class=\"text-muted\">";
        // line 41
        yield ($context["text_description"] ?? null);
        yield "</p>
          <button type=\"button\" id=\"button-generate\" class=\"btn btn-primary\"><i class=\"fa-solid fa-sitemap\"></i> ";
        // line 42
        yield ($context["button_generate"] ?? null);
        yield "</button>
          <div id=\"sitemap-status\" class=\"mt-3\"></div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-generate').on('click', function() {
    var element = this;

    \$.ajax({
        url: '";
        // line 54
        yield ($context["generate"] ?? null);
        yield "',
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
            \$('#sitemap-status').removeClass('text-danger text-success').text('";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_generating"] ?? null), "js");
        yield "');
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#sitemap-status').addClass('text-danger').text(json['error']);
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                if (json['text']) {
                    \$('#sitemap-status').addClass('text-success').text(json['text']);
                } else {
                    \$('#sitemap-status').addClass('text-success').text(json['success']);
                }

                if (json['date_modified']) {
                    \$('#sitemap-date-modified').text(json['date_modified']);
                }

                if (json['file_size']) {
                    \$('#sitemap-file-size').text(json['file_size']);
                }

                if (json['sitemap']) {
                    \$('#sitemap-url').attr('href', json['sitemap']).text(json['sitemap']);
                }

                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            \$('#sitemap-status').addClass('text-danger').text(thrownError);
        }
    });
});
//--></script>
";
        // line 101
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
        return "admin/view/template/tool/sitemap.twig";
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
        return array (  204 => 101,  159 => 59,  151 => 54,  136 => 42,  132 => 41,  128 => 40,  119 => 34,  114 => 32,  107 => 28,  102 => 26,  93 => 22,  88 => 20,  83 => 18,  77 => 15,  70 => 10,  59 => 8,  55 => 7,  50 => 5,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
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
      <div class=\"card-header\"><i class=\"fa-solid fa-sitemap\"></i> {{ heading_title }}</div>
      <div class=\"card-body\">
        <fieldset>
          <legend>{{ text_information }}</legend>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_sitemap_url }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\"><a id=\"sitemap-url\" href=\"{{ sitemap_url }}\" target=\"_blank\">{{ sitemap_url }}</a></div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_date_modified }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\" id=\"sitemap-date-modified\">{{ date_modified ? date_modified : text_not_generated }}</div>
            </div>
          </div>
          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_file_size }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control\" id=\"sitemap-file-size\">{{ file_size ? file_size : text_not_generated }}</div>
            </div>
          </div>
        </fieldset>

        <fieldset>
          <legend>{{ text_generate }}</legend>
          <p class=\"text-muted\">{{ text_description }}</p>
          <button type=\"button\" id=\"button-generate\" class=\"btn btn-primary\"><i class=\"fa-solid fa-sitemap\"></i> {{ button_generate }}</button>
          <div id=\"sitemap-status\" class=\"mt-3\"></div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-generate').on('click', function() {
    var element = this;

    \$.ajax({
        url: '{{ generate }}',
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            \$(element).prop('disabled', true);
            \$('#sitemap-status').removeClass('text-danger text-success').text('{{ text_generating|escape('js') }}');
        },
        complete: function() {
            \$(element).prop('disabled', false);
        },
        success: function(json) {
            \$('.alert-dismissible').remove();

            if (json['error']) {
                \$('#sitemap-status').addClass('text-danger').text(json['error']);
                \$('#alert').prepend('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa-solid fa-circle-exclamation\"></i> ' + json['error'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }

            if (json['success']) {
                if (json['text']) {
                    \$('#sitemap-status').addClass('text-success').text(json['text']);
                } else {
                    \$('#sitemap-status').addClass('text-success').text(json['success']);
                }

                if (json['date_modified']) {
                    \$('#sitemap-date-modified').text(json['date_modified']);
                }

                if (json['file_size']) {
                    \$('#sitemap-file-size').text(json['file_size']);
                }

                if (json['sitemap']) {
                    \$('#sitemap-url').attr('href', json['sitemap']).text(json['sitemap']);
                }

                \$('#alert').prepend('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa-solid fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button></div>');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
            \$('#sitemap-status').addClass('text-danger').text(thrownError);
        }
    });
});
//--></script>
{{ footer }}
", "admin/view/template/tool/sitemap.twig", "/Applications/MAMP/htdocs/admin/view/template/tool/sitemap.twig");
    }
}
