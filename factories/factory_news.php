<?php

class Factory_news {

    private $registry;

    public function __construct(ArrayObject $registry)
    {
        $this->registry = $registry;
    }

    public function get_all_news(){
        $sql = "SELECT * FROM news ORDER BY date_create DESC LIMIT 5";
        $query = db::select_all($sql);
        foreach ($query as $news){
            $result[] = $this->get_one_news($news['id']);
        }
        return $result;
    }

    public function get_all_news_in_rubric($rubric_id){
        $sql = "SELECT news_id FROM rel_news_rubrics WHERE rubric_id=?";
        $query = db::select_all($sql,array($rubric_id));
        foreach ($query as $news){
            $result[] = $this->get_one_news($news['news_id']);
        }
        return $result;
    }

    public function get_one_news($news_id){
        $sql = "SELECT * FROM news WHERE id=?";
        $query = db::select_one($sql, array($news_id));

        $result = array(
            'news' => new News($query),
            'user' => $this->registry['factory_users']->get_user_of_news($news_id),
            'rubrics' => $this->registry['factory_rubrics']->get_rubrics_of_news($news_id),
            'comments' => $this->registry['factory_comments']->get_comments_of_news($news_id)
        );

        return $result;
    }
}