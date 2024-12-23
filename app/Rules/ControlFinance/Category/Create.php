<?php

namespace Rules\ControlFinance\Category;

use App\Models\ControlFinance\Category;

class Create
{
    public function execute($data)
    {
        $newCategory = Category::create($data);

        if (!$newCategory) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova categoria criada.", "statusCode" => 200];
    }
}