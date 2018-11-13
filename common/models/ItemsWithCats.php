<?php

namespace common\models;

use common\models\Items;
use yii\helpers\ArrayHelper;


class ItemsWithCats extends Items
{
    public $fcats_ids = [];
    public $scats_ids = [];


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['fcats_ids, scats_ids', 'safe']
            /* ['fcats_ids', 'each', 'rule' => [ 'exist' => Fcategorys::classname(), 'targetAttribute' => 'id'], */
            /* ], */
            /* ['scats_ids', 'each', 'rule' => [ */
            /*     'exist' => Scategorys::classname(), 'targetAttribute' => 'id'] */
            /* ], */
        ]);
    }

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

    public function saveFcats()
    {
        Itemtofcats::deleteAll(['iid' => $this->id]);
        if (is_array($this->fcats_ids)) {
            foreach($this->fcats_ids as $fcid) {
                $fc = new Itemtofcats();
                $fc->iid = $this->id;
                $fc->fcid = $fcid;
                $fc->save();
            }
        }
    }
    
    public function saveScats()
    {
        Itemtoscats::deleteAll(['iid' => $this->id]);
        if (is_array($this->scats_ids)) {
            foreach($this->scats_ids as $scid) {
                $fc = new Itemtoscats();
                $fc->iid = $this->id;
                $fc->scid = $scid;
                $fc->save();
            }
        }
    }


}
