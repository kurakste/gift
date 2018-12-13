<?php

namespace common\models;

use common\models\Items;
use yii\helpers\ArrayHelper;


class ItemsWithCats extends Items
{
    public $fcats_ids = [];
    public $scats_ids = [];


    /* public function rules() */
    /* { */
    /*     return ArrayHelper::merge(parent::rules(), [ */
    /*         /1* ['fcats_ids, scats_ids', 'safe'] *1/ */
    /*         /1* ['fcats_ids', 'each', 'rule' => [ 'exist' => Fcategorys::classname(), 'targetAttribute' => 'id'], *1/ */
    /*         /1* ], *1/ */
    /*         /1* ['scats_ids', 'each', 'rule' => [ *1/ */
    /*         /1*     'exist' => Scategorys::classname(), 'targetAttribute' => 'id'] *1/ */
    /*         /1* ], *1/ */
    /*     ]); */
    /* } */

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'fcats_id' => 'Fcats',
            'scats_id' => 'Scats',
        ]);
    }

    public function loadFcats()
    {
        $this->fcats_ids = []; 
        if (!empty($this->id)) {
            $rows = Itemtofcats::find()
                ->select(['fcid'])
                ->where(['iid' => $this->id])
                ->asArray()
                ->all();
        }
         foreach($rows as $row) {
               $this->fcats_ids[] = $row['fcid']  ;
            }
    }
    
    public function loadScats()
    {
        $this->scats_ids = []; 
        if (!empty($this->id)) {
            $rows = Itemtoscats::find()
                ->select(['scid'])
                ->where(['iid' => $this->id])
                ->asArray()
                ->all();
        }
         foreach($rows as $row) {
               $this->scats_ids[] = $row['scid'];
            }
    }

    public function saveFcats($fcats_ids)
    {
        Itemtofcats::deleteAll(['iid' => $this->id]);
        if (is_array($fcats_ids)) {
            foreach($fcats_ids as $fcid) {
                $fc = new Itemtofcats();
                $fc->iid = $this->id;
                $fc->fcid = $fcid;
                $fc->save();
            }
        }
    }
    
    public function saveScats($scats_ids)
    {
        Itemtoscats::deleteAll(['iid' => $this->id]);
        if (is_array($scats_ids)) {
            foreach($scats_ids as $scid) {
                $fc = new Itemtoscats();
                $fc->iid = $this->id;
                $fc->scid = $scid;
                $fc->save();
            }
        }
    }


}
