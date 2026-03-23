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

/* extension/opencart/admin/view/template/module/section.twig */
class __TwigTemplate_255ebcb11d5f4cc153ec056ae5dce4d9 extends Template
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
        <button type=\"submit\" form=\"form-module\" data-bs-toggle=\"tooltip\" title=\"";
        // line 6
        yield ($context["button_save"] ?? null);
        yield "\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
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
        <form id=\"form-module\" action=\"";
        // line 21
        yield ($context["save"] ?? null);
        yield "\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3 required\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">";
        // line 23
        yield ($context["entry_name"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"";
        // line 25
        yield ($context["name"] ?? null);
        yield "\" placeholder=\"";
        yield ($context["entry_name"] ?? null);
        yield "\" id=\"input-name\" class=\"form-control\"/>
              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3 required\">
            <label for=\"input-section-type\" class=\"col-sm-2 col-form-label\">";
        // line 31
        yield ($context["entry_section_type"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <select name=\"section_type\" id=\"input-section-type\" class=\"form-select\">
                ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["section_types"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
            // line 35
            yield "                  <option value=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["type"], "value", [], "any", false, false, false, 35);
            yield "\"";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["type"], "value", [], "any", false, false, false, 35) == ($context["section_type"] ?? null))) {
                yield " selected";
            }
            yield ">";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["type"], "text", [], "any", false, false, false, 35);
            yield "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['type'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        yield "              </select>
              <div id=\"error-section_type\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3 required\">
            <label for=\"input-template-slug\" class=\"col-sm-2 col-form-label\">";
        // line 43
        yield ($context["entry_template_slug"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"template_slug\" value=\"";
        // line 45
        yield ($context["template_slug"] ?? null);
        yield "\" placeholder=\"";
        yield ($context["entry_template_slug"] ?? null);
        yield "\" id=\"input-template-slug\" class=\"form-control\"/>
              <div class=\"form-text\">";
        // line 46
        yield ($context["help_template_slug"] ?? null);
        yield "</div>
              <div id=\"error-template_slug\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 52
        yield ($context["entry_home_only"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control bg-light\">common/home</div>
              <div class=\"form-text\">";
        // line 55
        yield ($context["help_home_only"] ?? null);
        yield "</div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-sliders\"></i> ";
        // line 60
        yield ($context["text_type_configuration"] ?? null);
        yield "</div>
            <div class=\"card-body\">
              <div id=\"typed-fields\"></div>
              <hr/>
              <div id=\"typed-items\"></div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-list-check\"></i> ";
        // line 69
        yield ($context["entry_custom_fields"] ?? null);
        yield "</div>
            <div class=\"card-body\">
              <div id=\"custom-fields\"></div>
              <div class=\"text-end\">
                <button type=\"button\" id=\"button-add-custom-field\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-plus\"></i> ";
        // line 73
        yield ($context["button_add_custom_field"] ?? null);
        yield "</button>
              </div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-layer-group\"></i> ";
        // line 79
        yield ($context["entry_custom_repeaters"] ?? null);
        yield "</div>
            <div class=\"card-body\">
              <div id=\"custom-repeaters\"></div>
              <div class=\"text-end\">
                <button type=\"button\" id=\"button-add-custom-repeater\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-plus\"></i> ";
        // line 83
        yield ($context["button_add_custom_repeater"] ?? null);
        yield "</button>
              </div>
            </div>
          </div>

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">";
        // line 89
        yield ($context["entry_status"] ?? null);
        yield "</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\"/>
                <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"";
        // line 93
        if (($context["status"] ?? null)) {
            yield " checked";
        }
        yield "/>
              </div>
            </div>
          </div>

          <input type=\"hidden\" name=\"fields_json\" value=\"\" id=\"input-fields-json\"/>
          <input type=\"hidden\" name=\"items_json\" value=\"\" id=\"input-items-json\"/>
          <input type=\"hidden\" name=\"custom_fields_json\" value=\"\" id=\"input-custom-fields-json\"/>
          <input type=\"hidden\" name=\"custom_repeaters_json\" value=\"\" id=\"input-custom-repeaters-json\"/>
          <input type=\"hidden\" name=\"module_id\" value=\"";
        // line 102
        yield ($context["module_id"] ?? null);
        yield "\" id=\"input-module-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
(function(\$) {
    'use strict';

    var categories = ";
        // line 112
        yield json_encode(($context["categories"] ?? null));
        yield ";
    var topics = ";
        // line 113
        yield json_encode(($context["topics"] ?? null));
        yield ";

    var state = {
        sectionType: \$('#input-section-type').val(),
        fields: ";
        // line 117
        yield ($context["fields_json"] ?? null);
        yield ",
        items: ";
        // line 118
        yield ($context["items_json"] ?? null);
        yield ",
        customFields: ";
        // line 119
        yield ($context["custom_fields_json"] ?? null);
        yield ",
        customRepeaters: ";
        // line 120
        yield ($context["custom_repeaters_json"] ?? null);
        yield "
    };

    var text = {
        noItems: '";
        // line 124
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_no_items"] ?? null), "js");
        yield "',
        noFields: '";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_no_fields"] ?? null), "js");
        yield "',
        items: '";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_items"] ?? null), "js");
        yield "',
        fields: '";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_fields"] ?? null), "js");
        yield "',
        addItem: '";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["button_add_item"] ?? null), "js");
        yield "',
        addField: '";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["button_add_field"] ?? null), "js");
        yield "',
        remove: '";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["button_remove"] ?? null), "js");
        yield "'
    };

    function typeConfigs() {
        return {
            homepage_slider: {
                fields: [
                    {key: 'headline', label: '";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'}
                ],
                itemLabel: '";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_slides"] ?? null), "js");
        yield "',
                itemFields: [
                    {key: 'image', label: '";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_image"] ?? null), "js");
        yield "', type: 'image'},
                    {key: 'text', label: '";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_slider_text"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'subtext', label: '";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_slider_subtext"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'link', label: '";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_link"] ?? null), "js");
        yield "', type: 'url'}
                ]
            },
            advantages: {
                fields: [
                    {key: 'headline', label: '";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'}
                ],
                itemLabel: '";
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_advantages"] ?? null), "js");
        yield "',
                itemFields: [
                    {key: 'image', label: '";
        // line 153
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_image"] ?? null), "js");
        yield "', type: 'image'},
                    {key: 'text', label: '";
        // line 154
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_text"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'subtext', label: '";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_slider_subtext"] ?? null), "js");
        yield "', type: 'text'}
                ]
            },
            products: {
                fields: [
                    {key: 'headline', label: '";
        // line 160
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'category_id', label: '";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_category"] ?? null), "js");
        yield "', type: 'category'},
                    {key: 'limit', label: '";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_limit"] ?? null), "js");
        yield "', type: 'number', min: 1, max: 100},
                    {key: 'view_all_text', label: '";
        // line 163
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_view_all_text"] ?? null), "js");
        yield "', type: 'text'}
                ],
                itemLabel: '',
                itemFields: []
            },
            cta: {
                fields: [
                    {key: 'headline', label: '";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'description', label: '";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_description"] ?? null), "js");
        yield "', type: 'textarea'}
                ],
                itemLabel: '";
        // line 173
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_social_links"] ?? null), "js");
        yield "',
                itemFields: [
                    {key: 'icon', label: '";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_image"] ?? null), "js");
        yield "', type: 'image'},
                    {key: 'label', label: '";
        // line 176
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_label"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'href', label: '";
        // line 177
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_link"] ?? null), "js");
        yield "', type: 'url'}
                ]
            },
            about: {
                fields: [
                    {key: 'headline', label: '";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'description', label: '";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_description"] ?? null), "js");
        yield "', type: 'textarea'},
                    {key: 'image', label: '";
        // line 184
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_image"] ?? null), "js");
        yield "', type: 'image'}
                ],
                itemLabel: '',
                itemFields: []
            },
            blog: {
                fields: [
                    {key: 'headline', label: '";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'topic_id', label: '";
        // line 192
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_topic"] ?? null), "js");
        yield "', type: 'topic'},
                    {key: 'limit', label: '";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_limit"] ?? null), "js");
        yield "', type: 'number', min: 1, max: 100},
                    {key: 'view_all_text', label: '";
        // line 194
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_view_all_text"] ?? null), "js");
        yield "', type: 'text'}
                ],
                itemLabel: '',
                itemFields: []
            },
            partners: {
                fields: [
                    {key: 'headline', label: '";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'}
                ],
                itemLabel: '";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["text_partners"] ?? null), "js");
        yield "',
                itemFields: [
                    {key: 'image', label: '";
        // line 205
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_image"] ?? null), "js");
        yield "', type: 'image'},
                    {key: 'href', label: '";
        // line 206
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_link"] ?? null), "js");
        yield "', type: 'url'}
                ]
            },
            legacy_html: {
                fields: [
                    {key: 'headline', label: '";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_headline"] ?? null), "js");
        yield "', type: 'text'},
                    {key: 'html', label: '";
        // line 212
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_html"] ?? null), "js");
        yield "', type: 'textarea'}
                ],
                itemLabel: '',
                itemFields: []
            }
        };
    }

    function normalizeKey(value) {
        return String(value || '')
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+\$/g, '');
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/\"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function imageSrc(value) {
        var file = String(value || '').trim();

        if (!file) {
            return '";
        // line 240
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["placeholder"] ?? null), "js");
        yield "';
        }

        return '../image/' + file.replace(/ /g, '%20');
    }

    function renderImagePicker(value, inputClass, attrs, uid) {
        var html = '';
        var attrText = '';
        var key;

        for (key in attrs) {
            if (Object.prototype.hasOwnProperty.call(attrs, key)) {
                attrText += ' ' + key + '=\"' + escapeHtml(attrs[key]) + '\"';
            }
        }

        html += '<div class=\"input-group\">';
        html += '  <div class=\"border rounded p-1 bg-light me-2\">';
        html += '    <img src=\"' + imageSrc(value) + '\" data-oc-placeholder=\"";
        // line 259
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["placeholder"] ?? null), "js");
        yield "\" id=\"thumb-' + uid + '\" alt=\"\" style=\"width: 70px; height: 70px; object-fit: cover;\"/>';
        html += '  </div>';
        html += '  <div class=\"w-100\">';
        html += '    <input type=\"hidden\" class=\"' + inputClass + '\"' + attrText + ' id=\"input-' + uid + '\" value=\"' + escapeHtml(value) + '\"/>';
        html += '    <div class=\"btn-group mt-2\">';
        html += '      <button type=\"button\" class=\"btn btn-primary btn-sm\" data-oc-toggle=\"image\" data-oc-target=\"#input-' + uid + '\" data-oc-thumb=\"#thumb-' + uid + '\"><i class=\"fa-solid fa-pencil\"></i></button>';
        html += '      <button type=\"button\" class=\"btn btn-warning btn-sm\" data-oc-toggle=\"clear\" data-oc-target=\"#input-' + uid + '\" data-oc-thumb=\"#thumb-' + uid + '\"><i class=\"fa-regular fa-trash-can\"></i></button>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        return html;
    }

    function getTypeConfig() {
        var configs = typeConfigs();

        if (!configs[state.sectionType]) {
            state.sectionType = 'homepage_slider';
        }

        return configs[state.sectionType];
    }

    function ensureTypeState() {
        var config = getTypeConfig();

        if (typeof state.fields !== 'object' || Array.isArray(state.fields) || state.fields === null) {
            state.fields = {};
        }

        config.fields.forEach(function(field) {
            if (typeof state.fields[field.key] === 'undefined') {
                state.fields[field.key] = (field.type === 'number') ? (field.min || 1) : '';
            }
        });

        if (!Array.isArray(state.items)) {
            state.items = [];
        }

        if (!config.itemFields.length) {
            state.items = [];
        }

        if (!Array.isArray(state.customFields)) {
            state.customFields = [];
        }

        if (!Array.isArray(state.customRepeaters)) {
            state.customRepeaters = [];
        }
    }

    function renderFieldControl(field, value) {
        var html = '';

        if (field.type === 'textarea') {
            html += '<textarea class=\"form-control js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">' + escapeHtml(value) + '</textarea>';
        } else if (field.type === 'image') {
            html += renderImagePicker(value, 'js-typed-field', {'data-key': field.key}, 'typed-field-' + field.key);
        } else if (field.type === 'category') {
            html += '<select class=\"form-select js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">';
            html += '<option value=\"0\">";
        // line 322
        yield ($context["text_all"] ?? null);
        yield "</option>';

            categories.forEach(function(category) {
                var selected = parseInt(value, 10) === parseInt(category.category_id, 10) ? ' selected' : '';

                html += '<option value=\"' + category.category_id + '\"' + selected + '>' + escapeHtml(category.name) + '</option>';
            });

            html += '</select>';
        } else if (field.type === 'topic') {
            html += '<select class=\"form-select js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">';
            html += '<option value=\"0\">";
        // line 333
        yield ($context["text_all"] ?? null);
        yield "</option>';

            topics.forEach(function(topic) {
                var selected = parseInt(value, 10) === parseInt(topic.topic_id, 10) ? ' selected' : '';

                html += '<option value=\"' + topic.topic_id + '\"' + selected + '>' + escapeHtml(topic.name) + '</option>';
            });

            html += '</select>';
        } else {
            var type = field.type === 'number' ? 'number' : 'text';
            var min = field.type === 'number' && typeof field.min !== 'undefined' ? ' min=\"' + field.min + '\"' : '';
            var max = field.type === 'number' && typeof field.max !== 'undefined' ? ' max=\"' + field.max + '\"' : '';

            html += '<input type=\"' + type + '\" class=\"form-control js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\" value=\"' + escapeHtml(value) + '\"' + min + max + '/>';
        }

        return html;
    }

    function renderTypedFields() {
        var config = getTypeConfig();
        var html = '';

        config.fields.forEach(function(field) {
            var value = state.fields[field.key];

            html += '<div class=\"row mb-3\">';
            html += '  <label class=\"col-sm-2 col-form-label\">' + escapeHtml(field.label) + '</label>';
            html += '  <div class=\"col-sm-10\">' + renderFieldControl(field, value) + '</div>';
            html += '</div>';
        });

        \$('#typed-fields').html(html || '<p class=\"text-muted mb-0\">' + text.noFields + '</p>');
    }

    function renderTypedItems() {
        var config = getTypeConfig();

        if (!config.itemFields.length) {
            \$('#typed-items').html('<p class=\"text-muted mb-0\">' + text.noItems + '</p>');
            return;
        }

        var html = '<div class=\"d-flex justify-content-between align-items-center mb-2\">';
        html += '<h5 class=\"mb-0\">' + escapeHtml(config.itemLabel || text.items) + '</h5>';
        html += '<button type=\"button\" class=\"btn btn-outline-primary btn-sm\" id=\"button-add-typed-item\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addItem) + '</button>';
        html += '</div>';

        html += '<div class=\"table-responsive\"><table class=\"table table-bordered table-hover\">';
        html += '<thead><tr>';

        config.itemFields.forEach(function(field) {
            html += '<th>' + escapeHtml(field.label) + '</th>';
        });

        html += '<th class=\"text-end\" style=\"width: 1px;\">";
        // line 389
        yield ($context["column_action"] ?? null);
        yield "</th>';
        html += '</tr></thead><tbody>';

        state.items.forEach(function(item, index) {
            var rowStyle = ((state.sectionType === 'homepage_slider' || state.sectionType === 'partners' || state.sectionType === 'cta') && index === 0) ? ' style=\"pointer-events: none; opacity: 0.5;\"' : '';

            html += '<tr' + rowStyle + '>';

            config.itemFields.forEach(function(field) {
                if (field.type === 'image') {
                    html += '<td>' + renderImagePicker(item[field.key], 'js-typed-item', {'data-index': index, 'data-key': field.key}, 'typed-item-' + index + '-' + field.key) + '</td>';
                } else {
                    html += '<td><input type=\"text\" class=\"form-control js-typed-item\" data-index=\"' + index + '\" data-key=\"' + escapeHtml(field.key) + '\" value=\"' + escapeHtml(item[field.key]) + '\"/></td>';
                }
            });

            html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-remove-typed-item\" data-index=\"' + index + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
            html += '</tr>';
        });

        html += '</tbody></table></div>';

        \$('#typed-items').html(html);
    }

    function renderCustomFields() {
        var html = '<div class=\"table-responsive\"><table class=\"table table-bordered table-hover\">';
        html += '<thead><tr>';
        html += '<th>";
        // line 417
        yield ($context["entry_key"] ?? null);
        yield "</th>';
        html += '<th>";
        // line 418
        yield ($context["entry_label"] ?? null);
        yield "</th>';
        html += '<th>";
        // line 419
        yield ($context["entry_type"] ?? null);
        yield "</th>';
        html += '<th>";
        // line 420
        yield ($context["entry_value"] ?? null);
        yield "</th>';
        html += '<th class=\"text-end\" style=\"width: 1px;\">";
        // line 421
        yield ($context["column_action"] ?? null);
        yield "</th>';
        html += '</tr></thead><tbody>';

        if (!state.customFields.length) {
            html += '<tr><td class=\"text-center text-muted\" colspan=\"5\">' + text.noItems + '</td></tr>';
        }

        state.customFields.forEach(function(field, index) {
            html += '<tr>';
            html += '<td><input type=\"text\" class=\"form-control js-custom-field-key\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.key) + '\"/></td>';
            html += '<td><input type=\"text\" class=\"form-control js-custom-field-label\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.label) + '\"/></td>';
            html += '<td><select class=\"form-select js-custom-field-type\" data-index=\"' + index + '\">';
            ['text', 'textarea', 'number', 'url', 'image'].forEach(function(type) {
                var selected = field.type === type ? ' selected' : '';

                html += '<option value=\"' + type + '\"' + selected + '>' + type + '</option>';
            });
            html += '</select></td>';
            if (field.type === 'image') {
                html += '<td>' + renderImagePicker(field.value, 'js-custom-field-value', {'data-index': index}, 'custom-field-' + index) + '</td>';
            } else {
                html += '<td><input type=\"text\" class=\"form-control js-custom-field-value\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.value) + '\"/></td>';
            }
            html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-remove-custom-field\" data-index=\"' + index + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
            html += '</tr>';
        });

        html += '</tbody></table></div>';

        \$('#custom-fields').html(html);
    }

    function renderCustomRepeaters() {
        var html = '';

        if (!state.customRepeaters.length) {
            html = '<p class=\"text-muted mb-2\">' + text.noItems + '</p>';
            \$('#custom-repeaters').html(html);
            return;
        }

        state.customRepeaters.forEach(function(repeater, rIndex) {
            html += '<div class=\"border rounded p-3 mb-3\">';
            html += '  <div class=\"row mb-3\">';
            html += '    <div class=\"col-md-5\"><label class=\"form-label\">";
        // line 465
        yield ($context["entry_key"] ?? null);
        yield "</label><input type=\"text\" class=\"form-control js-cr-key\" data-rindex=\"' + rIndex + '\" value=\"' + escapeHtml(repeater.key) + '\"/></div>';
            html += '    <div class=\"col-md-5\"><label class=\"form-label\">";
        // line 466
        yield ($context["entry_label"] ?? null);
        yield "</label><input type=\"text\" class=\"form-control js-cr-label\" data-rindex=\"' + rIndex + '\" value=\"' + escapeHtml(repeater.label) + '\"/></div>';
            html += '    <div class=\"col-md-2 text-end\"><label class=\"form-label d-block\">&nbsp;</label><button type=\"button\" class=\"btn btn-outline-danger js-remove-custom-repeater\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-trash\"></i></button></div>';
            html += '  </div>';

            html += '  <h6 class=\"mb-2\">' + text.fields + '</h6>';
            html += '  <div class=\"table-responsive\"><table class=\"table table-bordered table-sm mb-2\"><thead><tr><th>";
        // line 471
        yield ($context["entry_key"] ?? null);
        yield "</th><th>";
        yield ($context["entry_label"] ?? null);
        yield "</th><th>";
        yield ($context["entry_type"] ?? null);
        yield "</th><th class=\"text-end\" style=\"width:1px;\">";
        yield ($context["column_action"] ?? null);
        yield "</th></tr></thead><tbody>';

            if (!repeater.fields || !repeater.fields.length) {
                html += '<tr><td class=\"text-center text-muted\" colspan=\"4\">' + text.noFields + '</td></tr>';
            } else {
                repeater.fields.forEach(function(field, fIndex) {
                    html += '<tr>';
                    html += '<td><input type=\"text\" class=\"form-control js-cr-field-key\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\" value=\"' + escapeHtml(field.key) + '\"/></td>';
                    html += '<td><input type=\"text\" class=\"form-control js-cr-field-label\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\" value=\"' + escapeHtml(field.label) + '\"/></td>';
                    html += '<td><select class=\"form-select js-cr-field-type\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\">';
                    ['text', 'textarea', 'number', 'url', 'image'].forEach(function(type) {
                        var selected = field.type === type ? ' selected' : '';

                        html += '<option value=\"' + type + '\"' + selected + '>' + type + '</option>';
                    });
                    html += '</select></td>';
                    html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-cr-remove-field\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
                    html += '</tr>';
                });
            }

            html += '  </tbody></table></div>';
            html += '  <div class=\"text-end mb-3\"><button type=\"button\" class=\"btn btn-outline-primary btn-sm js-cr-add-field\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addField) + '</button></div>';

            html += '  <h6 class=\"mb-2\">' + text.items + '</h6>';
            html += '  <div class=\"table-responsive\"><table class=\"table table-bordered table-hover table-sm\"><thead><tr>';

            if (repeater.fields && repeater.fields.length) {
                repeater.fields.forEach(function(field) {
                    html += '<th>' + escapeHtml(field.label || field.key || '";
        // line 500
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["entry_value"] ?? null), "js");
        yield "') + '</th>';
                });
            } else {
                html += '<th>";
        // line 503
        yield ($context["entry_value"] ?? null);
        yield "</th>';
            }

            html += '<th class=\"text-end\" style=\"width:1px;\">";
        // line 506
        yield ($context["column_action"] ?? null);
        yield "</th></tr></thead><tbody>';

            if (!repeater.items || !repeater.items.length) {
                html += '<tr><td class=\"text-center text-muted\" colspan=\"' + ((repeater.fields && repeater.fields.length) ? repeater.fields.length + 1 : 2) + '\">' + text.noItems + '</td></tr>';
            } else {
                repeater.items.forEach(function(item, iIndex) {
                    html += '<tr>';

                    if (repeater.fields && repeater.fields.length) {
                        repeater.fields.forEach(function(field) {
                            var key = field.key || '';
                            var value = key ? (item[key] || '') : '';

                            if (field.type === 'image') {
                                html += '<td>' + renderImagePicker(value, 'js-cr-item-input', {'data-rindex': rIndex, 'data-iindex': iIndex, 'data-key': key}, 'cr-item-' + rIndex + '-' + iIndex + '-' + key) + '</td>';
                            } else {
                                html += '<td><input type=\"text\" class=\"form-control js-cr-item-input\" data-rindex=\"' + rIndex + '\" data-iindex=\"' + iIndex + '\" data-key=\"' + escapeHtml(key) + '\" value=\"' + escapeHtml(value) + '\"/></td>';
                            }
                        });
                    } else {
                        html += '<td><span class=\"text-muted\">";
        // line 526
        yield ($context["text_add_fields_first"] ?? null);
        yield "</span></td>';
                    }

                    html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-cr-remove-item\" data-rindex=\"' + rIndex + '\" data-iindex=\"' + iIndex + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
                    html += '</tr>';
                });
            }

            html += '  </tbody></table></div>';
            html += '  <div class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-primary btn-sm js-cr-add-item\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addItem) + '</button></div>';
            html += '</div>';
        });

        \$('#custom-repeaters').html(html);
    }

    function syncStateFromDom() {
        \$('#typed-fields .js-typed-field').each(function() {
            var key = \$(this).attr('data-key');

            if (key) {
                state.fields[key] = \$(this).val();
            }
        });

        \$('#typed-items .js-typed-item').each(function() {
            var index = parseInt(\$(this).attr('data-index'), 10);
            var key = \$(this).attr('data-key');

            if (isNaN(index) || !key) {
                return;
            }

            if (!state.items[index]) {
                state.items[index] = {};
            }

            state.items[index][key] = \$(this).val();
        });

        \$('#custom-fields .js-custom-field-value').each(function() {
            var index = parseInt(\$(this).attr('data-index'), 10);

            if (isNaN(index) || !state.customFields[index]) {
                return;
            }

            state.customFields[index].value = \$(this).val();
        });

        \$('#custom-repeaters .js-cr-item-input').each(function() {
            var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
            var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
            var key = \$(this).attr('data-key');

            if (isNaN(rIndex) || isNaN(iIndex) || !key) {
                return;
            }

            if (!state.customRepeaters[rIndex]) {
                return;
            }

            if (!Array.isArray(state.customRepeaters[rIndex].items)) {
                state.customRepeaters[rIndex].items = [];
            }

            if (!state.customRepeaters[rIndex].items[iIndex]) {
                state.customRepeaters[rIndex].items[iIndex] = {};
            }

            state.customRepeaters[rIndex].items[iIndex][key] = \$(this).val();
        });
    }

    function syncHidden() {
        syncStateFromDom();
        \$('#input-fields-json').val(JSON.stringify(state.fields || {}));
        \$('#input-items-json').val(JSON.stringify(state.items || []));
        \$('#input-custom-fields-json').val(JSON.stringify(state.customFields || []));
        \$('#input-custom-repeaters-json').val(JSON.stringify(state.customRepeaters || []));
    }

    function renderAll() {
        ensureTypeState();
        renderTypedFields();
        renderTypedItems();
        renderCustomFields();
        renderCustomRepeaters();
        syncHidden();
    }

    \$('#input-section-type').on('change', function() {
        state.sectionType = \$(this).val();
        state.fields = {};
        state.items = [];

        renderAll();
    });

    \$('#typed-fields').on('input change', '.js-typed-field', function() {
        var key = \$(this).attr('data-key');

        state.fields[key] = \$(this).val();

        syncHidden();
    });

    \$('#typed-items').on('input change', '.js-typed-item', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);
        var key = \$(this).attr('data-key');

        if (!state.items[index]) {
            state.items[index] = {};
        }

        state.items[index][key] = \$(this).val();

        syncHidden();
    });

    \$('#typed-items').on('click', '#button-add-typed-item', function() {
        var config = getTypeConfig();
        var row = {};

        config.itemFields.forEach(function(field) {
            row[field.key] = '';
        });

        state.items.push(row);

        renderAll();
    });

    \$('#typed-items').on('click', '.js-remove-typed-item', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        state.items.splice(index, 1);

        renderAll();
    });

    \$('#button-add-custom-field').on('click', function() {
        state.customFields.push({
            key: '',
            label: '',
            type: 'text',
            value: ''
        });

        renderAll();
    });

    \$('#custom-fields').on('input change', '.js-custom-field-key, .js-custom-field-label, .js-custom-field-type, .js-custom-field-value', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        if (!state.customFields[index]) {
            return;
        }

        if (\$(this).hasClass('js-custom-field-key')) {
            state.customFields[index].key = normalizeKey(\$(this).val());
            \$(this).val(state.customFields[index].key);
        }

        if (\$(this).hasClass('js-custom-field-label')) {
            state.customFields[index].label = \$(this).val();
        }

        if (\$(this).hasClass('js-custom-field-type')) {
            state.customFields[index].type = \$(this).val();
        }

        if (\$(this).hasClass('js-custom-field-value')) {
            state.customFields[index].value = \$(this).val();
        }

        syncHidden();
    });

    \$('#custom-fields').on('click', '.js-remove-custom-field', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        state.customFields.splice(index, 1);

        renderAll();
    });

    \$('#button-add-custom-repeater').on('click', function() {
        state.customRepeaters.push({
            key: '',
            label: '',
            fields: [],
            items: []
        });

        renderAll();
    });

    \$('#custom-repeaters').on('input', '.js-cr-key', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        state.customRepeaters[rIndex].key = normalizeKey(\$(this).val());
        \$(this).val(state.customRepeaters[rIndex].key);

        syncHidden();
    });

    \$('#custom-repeaters').on('input', '.js-cr-label', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        state.customRepeaters[rIndex].label = \$(this).val();

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-remove-custom-repeater', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        state.customRepeaters.splice(rIndex, 1);

        renderAll();
    });

    \$('#custom-repeaters').on('click', '.js-cr-add-field', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        if (!Array.isArray(state.customRepeaters[rIndex].fields)) {
            state.customRepeaters[rIndex].fields = [];
        }

        state.customRepeaters[rIndex].fields.push({
            key: '',
            label: '',
            type: 'text'
        });

        renderAll();
    });

    \$('#custom-repeaters').on('input change', '.js-cr-field-key, .js-cr-field-label, .js-cr-field-type', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var fIndex = parseInt(\$(this).attr('data-findex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.fields || !repeater.fields[fIndex]) {
            return;
        }

        if (\$(this).hasClass('js-cr-field-key')) {
            var oldKey = repeater.fields[fIndex].key || '';
            var newKey = normalizeKey(\$(this).val());

            repeater.fields[fIndex].key = newKey;
            \$(this).val(newKey);

            if (oldKey !== newKey && newKey) {
                (repeater.items || []).forEach(function(item) {
                    item[newKey] = item[oldKey] || '';

                    if (oldKey) {
                        delete item[oldKey];
                    }
                });
            }
        }

        if (\$(this).hasClass('js-cr-field-label')) {
            repeater.fields[fIndex].label = \$(this).val();
        }

        if (\$(this).hasClass('js-cr-field-type')) {
            repeater.fields[fIndex].type = \$(this).val();
        }

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-cr-remove-field', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var fIndex = parseInt(\$(this).attr('data-findex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.fields || !repeater.fields[fIndex]) {
            return;
        }

        var oldKey = repeater.fields[fIndex].key || '';

        repeater.fields.splice(fIndex, 1);

        if (oldKey) {
            (repeater.items || []).forEach(function(item) {
                delete item[oldKey];
            });
        }

        renderAll();
    });

    \$('#custom-repeaters').on('click', '.js-cr-add-item', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater) {
            return;
        }

        if (!Array.isArray(repeater.items)) {
            repeater.items = [];
        }

        var item = {};

        (repeater.fields || []).forEach(function(field) {
            if (field.key) {
                item[field.key] = '';
            }
        });

        repeater.items.push(item);

        renderAll();
    });

    \$('#custom-repeaters').on('input change', '.js-cr-item-input', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
        var key = \$(this).attr('data-key');
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.items || !repeater.items[iIndex] || !key) {
            return;
        }

        repeater.items[iIndex][key] = \$(this).val();

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-cr-remove-item', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.items) {
            return;
        }

        repeater.items.splice(iIndex, 1);

        renderAll();
    });

    \$('#input-template-slug').on('input', function() {
        var value = \$(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '_').replace(/^_+|_+\$/g, '');

        \$(this).val(value);
    });

    \$('#form-module').on('submit', function() {
        syncHidden();
    });

    renderAll();
})(jQuery);
//--></script>
";
        // line 905
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
        return "extension/opencart/admin/view/template/module/section.twig";
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
        return array (  1251 => 905,  869 => 526,  846 => 506,  840 => 503,  834 => 500,  796 => 471,  788 => 466,  784 => 465,  737 => 421,  733 => 420,  729 => 419,  725 => 418,  721 => 417,  690 => 389,  631 => 333,  617 => 322,  551 => 259,  529 => 240,  498 => 212,  494 => 211,  486 => 206,  482 => 205,  477 => 203,  472 => 201,  462 => 194,  458 => 193,  454 => 192,  450 => 191,  440 => 184,  436 => 183,  432 => 182,  424 => 177,  420 => 176,  416 => 175,  411 => 173,  406 => 171,  402 => 170,  392 => 163,  388 => 162,  384 => 161,  380 => 160,  372 => 155,  368 => 154,  364 => 153,  359 => 151,  354 => 149,  346 => 144,  342 => 143,  338 => 142,  334 => 141,  329 => 139,  324 => 137,  314 => 130,  310 => 129,  306 => 128,  302 => 127,  298 => 126,  294 => 125,  290 => 124,  283 => 120,  279 => 119,  275 => 118,  271 => 117,  264 => 113,  260 => 112,  247 => 102,  233 => 93,  226 => 89,  217 => 83,  210 => 79,  201 => 73,  194 => 69,  182 => 60,  174 => 55,  168 => 52,  159 => 46,  153 => 45,  148 => 43,  140 => 37,  125 => 35,  121 => 34,  115 => 31,  104 => 25,  99 => 23,  94 => 21,  89 => 19,  82 => 14,  71 => 12,  67 => 11,  62 => 9,  55 => 7,  51 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{{ header }}{{ column_left }}
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"float-end\">
        <button type=\"submit\" form=\"form-module\" data-bs-toggle=\"tooltip\" title=\"{{ button_save }}\" class=\"btn btn-primary\"><i class=\"fa-solid fa-save\"></i></button>
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
        <form id=\"form-module\" action=\"{{ save }}\" method=\"post\" data-oc-toggle=\"ajax\">
          <div class=\"row mb-3 required\">
            <label for=\"input-name\" class=\"col-sm-2 col-form-label\">{{ entry_name }}</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"name\" value=\"{{ name }}\" placeholder=\"{{ entry_name }}\" id=\"input-name\" class=\"form-control\"/>
              <div id=\"error-name\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3 required\">
            <label for=\"input-section-type\" class=\"col-sm-2 col-form-label\">{{ entry_section_type }}</label>
            <div class=\"col-sm-10\">
              <select name=\"section_type\" id=\"input-section-type\" class=\"form-select\">
                {% for type in section_types %}
                  <option value=\"{{ type.value }}\"{% if type.value == section_type %} selected{% endif %}>{{ type.text }}</option>
                {% endfor %}
              </select>
              <div id=\"error-section_type\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3 required\">
            <label for=\"input-template-slug\" class=\"col-sm-2 col-form-label\">{{ entry_template_slug }}</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"template_slug\" value=\"{{ template_slug }}\" placeholder=\"{{ entry_template_slug }}\" id=\"input-template-slug\" class=\"form-control\"/>
              <div class=\"form-text\">{{ help_template_slug }}</div>
              <div id=\"error-template_slug\" class=\"invalid-feedback\"></div>
            </div>
          </div>

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_home_only }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-control bg-light\">common/home</div>
              <div class=\"form-text\">{{ help_home_only }}</div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-sliders\"></i> {{ text_type_configuration }}</div>
            <div class=\"card-body\">
              <div id=\"typed-fields\"></div>
              <hr/>
              <div id=\"typed-items\"></div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-list-check\"></i> {{ entry_custom_fields }}</div>
            <div class=\"card-body\">
              <div id=\"custom-fields\"></div>
              <div class=\"text-end\">
                <button type=\"button\" id=\"button-add-custom-field\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-plus\"></i> {{ button_add_custom_field }}</button>
              </div>
            </div>
          </div>

          <div class=\"card mb-3\">
            <div class=\"card-header\"><i class=\"fa-solid fa-layer-group\"></i> {{ entry_custom_repeaters }}</div>
            <div class=\"card-body\">
              <div id=\"custom-repeaters\"></div>
              <div class=\"text-end\">
                <button type=\"button\" id=\"button-add-custom-repeater\" class=\"btn btn-outline-primary\"><i class=\"fa-solid fa-plus\"></i> {{ button_add_custom_repeater }}</button>
              </div>
            </div>
          </div>

          <div class=\"row mb-3\">
            <label class=\"col-sm-2 col-form-label\">{{ entry_status }}</label>
            <div class=\"col-sm-10\">
              <div class=\"form-check form-switch form-switch-lg\">
                <input type=\"hidden\" name=\"status\" value=\"0\"/>
                <input type=\"checkbox\" name=\"status\" value=\"1\" id=\"input-status\" class=\"form-check-input\"{% if status %} checked{% endif %}/>
              </div>
            </div>
          </div>

          <input type=\"hidden\" name=\"fields_json\" value=\"\" id=\"input-fields-json\"/>
          <input type=\"hidden\" name=\"items_json\" value=\"\" id=\"input-items-json\"/>
          <input type=\"hidden\" name=\"custom_fields_json\" value=\"\" id=\"input-custom-fields-json\"/>
          <input type=\"hidden\" name=\"custom_repeaters_json\" value=\"\" id=\"input-custom-repeaters-json\"/>
          <input type=\"hidden\" name=\"module_id\" value=\"{{ module_id }}\" id=\"input-module-id\"/>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
