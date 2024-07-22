<?php
namespace Core\Pagination;

class Pagination implements PaginationInterface{
    private $itemparpage;

    public function __construct($itemparpage){
        $this->itemparpage = $itemparpage;
    }

    public function getitems(array $data, int $page){

        $start = ($page - 1) * $this->itemparpage;
        $items = array_slice($data, $start, $this->itemparpage);
        return $items;
    }

    public function getpages(array $data){
        $pages = ceil(count($data) / $this->itemparpage);
        return $pages;
    }

    
    

    
}