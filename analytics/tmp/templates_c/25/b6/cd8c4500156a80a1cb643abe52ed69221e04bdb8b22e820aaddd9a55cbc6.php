<?php

/* @Widgetize/index.twig */
class __TwigTemplate_25b6cd8c4500156a80a1cb643abe52ed69221e04bdb8b22e820aaddd9a55cbc6 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "

<div class=\"pageWrap\">
    <div class=\"top_controls\">
        ";
        // line 8
        $this->env->loadTemplate("@CoreHome/_siteSelectHeader.twig")->display($context);
        // line 9
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 10
        echo "    </div>

    <script type=\"text/javascript\">
    \$(function () {
        var widgetized = new widgetize();
        var urlPath = document.location.protocol + '//' + document.location.hostname + (document.location.port == '' ? '' : (':' + document.location.port)) + document.location.pathname;
        var dashboardUrl = urlPath + '?module=Widgetize&action=iframe&moduleToWidgetize=Dashboard&actionToWidgetize=index&idSite=' + piwik.idSite + '&period=week&date=yesterday';
        \$('#exportFullDashboard').html(
                widgetized.getInputFormWithHtml('dashboardEmbed', '<iframe src=\"' + dashboardUrl + '\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" width=\"100%\" height=\"100%\"></iframe>')
        );
        \$('#linkDashboardUrl').attr('href', dashboardUrl);

        var allWebsitesDashboardUrl = urlPath + '?module=Widgetize&action=iframe&moduleToWidgetize=MultiSites&actionToWidgetize=standalone&idSite=' + piwik.idSite + '&period=week&date=yesterday';
        \$('#exportAllWebsitesDashboard').html(
                widgetized.getInputFormWithHtml('allWebsitesDashboardEmbed', '<iframe src=\"' + allWebsitesDashboardUrl + '\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\" width=\"100%\" height=\"100%\"></iframe>')
        );
        \$('#linkAllWebsitesDashboardUrl').attr('href', allWebsitesDashboardUrl);
        \$('#widgetPreview').widgetPreview({
            onPreviewLoaded: widgetized.callbackAddExportButtonsUnderWidget
        });
        broadcast.init();
    });
</script>


<div class=\"widgetize\">
    <p>With Piwik, you can export your Web Analytics reports on your blog, website, or intranet dashboard... in one click.

    <p>
        <strong>&rsaquo; Widget authentication:</strong> If you want your widgets to be viewable by everybody, you first have to set the 'view' permissions
        to the anonymous user in the <a href='index.php?module=UsersManager' target='_blank'>Users Management section</a>.
        <br/>Alternatively, if you are publishing widgets on a password protected or private page,
        you don't necessarily have to allow 'anonymous' to view your reports. In this case, you can add the secret token_auth parameter (found in the
        <a href='";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "API", "action" => "listAllAPI"))), "html", null, true);
        echo "' target='_blank'>API page</a>) in the widget URL.
    </p>

    <p><strong>&rsaquo; Widgetize the full dashboard:</strong> You can also display the full Piwik dashboard in your application or website in an IFRAME
        (<a href='' target='_blank' id='linkDashboardUrl'>see example</a>).
        The date parameter can be set to a specific calendar date, \"today\", or \"yesterday\". The period parameter can be set to \"day\", \"week\", \"month\", or
        \"year\".
        The language parameter can be set to the language code of a translation, such as language=fr.
        For example, for idSite=1 and date=yesterday, you can write: <span id='exportFullDashboard'></span>
    </p>

    <p>
        <strong>&rsaquo; Widgetize the all websites dashboard in an IFRAME</strong> (<a href='' target='_blank' id='linkAllWebsitesDashboardUrl'>see example</a>)
        <span id='exportAllWebsitesDashboard'></span>
    </p>

    <p><strong>&rsaquo; Select a report, and copy paste in your page the embed code below the widget:</strong>

    <div id=\"widgetPreview\"></div>

    <div id='iframeDivToExport' style='display:none;'></div>
</div>
</div>

";
        // line 67
        $this->env->loadTemplate("@Dashboard/_widgetFactoryTemplate.twig")->display($context);
        // line 68
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Widgetize/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 68,  104 => 67,  77 => 43,  42 => 10,  39 => 9,  37 => 8,  31 => 4,  28 => 3,);
    }
}
