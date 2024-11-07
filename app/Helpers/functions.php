<?php

/*  @Desc: Function to process responses sent back, throw errors to be handled
    @Param: Func: Function to be called
*/

use function Laravel\Prompts\error;

function apiResponder($func)
{
    try {
        $response = $func();
        return response()->json(
            [
                'error' => false,
                'message' => 'Success',
                'data' => $response,
            ]
        );
    } catch (\Exception $e) {
        error($e->getMessage());
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'data' => null,
        ], 500);
    } catch (\Throwable $e) {
        error($e->getMessage());
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'data' => null,
        ], 500);
    } catch (\Error $e) {
        error($e->getMessage());
        return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'data' => null,
        ], 500);
    }
}
