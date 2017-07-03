<?php

class Factory_users {
    public function get_user_of_news($news_id){
        $sql = "SELECT user_id FROM rel_news_users WHERE news_id=?";
        $query = db::select_one($sql, array($news_id));
        return $this->get_user_by_id($query['user_id']);
    }

    public function get_user_by_id($user_id){
        $sql = "SELECT * FROM users WHERE id=?";
        $query = db::select_one($sql, array($user_id));
        return new User($query);
    }
}