<?php
namespace App\Helpers;

class BranchModelDataHelper
{

    /**
     * Get branch list
     */
    public static function getBranchList($addSelectAll = false)
    {
        $data_list = \App\Branch::orderBy('name', 'asc')
            ->pluck('name', 'id');

        if ($addSelectAll) {
            $data_list->prepend(__('general.all'), -1);
        }

        //dd( $data_list);
        return $data_list;
    }

}
