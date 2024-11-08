<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends FileController
{
    protected $filePath = 'books.json';

    // GET
    public function getBooks(Request $request)
    {
        return apiResponder(function () use ($request) {
            $data = $this->getFileData();
            $search = request('search') ?? '';
            $year = request('year') ?? '';

            if((isset($search) && $search !== '') || (isset($year) && $year !== '')){
                $data = array_filter($data, function ($book) use ($search, $year) {
                    $test = false;

                    $hasSearch = isset($search) && $search !== '';
                    $hasYear = isset($year) && $year !== '';

                    if($hasSearch && $hasYear){
                        $test = false;
                        if(str_starts_with($book['title'], $search) && str_starts_with($book['year'], $year)){
                            $test = true;
                        }
                    }else if($hasSearch){
                        if(str_starts_with($book['title'], $search)){
                            $test = true;
                        }
                    }else if($hasYear){
                        if(str_starts_with($book['year'], $year)){
                            $test = true;
                        }
                    }else{
                        $test = true;
                    }
                    return $test;
                });
            }
            // FILTER FUNCTIONS HERE
            return $data;
        });
    }

    public function getBooksSorted(Request $request){
        return apiResponder(function () use ($request) {
            $data = $this->getFileData();
            $order = $request->order;
            $today = date_create();
            // if is 10 days old do not show
            $data =array_filter($data, function ($book) use ($today) {
                $date = date_create($book['updateDate']);
                $diff = date_diff($today, $date);
                // if diff is less than 10 days
                return $diff->days <= 10;

            });
            if($order === 'year'){
                uasort($data, function($a, $b) {
                    // sort DESC
                    return strtotime($b['updateDate']) - strtotime($a['updateDate']);
                });
            }
            return $data;
        });
    }

    public function getBooksById(Request $request)
    {
        return apiResponder(function () use ($request) {
            $data = $this->getFileData();
            $isbn = $request->isbn;
            if( isset($data[$isbn]) ){
                return $data[$isbn];
            }else{
                throw new \Exception('Book does not exist');
            }
        });
    }
    // POST
    public function postBook(Request $request){
        return apiResponder(function () use ($request) {
            // Rules for validation
            $rules = [
                'isbn' => 'required|string|min:13|max:13',
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'author' => 'required|string|max:255',
                'publisher' => 'required|string|max:255',
                'published' => 'required|string|max:255',
                'pages' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'required|string|max:255',
                'price' => 'required|string|max:255',
            ];
            $validator = Validator::make($request->json()->all(), $rules);
            if ($validator->passes()) {
                $data = $this->getFileData();
                $today = date('Y/m/d H:i:s');;
                $jsonBook = $request->json()->all();
                $jsonBook['updateDate'] = $today;
                $book = new Book($jsonBook);
                // Check if book exists
                if( isset($data[$book->isbn]) ){
                    throw new \Exception('Book already exists');
                    return null;
                }
                $data[$book->isbn] = $book->toArray();
                $this->putFileData($data);
                return ['isbn' => $book->isbn];
            } else {
                throw new \Exception($validator->errors()->first());
                return null;
            }
        });
    }
    // DELETE
    public function deleteBook(Request $request){
        return apiResponder(function () use ($request) {
            $rules = [
                'isbn' => 'required|string|min:13|max:13',
            ];
            $validator = Validator::make($request->json()->all(), $rules);
            if ($validator->passes()) {
                $data = $this->getFileData();
                $isbn = $request->isbn;
                if( isset($data[$isbn]) ){
                    unset($data[$isbn]);
                    $this->putFileData($data);
                }else{
                    throw new \Exception('Book does not exist');
                }
                return ['isbn' => $isbn];
            } else {
                throw new \Exception($validator->errors()->first());
                return null;
            }
        });
    }
}
