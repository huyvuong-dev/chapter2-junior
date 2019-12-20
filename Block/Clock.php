<?php
namespace Magenest\Clock\Block;

class Clock extends \Magento\Framework\View\Element\Template
{
    protected $_scopeConfig;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    const STORE_SCOPE = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
    const XML_PATH_TITLE = 'clockconfiguration/clockpage/title_clock';
    const XML_PATH_SIZE = 'clockconfiguration/clockpage/size_clock';
    const XML_PATH_COLOR_CLOCK = 'clockconfiguration/clockpage/color_clock';
    const XML_PATH_TEXT_COLOR = 'clockconfiguration/clockpage/text_color';

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getTitleClock(){
        return $this->_scopeConfig->getValue(self::XML_PATH_TITLE, self::STORE_SCOPE);
    }

    public function getSizeClock(){
        return $this->_scopeConfig->getValue(self::XML_PATH_SIZE, self::STORE_SCOPE);
    }

    public function getColorClock(){
        return $this->_scopeConfig->getValue(self::XML_PATH_COLOR_CLOCK, self::STORE_SCOPE);
    }

    public function getTextColor(){
        return $this->_scopeConfig->getValue(self::XML_PATH_TEXT_COLOR, self::STORE_SCOPE);
    }
}