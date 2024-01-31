<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModels extends Model
{
    protected $table = 'article_table';

    protected $primaryKey = 'id_article';

    protected $allowedFields = ['id_type_travel', 'topic', 'pic_topic', 'detail', 'view_count', 'data_create', 'data_edit', 'status', 'google_link', 'location', 'location_price', 'face_book_name', 'facebook_link', 'time_open'];

    public function updateViewCount($id_article)
    {
        $articleData = $this->where('id_article', $id_article)->first();

        if ($articleData) {
            $this->update($id_article, ['view_count' => $articleData['view_count'] + 1]);
        }
        $articleData = $this->where('id_article', $id_article)->first();

        return $articleData;
    }
}
