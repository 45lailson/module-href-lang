<?php

namespace Href\Lang\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Locale\Resolver;
use \Magento\Cms\Model\Page;

class Hreflang extends \Magento\Framework\View\Element\Template
{
    protected $_storeManager;
    /**
     * @var Resolver
     */
    protected $_locale;

    /**
     * @var Page
     */
    protected $_cmsPage;

    /**
     * Construtor Hreflang
     * @param Template\Context $context
     * @param Resolver $locale
     * @param Page $page
     * @param array $data
     */
    public function __construct(Template\Context $context, Resolver $locale, Page $cmsPage, array $data = [])
    {
        $this->_storeManager = $context->getStoreManager();
        $this->_locale = $locale;
        $this->_cmsPage = $cmsPage;
        parent::__construct($context, $data);
    }

    /**
     * obter a localidade e converter formato country-lang
     * @return string
     */
    public function getLanguageStore()
    {
        return strtolower(str_replace("_", "-", $this->_locale->getLocale()));
    }

    /**
     * Contar e verificar é multi-loja
     * @return bool
     */
    public function isCmsPageMultiStore()
    {
        $storesCms = $this->_cmsPage->getStores();
        return ($storesCms[0] == 0 || count($storesCms) > 1) ?? false;
    }

    /**
     * Obter concat da página cms de url atual com identificador
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getCurrentUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl() . $this->_cmsPage->getIdentifier();
    }

    /**
     * retornar html da meta-tag
     * @return string
     */
    public function getMetaTagHrefLanguage()
    {
        // if metatag de exibição de várias lojas
        if (self::isCmsPageMultiStore())
            return sprintf('<link rel="alternate" hreflang="%s" href="%s">', self::getLanguageStore(), self::getCurrentUrl());

        return __("");
    }
}
