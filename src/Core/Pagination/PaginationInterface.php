<?php
namespace Core\Pagination;

interface PaginationInterface
{
    /**
     * @return int
     */
    public function getitems(array $data, int $page);

    
    public function getpages(array $data);


    


}