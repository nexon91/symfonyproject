<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* building/add.html.twig */
class __TwigTemplate_5db75c0867063a5bca3076772972f7798fa1f7b7a1a78d5ba522037327e32772 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "building/add.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "building/add.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "    <div class=\"container\">
    <h1>Hello</h1>
    ";
        // line 7
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["buildingForm"]) || array_key_exists("buildingForm", $context) ? $context["buildingForm"] : (function () { throw new RuntimeError('Variable "buildingForm" does not exist.', 7, $this->source); })()), 'form_start');
        echo "

        ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["buildingForm"]) || array_key_exists("buildingForm", $context) ? $context["buildingForm"] : (function () { throw new RuntimeError('Variable "buildingForm" does not exist.', 9, $this->source); })()), 'widget');
        echo "

    <button type=\"submit\" class=\"btn btn-primary\">Add</button>
    ";
        // line 12
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["buildingForm"]) || array_key_exists("buildingForm", $context) ? $context["buildingForm"] : (function () { throw new RuntimeError('Variable "buildingForm" does not exist.', 12, $this->source); })()), 'form_end');
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "building/add.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 12,  68 => 9,  63 => 7,  59 => 5,  52 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends('base.html.twig') %}


{% block body %}
    <div class=\"container\">
    <h1>Hello</h1>
    {{ form_start(buildingForm) }}

        {{ form_widget(buildingForm) }}

    <button type=\"submit\" class=\"btn btn-primary\">Add</button>
    {{ form_end(buildingForm) }}
    </div>
{% endblock %}", "building/add.html.twig", "C:\\xampp\\htdocs\\sendmail\\templates\\building\\add.html.twig");
    }
}
