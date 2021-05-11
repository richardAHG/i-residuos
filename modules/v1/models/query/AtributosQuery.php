<?php

namespace app\modules\v1\models\query;

use app\modules\v1\constants\Globals;
use app\modules\v1\constants\Params;

class AtributosQuery
{
    public static function getAtributtes($estrategiaId)
    {

        return (new \yii\db\Query())
            ->select('id,nombre')
            ->from('compromisos.estrategia_atributos ea')
            ->where(
                'estrategia_id=:estrategia_id and tipo_id =:tipo_id',
                [':estrategia_id' => $estrategiaId, ':tipo_id' => Globals::ATRIBUTO_COMBO]
            )
            ->all();

        // return (new \yii\db\Query())
        //     ->select('ea.id as atributo_id,ea.nombre as atributo')
        //     ->from('compromisos.estrategias e')
        //     ->join(
        //         'INNER JOIN',
        //         'compromisos.compromisos c',
        //         'c.estrategia_id =e.id and c.estado is true'
        //     )
        //     ->join(
        //         'INNER JOIN',
        //         'compromisos.compromiso_estrategia_atributos cea',
        //         'c.id =cea.compromiso_id and cea.estado is true'
        //     )
        //     ->join(
        //         'INNER JOIN',
        //         'compromisos.estrategia_atributos ea',
        //         'cea.estrategia_atributo_id =ea.id and ea.estado is true'
        //     )
        //     ->where(
        //         'e.proyecto_id =:proyecto_id and e.id =:estrategia_id and e.estado is true',
        //         [':proyecto_id' => Params::getProyectoId(), ':estrategia_id' => $estrategiaId]
        //     )
        //     ->distinct()
        //     ->orderBy(['atributo_id' => SORT_ASC])
        //     ->all();
    }
}