(function(\$) {
    'use strict';

    var categories = {{ categories|json_encode|raw }};
    var topics = {{ topics|json_encode|raw }};

    var state = {
        sectionType: \$('#input-section-type').val(),
        fields: {{ fields_json|raw }},
        items: {{ items_json|raw }},
        customFields: {{ custom_fields_json|raw }},
        customRepeaters: {{ custom_repeaters_json|raw }}
    };

    var text = {
        noItems: '{{ text_no_items|escape('js') }}',
        noFields: '{{ text_no_fields|escape('js') }}',
        items: '{{ text_items|escape('js') }}',
        fields: '{{ text_fields|escape('js') }}',
        addItem: '{{ button_add_item|escape('js') }}',
        addField: '{{ button_add_field|escape('js') }}',
        remove: '{{ button_remove|escape('js') }}'
    };

    function typeConfigs() {
        return {
            homepage_slider: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'}
                ],
                itemLabel: '{{ text_slides|escape('js') }}',
                itemFields: [
                    {key: 'image', label: '{{ entry_image|escape('js') }}', type: 'image'},
                    {key: 'text', label: '{{ entry_slider_text|escape('js') }}', type: 'text'},
                    {key: 'subtext', label: '{{ entry_slider_subtext|escape('js') }}', type: 'text'},
                    {key: 'link', label: '{{ entry_link|escape('js') }}', type: 'url'}
                ]
            },
            advantages: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'}
                ],
                itemLabel: '{{ text_advantages|escape('js') }}',
                itemFields: [
                    {key: 'image', label: '{{ entry_image|escape('js') }}', type: 'image'},
                    {key: 'text', label: '{{ entry_text|escape('js') }}', type: 'text'},
                    {key: 'subtext', label: '{{ entry_slider_subtext|escape('js') }}', type: 'text'}
                ]
            },
            products: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'},
                    {key: 'category_id', label: '{{ entry_category|escape('js') }}', type: 'category'},
                    {key: 'limit', label: '{{ entry_limit|escape('js') }}', type: 'number', min: 1, max: 100},
                    {key: 'view_all_text', label: '{{ entry_view_all_text|escape('js') }}', type: 'text'}
                ],
                itemLabel: '',
                itemFields: []
            },
            cta: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'},
                    {key: 'description', label: '{{ entry_description|escape('js') }}', type: 'textarea'}
                ],
                itemLabel: '{{ text_social_links|escape('js') }}',
                itemFields: [
                    {key: 'icon', label: '{{ entry_image|escape('js') }}', type: 'image'},
                    {key: 'label', label: '{{ entry_label|escape('js') }}', type: 'text'},
                    {key: 'href', label: '{{ entry_link|escape('js') }}', type: 'url'}
                ]
            },
            about: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'},
                    {key: 'description', label: '{{ entry_description|escape('js') }}', type: 'textarea'},
                    {key: 'image', label: '{{ entry_image|escape('js') }}', type: 'image'}
                ],
                itemLabel: '',
                itemFields: []
            },
            blog: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'},
                    {key: 'topic_id', label: '{{ entry_topic|escape('js') }}', type: 'topic'},
                    {key: 'limit', label: '{{ entry_limit|escape('js') }}', type: 'number', min: 1, max: 100},
                    {key: 'view_all_text', label: '{{ entry_view_all_text|escape('js') }}', type: 'text'}
                ],
                itemLabel: '',
                itemFields: []
            },
            partners: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'}
                ],
                itemLabel: '{{ text_partners|escape('js') }}',
                itemFields: [
                    {key: 'image', label: '{{ entry_image|escape('js') }}', type: 'image'},
                    {key: 'href', label: '{{ entry_link|escape('js') }}', type: 'url'}
                ]
            },
            legacy_html: {
                fields: [
                    {key: 'headline', label: '{{ entry_headline|escape('js') }}', type: 'text'},
                    {key: 'html', label: '{{ entry_html|escape('js') }}', type: 'textarea'}
                ],
                itemLabel: '',
                itemFields: []
            }
        };
    }

    function normalizeKey(value) {
        return String(value || '')
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+\$/g, '');
    }

    function escapeHtml(value) {
        return String(value || '')
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/\"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    function imageSrc(value) {
        var file = String(value || '').trim();

        if (!file) {
            return '{{ placeholder|escape('js') }}';
        }

        return '../image/' + file.replace(/ /g, '%20');
    }

    function renderImagePicker(value, inputClass, attrs, uid) {
        var html = '';
        var attrText = '';
        var key;

        for (key in attrs) {
            if (Object.prototype.hasOwnProperty.call(attrs, key)) {
                attrText += ' ' + key + '=\"' + escapeHtml(attrs[key]) + '\"';
            }
        }

        html += '<div class=\"input-group\">';
        html += '  <div class=\"border rounded p-1 bg-light me-2\">';
        html += '    <img src=\"' + imageSrc(value) + '\" data-oc-placeholder=\"{{ placeholder|escape('js') }}\" id=\"thumb-' + uid + '\" alt=\"\" style=\"width: 70px; height: 70px; object-fit: cover;\"/>';
        html += '  </div>';
        html += '  <div class=\"w-100\">';
        html += '    <input type=\"hidden\" class=\"' + inputClass + '\"' + attrText + ' id=\"input-' + uid + '\" value=\"' + escapeHtml(value) + '\"/>';
        html += '    <div class=\"btn-group mt-2\">';
        html += '      <button type=\"button\" class=\"btn btn-primary btn-sm\" data-oc-toggle=\"image\" data-oc-target=\"#input-' + uid + '\" data-oc-thumb=\"#thumb-' + uid + '\"><i class=\"fa-solid fa-pencil\"></i></button>';
        html += '      <button type=\"button\" class=\"btn btn-warning btn-sm\" data-oc-toggle=\"clear\" data-oc-target=\"#input-' + uid + '\" data-oc-thumb=\"#thumb-' + uid + '\"><i class=\"fa-regular fa-trash-can\"></i></button>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        return html;
    }

    function getTypeConfig() {
        var configs = typeConfigs();

        if (!configs[state.sectionType]) {
            state.sectionType = 'homepage_slider';
        }

        return configs[state.sectionType];
    }

    function ensureTypeState() {
        var config = getTypeConfig();

        if (typeof state.fields !== 'object' || Array.isArray(state.fields) || state.fields === null) {
            state.fields = {};
        }

        config.fields.forEach(function(field) {
            if (typeof state.fields[field.key] === 'undefined') {
                state.fields[field.key] = (field.type === 'number') ? (field.min || 1) : '';
            }
        });

        if (!Array.isArray(state.items)) {
            state.items = [];
        }

        if (!config.itemFields.length) {
            state.items = [];
        }

        if (!Array.isArray(state.customFields)) {
            state.customFields = [];
        }

        if (!Array.isArray(state.customRepeaters)) {
            state.customRepeaters = [];
        }
    }

    function renderFieldControl(field, value) {
        var html = '';

        if (field.type === 'textarea') {
            html += '<textarea class=\"form-control js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">' + escapeHtml(value) + '</textarea>';
        } else if (field.type === 'image') {
            html += renderImagePicker(value, 'js-typed-field', {'data-key': field.key}, 'typed-field-' + field.key);
        } else if (field.type === 'category') {
            html += '<select class=\"form-select js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">';
            html += '<option value=\"0\">{{ text_all }}</option>';

            categories.forEach(function(category) {
                var selected = parseInt(value, 10) === parseInt(category.category_id, 10) ? ' selected' : '';

                html += '<option value=\"' + category.category_id + '\"' + selected + '>' + escapeHtml(category.name) + '</option>';
            });

            html += '</select>';
        } else if (field.type === 'topic') {
            html += '<select class=\"form-select js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\">';
            html += '<option value=\"0\">{{ text_all }}</option>';

            topics.forEach(function(topic) {
                var selected = parseInt(value, 10) === parseInt(topic.topic_id, 10) ? ' selected' : '';

                html += '<option value=\"' + topic.topic_id + '\"' + selected + '>' + escapeHtml(topic.name) + '</option>';
            });

            html += '</select>';
        } else {
            var type = field.type === 'number' ? 'number' : 'text';
            var min = field.type === 'number' && typeof field.min !== 'undefined' ? ' min=\"' + field.min + '\"' : '';
            var max = field.type === 'number' && typeof field.max !== 'undefined' ? ' max=\"' + field.max + '\"' : '';

            html += '<input type=\"' + type + '\" class=\"form-control js-typed-field\" data-key=\"' + escapeHtml(field.key) + '\" value=\"' + escapeHtml(value) + '\"' + min + max + '/>';
        }

        return html;
    }

    function renderTypedFields() {
        var config = getTypeConfig();
        var html = '';

        config.fields.forEach(function(field) {
            var value = state.fields[field.key];

            html += '<div class=\"row mb-3\">';
            html += '  <label class=\"col-sm-2 col-form-label\">' + escapeHtml(field.label) + '</label>';
            html += '  <div class=\"col-sm-10\">' + renderFieldControl(field, value) + '</div>';
            html += '</div>';
        });

        \$('#typed-fields').html(html || '<p class=\"text-muted mb-0\">' + text.noFields + '</p>');
    }

    function renderTypedItems() {
        var config = getTypeConfig();

        if (!config.itemFields.length) {
            \$('#typed-items').html('<p class=\"text-muted mb-0\">' + text.noItems + '</p>');
            return;
        }

        var html = '<div class=\"d-flex justify-content-between align-items-center mb-2\">';
        html += '<h5 class=\"mb-0\">' + escapeHtml(config.itemLabel || text.items) + '</h5>';
        html += '<button type=\"button\" class=\"btn btn-outline-primary btn-sm\" id=\"button-add-typed-item\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addItem) + '</button>';
        html += '</div>';

        html += '<div class=\"table-responsive\"><table class=\"table table-bordered table-hover\">';
        html += '<thead><tr>';

        config.itemFields.forEach(function(field) {
            html += '<th>' + escapeHtml(field.label) + '</th>';
        });

        html += '<th class=\"text-end\" style=\"width: 1px;\">{{ column_action }}</th>';
        html += '</tr></thead><tbody>';

        state.items.forEach(function(item, index) {
            var rowStyle = ((state.sectionType === 'homepage_slider' || state.sectionType === 'partners' || state.sectionType === 'cta') && index === 0) ? ' style=\"pointer-events: none; opacity: 0.5;\"' : '';

            html += '<tr' + rowStyle + '>';

            config.itemFields.forEach(function(field) {
                if (field.type === 'image') {
                    html += '<td>' + renderImagePicker(item[field.key], 'js-typed-item', {'data-index': index, 'data-key': field.key}, 'typed-item-' + index + '-' + field.key) + '</td>';
                } else {
                    html += '<td><input type=\"text\" class=\"form-control js-typed-item\" data-index=\"' + index + '\" data-key=\"' + escapeHtml(field.key) + '\" value=\"' + escapeHtml(item[field.key]) + '\"/></td>';
                }
            });

            html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-remove-typed-item\" data-index=\"' + index + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
            html += '</tr>';
        });

        html += '</tbody></table></div>';

        \$('#typed-items').html(html);
    }

    function renderCustomFields() {
        var html = '<div class=\"table-responsive\"><table class=\"table table-bordered table-hover\">';
        html += '<thead><tr>';
        html += '<th>{{ entry_key }}</th>';
        html += '<th>{{ entry_label }}</th>';
        html += '<th>{{ entry_type }}</th>';
        html += '<th>{{ entry_value }}</th>';
        html += '<th class=\"text-end\" style=\"width: 1px;\">{{ column_action }}</th>';
        html += '</tr></thead><tbody>';

        if (!state.customFields.length) {
            html += '<tr><td class=\"text-center text-muted\" colspan=\"5\">' + text.noItems + '</td></tr>';
        }

        state.customFields.forEach(function(field, index) {
            html += '<tr>';
            html += '<td><input type=\"text\" class=\"form-control js-custom-field-key\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.key) + '\"/></td>';
            html += '<td><input type=\"text\" class=\"form-control js-custom-field-label\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.label) + '\"/></td>';
            html += '<td><select class=\"form-select js-custom-field-type\" data-index=\"' + index + '\">';
            ['text', 'textarea', 'number', 'url', 'image'].forEach(function(type) {
                var selected = field.type === type ? ' selected' : '';

                html += '<option value=\"' + type + '\"' + selected + '>' + type + '</option>';
            });
            html += '</select></td>';
            if (field.type === 'image') {
                html += '<td>' + renderImagePicker(field.value, 'js-custom-field-value', {'data-index': index}, 'custom-field-' + index) + '</td>';
            } else {
                html += '<td><input type=\"text\" class=\"form-control js-custom-field-value\" data-index=\"' + index + '\" value=\"' + escapeHtml(field.value) + '\"/></td>';
            }
            html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-remove-custom-field\" data-index=\"' + index + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
            html += '</tr>';
        });

        html += '</tbody></table></div>';

        \$('#custom-fields').html(html);
    }

    function renderCustomRepeaters() {
        var html = '';

        if (!state.customRepeaters.length) {
            html = '<p class=\"text-muted mb-2\">' + text.noItems + '</p>';
            \$('#custom-repeaters').html(html);
            return;
        }

        state.customRepeaters.forEach(function(repeater, rIndex) {
            html += '<div class=\"border rounded p-3 mb-3\">';
            html += '  <div class=\"row mb-3\">';
            html += '    <div class=\"col-md-5\"><label class=\"form-label\">{{ entry_key }}</label><input type=\"text\" class=\"form-control js-cr-key\" data-rindex=\"' + rIndex + '\" value=\"' + escapeHtml(repeater.key) + '\"/></div>';
            html += '    <div class=\"col-md-5\"><label class=\"form-label\">{{ entry_label }}</label><input type=\"text\" class=\"form-control js-cr-label\" data-rindex=\"' + rIndex + '\" value=\"' + escapeHtml(repeater.label) + '\"/></div>';
            html += '    <div class=\"col-md-2 text-end\"><label class=\"form-label d-block\">&nbsp;</label><button type=\"button\" class=\"btn btn-outline-danger js-remove-custom-repeater\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-trash\"></i></button></div>';
            html += '  </div>';

            html += '  <h6 class=\"mb-2\">' + text.fields + '</h6>';
            html += '  <div class=\"table-responsive\"><table class=\"table table-bordered table-sm mb-2\"><thead><tr><th>{{ entry_key }}</th><th>{{ entry_label }}</th><th>{{ entry_type }}</th><th class=\"text-end\" style=\"width:1px;\">{{ column_action }}</th></tr></thead><tbody>';

            if (!repeater.fields || !repeater.fields.length) {
                html += '<tr><td class=\"text-center text-muted\" colspan=\"4\">' + text.noFields + '</td></tr>';
            } else {
                repeater.fields.forEach(function(field, fIndex) {
                    html += '<tr>';
                    html += '<td><input type=\"text\" class=\"form-control js-cr-field-key\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\" value=\"' + escapeHtml(field.key) + '\"/></td>';
                    html += '<td><input type=\"text\" class=\"form-control js-cr-field-label\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\" value=\"' + escapeHtml(field.label) + '\"/></td>';
                    html += '<td><select class=\"form-select js-cr-field-type\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\">';
                    ['text', 'textarea', 'number', 'url', 'image'].forEach(function(type) {
                        var selected = field.type === type ? ' selected' : '';

                        html += '<option value=\"' + type + '\"' + selected + '>' + type + '</option>';
                    });
                    html += '</select></td>';
                    html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-cr-remove-field\" data-rindex=\"' + rIndex + '\" data-findex=\"' + fIndex + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
                    html += '</tr>';
                });
            }

            html += '  </tbody></table></div>';
            html += '  <div class=\"text-end mb-3\"><button type=\"button\" class=\"btn btn-outline-primary btn-sm js-cr-add-field\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addField) + '</button></div>';

            html += '  <h6 class=\"mb-2\">' + text.items + '</h6>';
            html += '  <div class=\"table-responsive\"><table class=\"table table-bordered table-hover table-sm\"><thead><tr>';

            if (repeater.fields && repeater.fields.length) {
                repeater.fields.forEach(function(field) {
                    html += '<th>' + escapeHtml(field.label || field.key || '{{ entry_value|escape('js') }}') + '</th>';
                });
            } else {
                html += '<th>{{ entry_value }}</th>';
            }

            html += '<th class=\"text-end\" style=\"width:1px;\">{{ column_action }}</th></tr></thead><tbody>';

            if (!repeater.items || !repeater.items.length) {
                html += '<tr><td class=\"text-center text-muted\" colspan=\"' + ((repeater.fields && repeater.fields.length) ? repeater.fields.length + 1 : 2) + '\">' + text.noItems + '</td></tr>';
            } else {
                repeater.items.forEach(function(item, iIndex) {
                    html += '<tr>';

                    if (repeater.fields && repeater.fields.length) {
                        repeater.fields.forEach(function(field) {
                            var key = field.key || '';
                            var value = key ? (item[key] || '') : '';

                            if (field.type === 'image') {
                                html += '<td>' + renderImagePicker(value, 'js-cr-item-input', {'data-rindex': rIndex, 'data-iindex': iIndex, 'data-key': key}, 'cr-item-' + rIndex + '-' + iIndex + '-' + key) + '</td>';
                            } else {
                                html += '<td><input type=\"text\" class=\"form-control js-cr-item-input\" data-rindex=\"' + rIndex + '\" data-iindex=\"' + iIndex + '\" data-key=\"' + escapeHtml(key) + '\" value=\"' + escapeHtml(value) + '\"/></td>';
                            }
                        });
                    } else {
                        html += '<td><span class=\"text-muted\">{{ text_add_fields_first }}</span></td>';
                    }

                    html += '<td class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-danger btn-sm js-cr-remove-item\" data-rindex=\"' + rIndex + '\" data-iindex=\"' + iIndex + '\"><i class=\"fa-solid fa-minus-circle\"></i></button></td>';
                    html += '</tr>';
                });
            }

            html += '  </tbody></table></div>';
            html += '  <div class=\"text-end\"><button type=\"button\" class=\"btn btn-outline-primary btn-sm js-cr-add-item\" data-rindex=\"' + rIndex + '\"><i class=\"fa-solid fa-plus\"></i> ' + escapeHtml(text.addItem) + '</button></div>';
            html += '</div>';
        });

        \$('#custom-repeaters').html(html);
    }

    function syncStateFromDom() {
        \$('#typed-fields .js-typed-field').each(function() {
            var key = \$(this).attr('data-key');

            if (key) {
                state.fields[key] = \$(this).val();
            }
        });

        \$('#typed-items .js-typed-item').each(function() {
            var index = parseInt(\$(this).attr('data-index'), 10);
            var key = \$(this).attr('data-key');

            if (isNaN(index) || !key) {
                return;
            }

            if (!state.items[index]) {
                state.items[index] = {};
            }

            state.items[index][key] = \$(this).val();
        });

        \$('#custom-fields .js-custom-field-value').each(function() {
            var index = parseInt(\$(this).attr('data-index'), 10);

            if (isNaN(index) || !state.customFields[index]) {
                return;
            }

            state.customFields[index].value = \$(this).val();
        });

        \$('#custom-repeaters .js-cr-item-input').each(function() {
            var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
            var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
            var key = \$(this).attr('data-key');

            if (isNaN(rIndex) || isNaN(iIndex) || !key) {
                return;
            }

            if (!state.customRepeaters[rIndex]) {
                return;
            }

            if (!Array.isArray(state.customRepeaters[rIndex].items)) {
                state.customRepeaters[rIndex].items = [];
            }

            if (!state.customRepeaters[rIndex].items[iIndex]) {
                state.customRepeaters[rIndex].items[iIndex] = {};
            }

            state.customRepeaters[rIndex].items[iIndex][key] = \$(this).val();
        });
    }

    function syncHidden() {
        syncStateFromDom();
        \$('#input-fields-json').val(JSON.stringify(state.fields || {}));
        \$('#input-items-json').val(JSON.stringify(state.items || []));
        \$('#input-custom-fields-json').val(JSON.stringify(state.customFields || []));
        \$('#input-custom-repeaters-json').val(JSON.stringify(state.customRepeaters || []));
    }

    function renderAll() {
        ensureTypeState();
        renderTypedFields();
        renderTypedItems();
        renderCustomFields();
        renderCustomRepeaters();
        syncHidden();
    }

    \$('#input-section-type').on('change', function() {
        state.sectionType = \$(this).val();
        state.fields = {};
        state.items = [];

        renderAll();
    });

    \$('#typed-fields').on('input change', '.js-typed-field', function() {
        var key = \$(this).attr('data-key');

        state.fields[key] = \$(this).val();

        syncHidden();
    });

    \$('#typed-items').on('input change', '.js-typed-item', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);
        var key = \$(this).attr('data-key');

        if (!state.items[index]) {
            state.items[index] = {};
        }

        state.items[index][key] = \$(this).val();

        syncHidden();
    });

    \$('#typed-items').on('click', '#button-add-typed-item', function() {
        var config = getTypeConfig();
        var row = {};

        config.itemFields.forEach(function(field) {
            row[field.key] = '';
        });

        state.items.push(row);

        renderAll();
    });

    \$('#typed-items').on('click', '.js-remove-typed-item', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        state.items.splice(index, 1);

        renderAll();
    });

    \$('#button-add-custom-field').on('click', function() {
        state.customFields.push({
            key: '',
            label: '',
            type: 'text',
            value: ''
        });

        renderAll();
    });

    \$('#custom-fields').on('input change', '.js-custom-field-key, .js-custom-field-label, .js-custom-field-type, .js-custom-field-value', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        if (!state.customFields[index]) {
            return;
        }

        if (\$(this).hasClass('js-custom-field-key')) {
            state.customFields[index].key = normalizeKey(\$(this).val());
            \$(this).val(state.customFields[index].key);
        }

        if (\$(this).hasClass('js-custom-field-label')) {
            state.customFields[index].label = \$(this).val();
        }

        if (\$(this).hasClass('js-custom-field-type')) {
            state.customFields[index].type = \$(this).val();
        }

        if (\$(this).hasClass('js-custom-field-value')) {
            state.customFields[index].value = \$(this).val();
        }

        syncHidden();
    });

    \$('#custom-fields').on('click', '.js-remove-custom-field', function() {
        var index = parseInt(\$(this).attr('data-index'), 10);

        state.customFields.splice(index, 1);

        renderAll();
    });

    \$('#button-add-custom-repeater').on('click', function() {
        state.customRepeaters.push({
            key: '',
            label: '',
            fields: [],
            items: []
        });

        renderAll();
    });

    \$('#custom-repeaters').on('input', '.js-cr-key', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        state.customRepeaters[rIndex].key = normalizeKey(\$(this).val());
        \$(this).val(state.customRepeaters[rIndex].key);

        syncHidden();
    });

    \$('#custom-repeaters').on('input', '.js-cr-label', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        state.customRepeaters[rIndex].label = \$(this).val();

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-remove-custom-repeater', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        state.customRepeaters.splice(rIndex, 1);

        renderAll();
    });

    \$('#custom-repeaters').on('click', '.js-cr-add-field', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);

        if (!state.customRepeaters[rIndex]) {
            return;
        }

        if (!Array.isArray(state.customRepeaters[rIndex].fields)) {
            state.customRepeaters[rIndex].fields = [];
        }

        state.customRepeaters[rIndex].fields.push({
            key: '',
            label: '',
            type: 'text'
        });

        renderAll();
    });

    \$('#custom-repeaters').on('input change', '.js-cr-field-key, .js-cr-field-label, .js-cr-field-type', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var fIndex = parseInt(\$(this).attr('data-findex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.fields || !repeater.fields[fIndex]) {
            return;
        }

        if (\$(this).hasClass('js-cr-field-key')) {
            var oldKey = repeater.fields[fIndex].key || '';
            var newKey = normalizeKey(\$(this).val());

            repeater.fields[fIndex].key = newKey;
            \$(this).val(newKey);

            if (oldKey !== newKey && newKey) {
                (repeater.items || []).forEach(function(item) {
                    item[newKey] = item[oldKey] || '';

                    if (oldKey) {
                        delete item[oldKey];
                    }
                });
            }
        }

        if (\$(this).hasClass('js-cr-field-label')) {
            repeater.fields[fIndex].label = \$(this).val();
        }

        if (\$(this).hasClass('js-cr-field-type')) {
            repeater.fields[fIndex].type = \$(this).val();
        }

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-cr-remove-field', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var fIndex = parseInt(\$(this).attr('data-findex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.fields || !repeater.fields[fIndex]) {
            return;
        }

        var oldKey = repeater.fields[fIndex].key || '';

        repeater.fields.splice(fIndex, 1);

        if (oldKey) {
            (repeater.items || []).forEach(function(item) {
                delete item[oldKey];
            });
        }

        renderAll();
    });

    \$('#custom-repeaters').on('click', '.js-cr-add-item', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater) {
            return;
        }

        if (!Array.isArray(repeater.items)) {
            repeater.items = [];
        }

        var item = {};

        (repeater.fields || []).forEach(function(field) {
            if (field.key) {
                item[field.key] = '';
            }
        });

        repeater.items.push(item);

        renderAll();
    });

    \$('#custom-repeaters').on('input change', '.js-cr-item-input', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
        var key = \$(this).attr('data-key');
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.items || !repeater.items[iIndex] || !key) {
            return;
        }

        repeater.items[iIndex][key] = \$(this).val();

        syncHidden();
    });

    \$('#custom-repeaters').on('click', '.js-cr-remove-item', function() {
        var rIndex = parseInt(\$(this).attr('data-rindex'), 10);
        var iIndex = parseInt(\$(this).attr('data-iindex'), 10);
        var repeater = state.customRepeaters[rIndex];

        if (!repeater || !repeater.items) {
            return;
        }

        repeater.items.splice(iIndex, 1);

        renderAll();
    });

    \$('#input-template-slug').on('input', function() {
        var value = \$(this).val().toLowerCase().replace(/[^a-z0-9]+/g, '_').replace(/^_+|_+\$/g, '');

        \$(this).val(value);
    });

    \$('#form-module').on('submit', function() {
        syncHidden();
    });

    renderAll();
})(jQuery);
//--></script>
{{ footer }}
", "extension/opencart/admin/view/template/module/section.twig", "/Applications/MAMP/htdocs/extension/opencart/admin/view/template/module/section.twig");
    }
}
