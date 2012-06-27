<?php

/* WebappBlackspanBundle::layout.html.twig */
class __TwigTemplate_9d249db75bd0cca575c1c53c5360716e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'webappblackspan_body' => array($this, 'block_webappblackspan_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "Gestion des accès - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        $this->displayBlock('webappblackspan_body', $context, $blocks);
    }

    public function block_webappblackspan_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "WebappBlackspanBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 6,  38 => 5,  31 => 3,  28 => 2,  40 => 6,  37 => 5,  30 => 3,  27 => 2,);
    }
}
