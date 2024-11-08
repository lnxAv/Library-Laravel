<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends FileController
{
    protected $filePath = 'messages.json';
    // GET
    public function getMessages(Request $request)
    {
        return apiResponder(function () use ($request) {
            $data = $this->getFileData();
            // sort DESC
            uasort($data, function($a, $b) {
                return strtotime($b['createdAt']) - strtotime($a['createdAt']);
            });
            return $data;
        });
    }
    // POST
    public function postMessage(Request $request){
        return apiResponder(function () use ($request) {
            // Rules for validation
            $rules = [
                'nom' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:255',
            ];
            $validator = Validator::make($request->json()->all(), $rules);
            if ($validator->passes()) {
                $id = uniqid('message-');
                $today = date('Y/m/d H:i:s');
                $req = $request->json()->all();
                $message = new Message($id, $today, $req);
                $data = $this->getFileData();
                $data[$id] = $message->toArray();
                $this->putFileData($data);
                return $message->toArray();
            } else {
                throw new \Exception($validator->errors()->first());
                return null;
            }
        });
    }
    // DELETE
    public function deleteMessages(Request $request){
        return apiResponder(function () use ($request) {
            $this->putFileData([]);
            return null;
        });
    }
    public function deleteMessage(Request $request){
        return apiResponder(function () use ($request) {
            $rules = [
                'id' => 'required|string|max:255',
            ];
            info($request->id);
            $validator = Validator::make(['id' => $request->id], $rules);
            if ($validator->passes()) {
                $data = $this->getFileData();
                $id = $request->id;
                if( isset($data[$id]) ){
                    unset($data[$id]);
                    $this->putFileData($data);
                }else{
                    throw new \Exception('Message does not exist');
                }
                return ['id' => $id];
            } else {
                throw new \Exception($validator->errors()->first());
                return null;
            }
        });
    }
}
