<?php
namespace Magenest\Clock\Model\Config\Source;
class ClockSize implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [
                'value' => '1',
                'label' => __('Small')
            ],
            [
                'value' => '2',
                'label' => __('Big')
            ],

        ];
    }
}