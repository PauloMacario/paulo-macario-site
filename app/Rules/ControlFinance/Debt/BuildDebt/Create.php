<?php

namespace Rules\ControlFinance\Debt\BuildDebt;

use App\Models\ControlFinance\Debt;
use App\Models\ControlFinance\Installment;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class Create
{
    public function execute($dataDebt)
    {
        $director = new Director();
        $debtBuilder = new ConcreteBuilder();

        try {
            $director->setBuilder($debtBuilder);
            $buildDebt = $director->buildDebt($dataDebt);
            
            $parts = $buildDebt->listParts();
           
            $debt = Debt::create($parts['debt']);
    
            $this->createInstallments($parts, $debt->id);

            return ["status" => "success" , "msg" => "Compra adicionada!", "statusCode" => 200];
            
        } catch (Exception $e) {
            
            $error = ["status" => "error" , "msg" => "Ocorreu um erro inesperado.", "statusCode" => 400];

            $log = $error;
            $log['msg'] += ' ## ' . $e->getMessage();
            logger()->info($log);

            return $error;
        }

        $director->setBuilder($debtBuilder);
        $buildDebt = $director->buildDebt($dataDebt);
        
        $parts = $buildDebt->listParts();
       
        $debt = Debt::create($parts['debt']);

        $this->createInstallments($parts, $debt->id);

        return $debt;
    }

    public function createInstallments($parts, $debtId)
    {
        foreach ($parts['installments'] as $key => $intallment) {
            $intallment['debt_id'] = $debtId;
            
            $inst = Installment::create($intallment);
        }
    }
}