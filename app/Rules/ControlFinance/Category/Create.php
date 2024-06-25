<?php

namespace Rules\ControlFinance\Category;

use App\Models\ControlFinance\Category;

class Create
{
    public function execute($request)
    {
        $newCategory = Category::create($request->except('_token'));

        if (!$newCategory) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        return ["status" => "success" , "msg" => "Nova categoria criada.", "statusCode" => 200];
    }
}