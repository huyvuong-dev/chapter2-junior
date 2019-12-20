<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

use Magenest\Clock\Block\Adminhtml\Form\Field\ClockTypeColumn;
use Magenest\Clock\Block\Adminhtml\Form\Field\CustomerGroupColumn;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;


/**
 * Class Ranges
 */
class ClockType extends AbstractFieldArray
{
    /**
     * @var ClockTypeColumn
     */
    private $clockTypeRenderer;

    /**
     * @var CustomerGroupColumn
     */
    private $customerGroupRenderer;

    /**
     * Prepare rendering the new field by adding all the needed columns
     */
    protected function _prepareToRender()
    {
        $this->addColumn('customer_group', [
            'label' => __('Customer Group'),
            'renderer' => $this->getCustomerGroupRenderer()
        ]);
        $this->addColumn('clock_type', [
            'label' => __('Clock Type'),
            'renderer' => $this->getclockTypeRenderer()
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @throws LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row): void
    {
        $options = [];

        $tax = $row->getTax();
        if ($tax !== null) {
            $options['option_' . $this->getClockTypeRenderer()->calcOptionHash($tax)] = 'selected="selected"';
        }

        $row->setData('option_extra_attrs', $options);
    }

    /**
     * @return ClockTypeColumn
     * @throws LocalizedException
     */
    private function getClockTypeRenderer()
    {
        if (!$this->clockTypeRenderer) {
            $this->clockTypeRenderer = $this->getLayout()->createBlock(
                ClockTypeColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->clockTypeRenderer;
    }

    /**
     * @return CustomerGroupColumn
     * @throws LocalizedException
     */
    private function getCustomerGroupRenderer()
    {
        if (!$this->customerGroupRenderer) {
            $this->customerGroupRenderer = $this->getLayout()->createBlock(
                CustomerGroupColumn::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerGroupRenderer;
    }
}
