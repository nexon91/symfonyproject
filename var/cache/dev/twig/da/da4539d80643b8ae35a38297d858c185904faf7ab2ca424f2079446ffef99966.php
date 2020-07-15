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

/* building/home.html.twig */
class __TwigTemplate_8ada9025679c87ee71fbe90a250b890d350b6f739e9be6df1abbbeaec07b0b04 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "building/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "building/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <div class=\"container\">
        <h2 class=\"m-2\">Building info
            <span class=\"ml-5\">
                <a href=\"";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add");
        echo "\"><button type=\"button\" class=\"btn btn-primary\" >Add</button></a>
            </span>
            <span class=\"ml-1\">
                <a href=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add");
        echo "\"><button type=\"button\" class=\"btn btn-warning\" >Edit</button></a>
            </span>
            <span class=\"ml-1\">
                <a href=\"";
        // line 15
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add");
        echo "\"><button type=\"button\" class=\"btn btn-danger\" >Delete</button></a>
            </span>
        </h2>

        <table class=\"table w-50 m-3 table-striped\">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Windows</th>
                    <th>Overtime</th>
                    <th>Washed On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["buildings"]) || array_key_exists("buildings", $context) ? $context["buildings"] : (function () { throw new RuntimeError('Variable "buildings" does not exist.', 31, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["building"]) {
            // line 32
            echo "                <tr>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["building"], "name", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["building"], "number", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                    <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["building"], "windows", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                    <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["building"], "overtime", [], "any", false, false, false, 36), "html", null, true);
            echo "</td>
                    <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["building"], "dateWashed", [], "any", false, false, false, 37), "m-d-Y"), "html", null, true);
            echo "</td>
                    <td><span class=\"ml-1\">
                <a href=\"";
            // line 39
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add");
            echo "\"><button type=\"button\" class=\"btn btn-warning\" >Edit</button></a>
            </span>
                    <span class=\"mt-1\">
                <a href=\"";
            // line 42
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("add");
            echo "\"><button type=\"button\" class=\"btn btn-danger\" >Delete</button></a>
            </span>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['building'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "            </tbody>
        </table>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "building/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 47,  129 => 42,  123 => 39,  118 => 37,  114 => 36,  110 => 35,  106 => 34,  102 => 33,  99 => 32,  95 => 31,  76 => 15,  70 => 12,  64 => 9,  59 => 6,  52 => 5,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends('base.html.twig') %}



{% block body %}
    <div class=\"container\">
        <h2 class=\"m-2\">Building info
            <span class=\"ml-5\">
                <a href=\"{{ path('add') }}\"><button type=\"button\" class=\"btn btn-primary\" >Add</button></a>
            </span>
            <span class=\"ml-1\">
                <a href=\"{{ path('add') }}\"><button type=\"button\" class=\"btn btn-warning\" >Edit</button></a>
            </span>
            <span class=\"ml-1\">
                <a href=\"{{ path('add') }}\"><button type=\"button\" class=\"btn btn-danger\" >Delete</button></a>
            </span>
        </h2>

        <table class=\"table w-50 m-3 table-striped\">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Windows</th>
                    <th>Overtime</th>
                    <th>Washed On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for building in buildings %}
                <tr>
                    <td>{{ building.name }}</td>
                    <td>{{ building.number }}</td>
                    <td>{{ building.windows }}</td>
                    <td>{{ building.overtime }}</td>
                    <td>{{ building.dateWashed|date('m-d-Y') }}</td>
                    <td><span class=\"ml-1\">
                <a href=\"{{ path('add') }}\"><button type=\"button\" class=\"btn btn-warning\" >Edit</button></a>
            </span>
                    <span class=\"mt-1\">
                <a href=\"{{ path('add') }}\"><button type=\"button\" class=\"btn btn-danger\" >Delete</button></a>
            </span>
                    </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
{% endblock %}", "building/home.html.twig", "C:\\xampp\\htdocs\\sendmail\\templates\\building\\home.html.twig");
    }
}
