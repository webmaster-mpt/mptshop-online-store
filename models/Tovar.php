<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tovar".
 *
 * @property int $id
 * @property string $photo_tovar
 * @property string $name
 * @property string $brand
 * @property string $size
 * @property string $color
 * @property string $proizvoditel
 * @property string $country_pro
 * @property string $price
 */
class Tovar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tovar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo_tovar', 'name', 'brand', 'size', 'color', 'proizvoditel', 'country_pro', 'price','status'], 'required'],
            [['photo_tovar', 'size', 'color'], 'string'],
            [['name', 'brand', 'proizvoditel'], 'string', 'max' => 50],
            [['country_pro'], 'string', 'max' => 30],
            [['price'], 'integer'],
            [['status'], 'string', 'max' => 8],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo_tovar' => 'Фото',
            'name' => 'Наименование',
            'brand' => 'Брэнд',
            'size' => 'Размер',
            'color' => 'Цвет',
            'proizvoditel' => 'Производитель',
            'country_pro' => 'Страна производства',
            'price' => 'Цена',
        ];
    }
}
