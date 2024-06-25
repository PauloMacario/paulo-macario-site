<?php

namespace Rules\ControlFinance\Category;

use App\Models\ControlFinance\Category;

class Update
{
    public function execute($request)
    {
        $category = Category::find($request->id);

        if (!$category) {
            return ["status" => "info" , "msg" => "Ocorreu algum erro.", "statusCode" => 400];
        }

        $category->update(
            $request->except(['id','_token'])
        );

        return ["status" => "success" , "msg" => "Atualizado.", "statusCode" => 200];
    }
}