<?php

namespace Luvina\TestModule\Ui\DataProvider;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    public function getSearchResult()
    {
        $newGroup = [];
        $search = $this->getSearchCriteria();
        $groupFilter = $search->getFilterGroups();
        foreach ($groupFilter as $filter){
            foreach ($filter->getFilters() as $subFilter){
                if($subFilter->getField() == 'fulltext' && is_numeric($subFilter->getValue())){
                    $subFilter->setField('id');
                    $subFilter->setConditionType('like');
                    $filter->setFilters([$subFilter]);
                }

                if($subFilter->getField() == 'fulltext' && str_contains($subFilter->getValue(),',')){
                    $subFilter->setField('id');
                    $subFilter->setConditionType('in');
                    $subFilter->setValue([explode(',', $subFilter->getValue())]);
                    $filter->setFilters([$subFilter]);
                }

                $newGroup[] = $filter;
            }
        }
        $search->setFilterGroups(array_unique($newGroup));
        return $this->reporting->search($search);
    }
}
