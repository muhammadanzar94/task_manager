<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function createTask(Request $request) {

        try {
            $inputs = $request->all();
            $user = $request->get('user');
            $result = Task::saveNewTasks(['name' => $inputs['name'], 'user_id' => $user['id']]);
            if ($result) {
                return response()->json(['task' => ['id' => $result['id'], 'name' => $result['name']]], 200);
            }
        } catch (\Exception $ex) {
            $log = [];
            $log["message"] = $ex->getMessage();
            $log["file"] = $ex->getFile();
            $log["line"] = $ex->getLine();
            \Log::info(print_r($log, true));
        }
        return response()->json(['message' => "Something went wrong in creating a new user!"], 400);
    }

    public function listTasks(Request $request) {

        try {
            $inputs = $request->all();
            $user = $request->get('user');
            $result = Task::where('user_id', $user['id'])->get();
            if ($result) {
                return response()->json(['tasks' => $this->cookTasksData($result)], 200);
            }
        } catch (\Exception $ex) {
            $log = [];
            $log["message"] = $ex->getMessage();
            $log["file"] = $ex->getFile();
            $log["line"] = $ex->getLine();
            \Log::info(print_r($log, true));
        }
        return response()->json(['message' => "Something went wrong in creating a new user!"], 400);
    }


    public function cookTasksData($tasks) {

        foreach ($tasks as $key => $task) {
            $result[] = ['id' => $task['id'], 'name' => $task['name']];
        }
        return $result;
    }
}
