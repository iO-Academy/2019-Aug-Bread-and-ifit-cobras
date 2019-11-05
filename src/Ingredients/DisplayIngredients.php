<?php


namespace BreadAndIfit\Ingredients;


class DisplayIngredients
{
    public static function displayIngredients(array $ingredients): string {

        $ingredientSorted = self::formatData($ingredients);

        $output = self::outputHTML($ingredientSorted);

        return $output;

    }

    private static function formatData(array $ingredients): array {
        $ingredientSorted = [];
        foreach ($ingredients as $ingredient) {
            $ingredientSorted[$ingredient->getCategory()][] = $ingredient->getName();
        }
        return $ingredientSorted;
    }

    private static function outputHTML(array $ingredientSorted): string {
        $accordion = '<div class="accordion" id="accordionExample">';
        foreach ($ingredientSorted as $category => $array){
            $list = '';
            foreach ($array as $key => $value){
                $list .= '<input type="checkbox">'.$value.'</input>';
            }
        $accordion .= '<div class="card">
                        <div class="card-header" id="headingOne">
                             <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$category.'" aria-expanded="true" aria-controls="collapse'.$category.'">'
                                    . $category .
                                '</button>
                              </h2>
                        </div>
        
                         <div id="collapse'.$category.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                         <div class="card-body">
                         <ul>
                         ' . $list . '
                         </ul>                        
                         </div>
                        </div>
                    </div>';
        }

        $accordion .= '</div>';

        return $accordion;
    }
}

