<?php

/* @API/listAllAPI.twig */
class __TwigTemplate_9c9bdc4dca5ffb64d463144fbd83db4214098fa5a84f46c9f103b1df85f40e30 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("dashboard.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["showMenu"] = false;
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "
";
        // line 6
        $this->env->loadTemplate("@CoreHome/_siteSelectHeader.twig")->display($context);
        // line 7
        echo "
<div class=\"page_api pageWrap\">

    <div class=\"top_controls\">
        ";
        // line 11
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 12
        echo "    </div>

    <h2>";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_QuickDocumentationTitle")), "html", null, true);
        echo "</h2>

    <p>";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_PluginDescription")), "html", null, true);
        echo "</p>


    <p>
        <strong>";
        // line 20
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_MoreInformation", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/analytics-api/reference'>", "</a>"));
        echo "</strong>
    </p>

    <h2>";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_UserAuthentication")), "html", null, true);
        echo "</h2>

    <p>
        ";
        // line 26
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_UsingTokenAuth", "<b>", "</b>", ""));
        echo "<br/>
        <span id='token_auth'>&amp;token_auth=<strong>";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["token_auth"]) ? $context["token_auth"] : $this->getContext($context, "token_auth")), "html", null, true);
        echo "</strong></span><br/>
        ";
        // line 28
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_KeepTokenSecret", "<b>", "</b>"));
        echo "
        ";
        // line 29
        echo (isset($context["list_api_methods_with_links"]) ? $context["list_api_methods_with_links"] : $this->getContext($context, "list_api_methods_with_links"));
        echo "
        <br/>
</div>
";
    }

    public function getTemplateName()
    {
        return "@API/listAllAPI.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 29,  82 => 28,  78 => 27,  74 => 26,  68 => 23,  62 => 20,  55 => 16,  50 => 14,  46 => 12,  44 => 11,  38 => 7,  36 => 6,  33 => 5,  30 => 4,  25 => 2,);
    }
}
