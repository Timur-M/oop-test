<?php

class Factory_news {

    private $registry;

    public function __construct(ArrayObject $registry)
    {
        $this->registry = $registry;
    }

    public function get_top5_news(){
        $sql = "SELECT * FROM news ORDER BY date_create DESC LIMIT 5";
        $query = db::select_all($sql);
        foreach ($query as $news){
            $result[] = array(
                'news' => new News($news),
                'user' => $this->registry['factory_users']->get_user_of_news($news['id']),
                'rubrics' => $this->registry['factory_rubrics']->get_rubrics_of_news($news['id']),
                'comments' => $this->registry['factory_comments']->get_comments_of_news($news['id'])
            );
        }
        return $result;
    }
}