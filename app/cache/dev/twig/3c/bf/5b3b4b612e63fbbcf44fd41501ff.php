<?php

/* ::layout.html.twig */
class __TwigTemplate_3cbf5b3b4b612e63fbbcf44fd41501ff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'webappblackspan_body' => array($this, 'block_webappblackspan_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html><head>
<title>Blackspan</title>
<meta charset=\"UTF-8\">
<meta name=\"description\" content=\"\" />
<script type=\"text/javascript\" src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>
<!--[if lt IE 9]><script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
<script type=\"text/javascript\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/prettify.js"), "html", null, true);
        echo "\" </script>   
<script type=\"text/javascript\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/kickstart.js"), "html", null, true);
        echo "\"></script>   
";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 14
        echo "</head><body><a id=\"top-of-page\"></a><div id=\"wrap\" class=\"clearfix\">
<!-- ===================================== END HEADER ===================================== -->
";
        // line 16
        $this->displayBlock('webappblackspan_body', $context, $blocks);
        // line 18
        echo "
\t<!-- 
\t
\t\tADD YOUR HTML ELEMENTS HERE
\t\t
\t\tExample: 2 Columns
\t -->

\t<div class=\"col_12\">
\t<h1 class=\"center\">
\t<span class=\"icon\" style=\"font-size:400px;text-shadow: 0px 3px 2px rgba(0,0,0,0.3);color:#efefef;\" data-icon=\"F\"></span><br />
\tThis example is blank</h1>
\t<h3 style=\"color:#ccc;margin-bottom:40px;\" class=\"center\">Add some HTML KickStart Elements to see the magic happen</h3>
\t</div>

<!-- ===================================== START FOOTER ===================================== -->
</div>

</div><!-- END WRAP -->
</body></html>
";
    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 11
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/kickstart.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\"/>
<link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 16
    public function block_webappblackspan_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 16,  76 => 12,  71 => 11,  68 => 10,  44 => 18,  42 => 16,  36 => 10,  32 => 9,  19 => 1,  41 => 6,  38 => 14,  31 => 3,  28 => 8,  40 => 6,  37 => 5,  30 => 3,  27 => 2,);
    }
}
