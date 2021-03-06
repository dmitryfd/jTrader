<?php
    require_once(dirname(__FILE__).'/../config.php');

    function getCategories()
    {
        $query = "SELECT Categories.type FROM Categories GROUP BY Categories.type;";
        $result = mysqli_query($GLOBALS['db'], $query);

        if ($result) 
        {
            $categories = array();

            while($category = mysqli_fetch_array($result)) 
            {
                $subcategories = array();
                $type = $category['type'];

                $query = "SELECT Categories.subtype FROM Categories WHERE Categories.type='$type';";
                $result2 = mysqli_query($GLOBALS['db'], $query);

                if ($result2) {
                    while($subcategory = mysqli_fetch_array($result2)) 
                    {
                        array_push($subcategories, $subcategory['subtype']);
                    }

                    $dict = array(
                        'category' => $category['type'],
                        'subcategories' => $subcategories);
                    array_push($categories, $dict);
                }
                else {
                   printf("Error: %s\n", mysqli_error($GLOBALS['db'])); 
                   return false;
                }
            }

            return $categories;
        }
        else
        {
            printf("Error: %s\n", mysqli_error($GLOBALS['db'])); 
            return false;
        }
    }

?>