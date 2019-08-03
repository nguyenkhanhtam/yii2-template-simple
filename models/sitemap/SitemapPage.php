<?php

namespace app\models\sitemap;

use yii\helpers\Url;
use dreamjobs\sitemap\interfaces\Basic;
use app\models\Page;

/**
 * Class SitemapPage
 *
 * @package app\commands\models\sitemap
 */
class SitemapPage extends Page implements Basic
{
    /**
     * Handle materials by selecting batch of elements.
     * Increase this value and got more handling speed but more memory usage.
     *
     * @var int
     */
    public $sitemapBatchSize = 10;

    /**
     * @inheritdoc
     */
    public function getSitemapItems($lang = null)
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapItemsQuery($lang = null)
    {
        return static::find()->where([
                'active' => 1
            ])->orderBy([
                'id' => SORT_DESC
            ]);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapLoc($lang = null)
    {
        return Url::to('/page/' . $this->id, true);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapLastmod($lang = null)
    {
        $inDateTime = new \DateTime($this->updated_at);

        return $inDateTime->getTimestamp();
    }

    /**
     * @inheritdoc
     */
    public function getSitemapChangefreq($lang = null)
    {
        return static::CHANGEFREQ_MONTHLY;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapPriority($lang = null)
    {
        return static::PRIORITY_8;
    }
}
