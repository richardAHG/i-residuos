<?php

namespace app\modules\v1\models\query;

class CompromisoAsociadoQuery
{
    public static function listar()
    {
        $query = (new \yii\db\Query())
            ->select('c.id as compromiso_id, cd.medida,
                    ea.id as atributo_id,ea.nombre as atributo,
                    eao.id as opcion_id,eao.nombre as opcion')
            ->from('residuos.estrategia_atributos_temp eat')
            ->join(
                'INNER JOIN',
                'compromisos.compromisos c',
                'eat.estrategia_id =c.estrategia_id '
            )
            ->join(
                'INNER JOIN',
                'compromisos.compromiso_detalle cd',
                'cd.compromiso_id =c.id'
            )
            ->join(
                'INNER JOIN',
                'compromisos.compromiso_estrategia_atributos cea',
                'c.id =cea.compromiso_id'
            )
            ->join(
                'INNER JOIN',
                'compromisos.estrategia_atributos ea',
                'ea.id =cea.estrategia_atributo_id'
            )
            ->join(
                'INNER JOIN',
                'compromisos.estrategia_atributo_opciones eao',
                'cea.valor =cast(eao.id as char)'
            )
            ->distinct()
            // ->where([
            //     'pa.proyecto_id' => $proyectoId,
            //     'colaborador_id' => $colaboradorId
            // ])
            ->orderBy('compromiso_id, atributo_id , opcion_id desc')
            ->all();

        return $query;
    }
}