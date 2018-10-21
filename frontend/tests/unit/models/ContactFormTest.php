<?php
namespace frontend\tests\unit\models;

use Yii;
use app\models\Category;

class ContactFormTest extends \Codeception\Test\Unit
{
    public function testAddCorrect()
    {
        $model = new Category();

        $model->attributes = [
            'name' => 'Tester',
            'cpu' => 'new-tester',
            'description' => 'very important letter subject',
            'image' => 'body of current message',
        ];
        $this->assertTrue($model->save());



        $this->assertTrue($model->name === 'Tester');
        $id = $model->id;

        $newmodel = Category::find()->where(['id' => $id])->one(); 
        $this->assertTrue($newmodel->name === 'Tester');

    }

    public function testBlankName()
    {
        $model = new Category();

        $model->attributes = [
            'name' => '',
            'cpu' => 'new-tester',
            'description' => 'very important letter subject',
            'image' => 'body of current message',
        ];
        $this->assertFalse($model->validate());
    }

    public function testBlankImage()
    {
        $model = new Category();

        $model->attributes = [
            'name' => 'name',
            'cpu' => 'new-tester',
            'description' => 'very important letter subject',
            'image' => '',
        ];
        $this->assertFalse($model->validate());
    }
    
    public function testBlankCpu()
    {
        $model = new Category();

        $model->attributes = [
            'name' => 'name',
            'cpu' => '',
            'description' => 'very important letter subject',
            'image' => 'some path to image',
        ];
        $this->assertFalse($model->validate());
    }
    
    public function testNotUniqueCpu()
    {
        $model = new Category();
        $model1 = new Category();

        $model->attributes = [
            'name' => 'name',
            'cpu' => '111',
            'description' => 'very important letter subject',
            'image' => 'some path to image',
        ];

        $model->save();
        
        $model1->attributes = [
            'name' => 'name2',
            'cpu' => '111',
            'description' => '2very important letter subject',
            'image' => '2some path to image',
        ];
        $this->assertFalse($model1->validate());
    }
}
