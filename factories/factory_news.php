<?php

class Factory_news {

    public function get_all_news(){
        $sql = "SELECT * FROM news";
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
        $news =  new News($query);

        // add User
        $user = new Factory_users();
        $news->add_element('user',$user->get_user_of_news($news_id));

        // add Rubrics
        $rubrics = new Factory_rubrics();
        $news->add_element('rubrics',$rubrics->get_rubrics_of_news($news_id));

        return $news;
    }
}