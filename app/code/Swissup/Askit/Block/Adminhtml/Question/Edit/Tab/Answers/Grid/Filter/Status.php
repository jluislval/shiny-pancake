<?php
namespace Swissup\Askit\Block\Adminhtml\Question\Edit\Tab\Answers\Grid\Filter;

use Swissup\Askit\Model\Item;
use Swissup\Askit\Model\Item\Status as ItemStatus;

class Status extends \Magento\Backend\Block\Widget\Grid\Column\Filter\Select
{
    /**
     * @var array
     */
    protected static $statuses;

    /**
     * @return void
     */
    protected function _construct()
    {
        self::$statuses = ItemStatus::getOptionArray();
        parent::_construct();
    }

    /**
     * @return array
     */
    protected function _getOptions()
    {
        $options = [['value' => '', 'label' => '']];
        foreach (self::$statuses as $status => $label) {
            $options[] = ['value' => $status, 'label' => __($label)];
        }

        return $options;
    }

    /**
     * @return array|null
     */
    public function getCondition()
    {
        return $this->getValue() === null ? null : ['eq' => $this->getValue()];
    }
}
