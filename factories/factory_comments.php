<?php

class Factory_comments {
    public function get_comments_of_news($news_id){
        $sql = "SELECT comment_id FROM rel_news_comments WHERE news_id=?";
        $query = db::select_all($sql, array($news_id));
        foreach ($query as $comment){
            $result[] = $this->get_comment_by_id($comment['comment_id']);
        }
        return $result;
    }

    public function get_comment_by_id($comment_id){
        $sql = "SELECT * FROM comments WHERE id=?";
        $query = db::select_one($sql, array($comment_id));
        return new Comment($query);
    }
}