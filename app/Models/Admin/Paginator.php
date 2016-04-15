<?php

namespace App\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Paginator
 *
 * @package App\Model\Admin
 */
class Paginator extends LengthAwarePaginator
{
    /**
     * @var int $filteredTotal
     */
    protected $_filteredTotal;

    /**
     * @var int $requestId
     */
    protected $_requestId;

    /**
     * Create a new paginator instance.
     *
     * @param mixed    $items
     * @param int      $total
     * @param int      $filteredTotal
     * @param int      $requestId
     * @param int      $perPage
     * @param int|null $currentPage
     *
     * @return Paginator
     */
    public function __construct($items, $total, $filteredTotal, $requestId, $perPage, $currentPage = null)
    {
        parent::__construct($items, $total, $perPage, $currentPage);
        $this->_filteredTotal = $filteredTotal;
        $this->_requestId = $requestId;
        $this->lastPage = (int) ceil($filteredTotal / $perPage);
    }

    /**
     * Filtered total
     *
     * @return int
     */
    public function filteredTotal()
    {
        return $this->_filteredTotal;
    }

    /**
     * Request id
     *
     * @return int
     */
    public function requestId()
    {
        return (int) $this->_requestId;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'total'          => $this->total(),
            'filtered_total' => $this->filteredTotal(),
            'per_page'       => $this->perPage(),
            'current_page'   => $this->currentPage(),
            'last_page'      => $this->lastPage(),
            'from'           => $this->firstItem(),
            'to'             => $this->lastItem(),
            'request_id'     => $this->requestId(),
            'data'           => $this->items->toArray(),
        ];
    }
}