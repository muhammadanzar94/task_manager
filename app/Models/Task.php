<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model {
    use HasFactory;

    public $timestamps = true;
    protected $table = 'tasks';
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'user_id',
        'name'
    ];


    public static function saveNewTasks($new_task) {
        $result = new Task(self::mapOnTable($new_task));
        if ($result->save()) {
            return $result;
        }
        return false;
    }


    public static function mapOnTable($params) {
        return [
            'uuid' => Str::uuid()->toString(),
            'name' => $params['name'],
            'user_id' => $params['user_id'],
        ];
    }
}
