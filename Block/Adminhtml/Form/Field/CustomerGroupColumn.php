<?php
declare(strict_types=1);

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

use Magento\Framework\View\Element\Html\Select;

class CustomerGroupColumn extends Select
{
    protected $_customerGroupCollection;
    public function __construct(\Magento\Framework\View\Element\Context $context ,
                                \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroupCollection,
                                array $data = [])
    {
        $this->_customerGroupCollection = $customerGroupCollection;
        parent::__construct($context, $data);
    }

    /**
     * Set "name" for <select> element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Set "id" for <select> element
     *
     * @param $value
     * @return $this
     */
    public function setInputId($value)
    {
        return $this->setId($value);
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml(): string
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getSourceOptions());
        }
        return parent::_toHtml();
    }

    private function getSourceOptions(): array
    {
        $option = [];
        $groups = $this->_customerGroupCollection->getData();
        foreach ($groups as $group){
            $option[] = [
                'label' => $group['customer_group_code'],
                'value' => $group['customer_group_id']
            ];
        }
        return $option;
    }
}
