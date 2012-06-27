<?php

/* WebappBlackspanBundle:Default:index.html.twig */
class __TwigTemplate_6a0449f4e592bf0b7fc170ef154ed67a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebappBlackspanBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'webappblackspan_body' => array($this, 'block_webappblackspan_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebappBlackspanBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "Tableau de bord -";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_webappblackspan_body($context, array $blocks = array())
    {
        // line 6
        echo "Hello 
";
    }

    public function getTemplateName()
    {
        return "WebappBlackspanBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  37 => 5,  30 => 3,  27 => 2,);
    }
}
