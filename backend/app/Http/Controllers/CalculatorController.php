<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function calculate(Request $request)
    {
        $operand1 = $request->input('operand1');
        $operand2 = $request->input('operand2');
        $operator = $request->input('operator');

        switch ($operator) {
            case '+':
                $result = $operand1 + $operand2;
                break;
            case '-':
                $result = $operand1 - $operand2;
                break;
            case '*':
                $result = $operand1 * $operand2;
                break;
            case '/':
                if ($operand2 == 0) {
                    return response()->json(['error' => 'Division by zero'], 400);
                }
                $result = $operand1 / $operand2;
                break;
            default:
                return response()->json(['error' => 'Invalid operator'], 400);
        }

        return response()->json(['result' => $result]);
    }
}

