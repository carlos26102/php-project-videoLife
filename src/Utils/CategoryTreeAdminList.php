<?php
/*
|-----------------------------------------------------------
| available only at Udemy.com | copyright netprogs.pl | further distribution is prohibited
|-----------------------------------------------------------
*/
namespace App\Utils;

use App\Utils\AbstractClasses\CategoryTreeAbstract;

class CategoryTreeAdminList extends CategoryTreeAbstract
{

    public function getCategoryList(array $categories_array)
    {
        $this->categorylist .= $this->html_1;
        foreach ($categories_array as $value)
        {
            $url_edit = $this->urlgenerator->generate('edit_category.en', ['id' => $value['id']]);
            $url_delete = $this->urlgenerator->generate('delete_category.en', ['id' => $value['id']]);
            $this->categorylist .= $this->html_2 . $value['name'] . $this->html_3 . $url_edit . $this->html_4 . ' Edit' . $this->html_5 . $url_delete . $this->html_6 . 'Delete' . $this->html_7;
            if (!empty($value['children']))
            {
                $this->getCategoryList($value['children']);
            }
            $this->categorylist .= $this->html_8;
        }
        $this->categorylist .= $this->html_9;
        return $this->categorylist;
    }

}
