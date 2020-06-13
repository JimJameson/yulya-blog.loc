<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{

    public function attributes()
    {
        // делаем поле зависимости доступным для поиска
        return array_merge(parent::attributes(), ['post.title', 'users.username']);
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'post_id', 'created_at', 'parent_id', 'updated_at', 'status'], 'integer'],
            [['message', 'post.title', 'users.username'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $post_id = null, $user_id = null)
    {
        $query = Comment::find()->joinWith('post')->joinWith('user');

        if (!empty($post_id)) {
            $query->where(['post.id' => $post_id]);
        }

        if (!empty($user_id)) {
            $query->where(['users.id' => $user_id]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ],
                'route' => 'admin/comment/index',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $dataProvider->sort->attributes['post.title'] = [
            'asc' => ['post.title' => SORT_ASC],
            'desc' => ['post.title' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['users.username'] = [
            'asc' => ['users.username' => SORT_ASC],
            'desc' => ['users.username' => SORT_DESC],
        ];


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'post_id' => $this->post_id,
            'created_at' => $this->created_at,
            'parent_id' => $this->parent_id,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);
        $query->andFilterWhere(['LIKE', 'post.title', $this->getAttribute('post.title')]);
        $query->andFilterWhere(['LIKE', 'user.username', $this->getAttribute('user.username')]);

        return $dataProvider;
    }
}
