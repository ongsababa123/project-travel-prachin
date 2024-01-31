<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModels extends Model
{
    protected $table = 'news_table';

    protected $primaryKey = 'id_news';

    protected $allowedFields = ['topic_news' , 'pic_topic', 'detail', 'view_count', 'data_create', 'data_edit', 'status'];

    public function updateViewCount($id_news)
    {
        $articleData = $this->where('id_news', $id_news)->first();

        if ($articleData) {
            $this->update($id_news, ['view_count' => $articleData['view_count'] + 1]);
        }
        $articleData = $this->where('id_news', $id_news)->first();

        return $articleData;
    }
}
