<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $frequency
 * @property PostTag[] $posts
 */
class Tag extends \yii\db\ActiveRecord
{

    /**
     * Минимальный размер шрифта
     */
    const MIN_FONT_SIZE = 14;

    /**
     * Максимальный размер шрифта
     */
    const MAX_FONT_SIZE = 30;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['frequency'], 'integer'],
            [['frequency'], 'default', 'value' => 0],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
        ];
    }

    /**
     * Возвращает теги вместе с их весом
     * @param integer $limit число возвращаемых тегов
     * @return array вес с индексом равным имени тега
     */
    public static function findTagWeights($limit = 20)
    {
        $tags = array();

        $models = PostTag::findBySql("SELECT tags.name, COUNT(post_tags.tag_id) AS posts_count".
            " FROM post_tags LEFT JOIN tags ON post_tags.tag_id = tags.id".
            " GROUP BY tags.id ORDER BY posts_count LIMIT 20")->asArray()->all();

        $sizeRange = self::MAX_FONT_SIZE - self::MIN_FONT_SIZE;

        $maxCount = end($models);
        $minCount = $models[0];
        $countRange = $maxCount['posts_count'] - $minCount['posts_count'];

        foreach ($models as $model) {
            if ($minCount['posts_count'] == $maxCount['posts_count']) {
                $tags[$model['name']] = round((self::MAX_FONT_SIZE - self::MIN_FONT_SIZE) / 2 + self::MIN_FONT_SIZE);
            }
            else {
                $tags[$model['name']] = round((($model['posts_count'] - $minCount['posts_count'])/($maxCount['posts_count'] - $minCount['posts_count'])) * (self::MAX_FONT_SIZE - self::MIN_FONT_SIZE) + self::MIN_FONT_SIZE);
            }
        }

//            $tags[$model['name']] = round(self::MIN_FONT_SIZE + (log($model['post_count'] + 1) - $minCount['post_count']) * ($countRange != 0 ? $sizeRange / $countRange : 0));

        return $tags;
    }

    public function getPosts()
    {
        return $this->hasMany(PostTag::class, ['tag_id' => 'id']);
    }

}
