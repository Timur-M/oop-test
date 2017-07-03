<?php

class Factory_rubrics {
    public function get_rubrics_of_news($news_id){
        $sql = "SELECT rubric_id FROM rel_news_rubrics WHERE news_id=?";
        $query = db::select_all($sql, array($news_id));
        foreach ($query as $rubric){
            $result[] = $this->get_rubric_by_id($rubric['rubric_id']);
        }
        return $result;
    }

    public function get_rubric_by_id($rubric_id){
        $sql = "SELECT * FROM rubrics WHERE id=?";
        $query = db::select_one($sql, array($rubric_id));
        return new Rubric($query);
    }
}