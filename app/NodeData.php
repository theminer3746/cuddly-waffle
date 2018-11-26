<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NodeData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nodedata';

    protected $fillable = [
        'alarm',
        'let_alarm',
        'alarm_stop',
    ];

    public function getDataById($nodeId)
    {
        return $this->where('id', $nodeId)
            ->select('let_alarm', 'alarm_stop')
            ->first();
    }

    public function setDataById($nodeId, $alarm, $let_alarm, $alarm_stop)
    {
        return $this->where('id', $nodeId)
            ->update([
                'alarm' => $alarm,
                'let_alarm' => $let_alarm,
                'alarm_stop' => $alarm_stop,
            ]);
    }
}
