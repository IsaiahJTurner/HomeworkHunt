<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\ReportRenderer;

use Piwik\Plugins\API\API;
use Piwik\ReportRenderer;
use Piwik\SettingsPiwik;
use Piwik\View;

/**
 *
 */
class Html extends ReportRenderer
{
    const IMAGE_GRAPH_WIDTH = 700;
    const IMAGE_GRAPH_HEIGHT = 200;

    const REPORT_TITLE_TEXT_SIZE = 11;
    const REPORT_TABLE_HEADER_TEXT_SIZE = 11;
    const REPORT_TABLE_ROW_TEXT_SIZE = 11;
    const REPORT_BACK_TO_TOP_TEXT_SIZE = 9;

    const HTML_CONTENT_TYPE = 'text/html';
    const HTML_FILE_EXTENSION = 'html';

    protected $renderImageInline = false;

    private $rendering = "";

    public function setLocale($locale)
    {
        //Nothing to do
    }

    /**
     * Currently only used for HTML reports.
     * When sent by mail, images are attached to the mail: renderImageInline = false
     * When downloaded, images are included base64 encoded in the report body: renderImageInline = true
     *
     * @param boolean $renderImageInline
     */
    public function setRenderImageInline($renderImageInline)
    {
        $this->renderImageInline = $renderImageInline;
    }

    public function sendToDisk($filename)
    {
        $this->epilogue();

        return ReportRenderer::writeFile($filename, self::HTML_FILE_EXTENSION, $this->rendering);
    }

    public function sendToBrowserDownload($filename)
    {
        $this->epilogue();

        ReportRenderer::sendToBrowser($filename, self::HTML_FILE_EXTENSION, self::HTML_CONTENT_TYPE, $this->rendering);
    }

    public function sendToBrowserInline($filename)
    {
        $this->epilogue();

        ReportRenderer::inlineToBrowser(self::HTML_CONTENT_TYPE, $this->rendering);
    }

    public function getRenderedReport()
    {
        $this->epilogue();

        return $this->rendering;
    }

    private function epilogue()
    {
        $view = new View('@CoreHome/ReportRenderer/_htmlReportFooter');
        $this->rendering .= $view->render();
    }

    public function renderFrontPage($reportTitle, $prettyDate, $description, $reportMetadata, $segment)
    {
        $frontPageView = new View('@CoreHome/ReportRenderer/_htmlReportHeader');
        $this->assignCommonParameters($frontPageView);

        $frontPageView->assign("reportTitle", $reportTitle);
        $frontPageView->assign("prettyDate", $prettyDate);
        $frontPageView->assign("description", $description);
        $frontPageView->assign("reportMetadata", $reportMetadata);

        // segment
        $displaySegment = ($segment != null);
        $frontPageView->assign("displaySegment", $displaySegment);
        if ($displaySegment) {
            $frontPageView->assign("segmentName", $segment['name']);
        }

        $this->rendering .= $frontPageView->render();
    }

    private function assignCommonParameters(View $view)
    {
        $view->assign("reportTitleTextColor", ReportRenderer::REPORT_TITLE_TEXT_COLOR);
        $view->assign("reportTitleTextSize", self::REPORT_TITLE_TEXT_SIZE);
        $view->assign("reportTextColor", ReportRenderer::REPORT_TEXT_COLOR);
        $view->assign("tableHeaderBgColor", ReportRenderer::TABLE_HEADER_BG_COLOR);
        $view->assign("tableHeaderTextColor", ReportRenderer::TABLE_HEADER_TEXT_COLOR);
        $view->assign("tableCellBorderColor", ReportRenderer::TABLE_CELL_BORDER_COLOR);
        $view->assign("tableBgColor", ReportRenderer::TABLE_BG_COLOR);
        $view->assign("reportTableHeaderTextSize", self::REPORT_TABLE_HEADER_TEXT_SIZE);
        $view->assign("reportTableRowTextSize", self::REPORT_TABLE_ROW_TEXT_SIZE);
        $view->assign("reportBackToTopTextSize", self::REPORT_BACK_TO_TOP_TEXT_SIZE);
        $view->assign("currentPath", SettingsPiwik::getPiwikUrl());
        $view->assign("logoHeader", API::getInstance()->getHeaderLogoUrl());
    }

    public function renderReport($processedReport)
    {
        $reportView = new View('@CoreHome/ReportRenderer/_htmlReportBody');
        $this->assignCommonParameters($reportView);

        $reportMetadata = $processedReport['metadata'];
        $reportData = $processedReport['reportData'];
        $columns = $processedReport['columns'];
        list($reportData, $columns) = self::processTableFormat($reportMetadata, $reportData, $columns);

        $reportView->assign("reportName", $reportMetadata['name']);
        $reportView->assign("reportId", $reportMetadata['uniqueId']);
        $reportView->assign("reportColumns", $columns);
        $reportView->assign("reportRows", $reportData->getRows());
        $reportView->assign("reportRowsMetadata", $processedReport['reportMetadata']->getRows());
        $reportView->assign("displayTable", $processedReport['displayTable']);

        $displayGraph = $processedReport['displayGraph'];
        $evolutionGraph = $processedReport['evolutionGraph'];
        $reportView->assign("displayGraph", $displayGraph);

        if ($displayGraph) {
            $reportView->assign("graphWidth", self::IMAGE_GRAPH_WIDTH);
            $reportView->assign("graphHeight", self::IMAGE_GRAPH_HEIGHT);
            $reportView->assign("renderImageInline", $this->renderImageInline);

            if ($this->renderImageInline) {
                $staticGraph = parent::getStaticGraph(
                    $reportMetadata,
                    self::IMAGE_GRAPH_WIDTH,
                    self::IMAGE_GRAPH_HEIGHT,
                    $evolutionGraph,
                    $processedReport['segment']
                );
                $reportView->assign("generatedImageGraph", base64_encode($staticGraph));
                unset($generatedImageGraph);
            }
        }

        $this->rendering .= $reportView->render();
    }
}
