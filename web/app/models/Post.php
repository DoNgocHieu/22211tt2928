<?php

class Post extends Database
{
    public static function getPostByCategory($categoryId, $posts)
    {
        $sql = "";
        $params = "i";

        if (count($posts) > 0) {
            $questionMarks = str_repeat("?,", count($posts) - 1) . "?";
            $params .= str_repeat("i", count($posts));
            $sql = parent::$connection->prepare("SELECT DISTINCT id, title, content, likes, views, photo,created_at FROM posts INNER JOIN category_post ON posts.id = category_post.post_id WHERE posts.id NOT IN ($questionMarks) AND category_post.category_id = ? ORDER BY RAND() LIMIT 4");
            $posts[] = $categoryId;
            $sql->bind_param($params, ...$posts);
        } else {
            $sql = parent::$connection->prepare("SELECT DISTINCT id, title, content, likes, views, photo,created_at FROM posts INNER JOIN category_post ON posts.id = category_post.post_id WHERE category_post.category_id = ? ORDER BY RAND() LIMIT 4");
            $sql->bind_param("i", $categoryId);
        }

        return parent::select($sql);
    }

    public static function findPostByCategory($categoryIds, $page, $perPage)
    {
        $sql = "";
        $page = ($page - 1) * $perPage;

        // find
        if (count($categoryIds) > 0) {
            $quesion_cate = str_repeat("?,", count($categoryIds) - 1) . "?";
            $params = str_repeat("i", count($categoryIds)) . "ii";

            $categoryIds[] = $page;
            $categoryIds[] = $perPage;

            $sql = parent::$connection->prepare("select distinct id, title, content, likes, views, photo, created_at from posts inner join category_post on posts.id = category_post.post_id where category_post.category_id in ($quesion_cate) order by created_at desc limit ?,?");
            $sql->bind_param($params, ...$categoryIds);
        } else {
            // random post
            $sql = parent::$connection->prepare("select distinct id, title, content, likes, views, photo, created_at from posts inner join category_post on posts.id = category_post.post_id order by rand() limit?,?");
            $sql->bind_param("ii", $page, $perPage);

        }

        return parent::select($sql);
    }

    public static function total($categoryIds)
    {
        $sql = "";

        // find
        if (count($categoryIds) > 0) {
            $quesion_cate = str_repeat("?,", count($categoryIds) - 1) . "?";
            $params = str_repeat("i", count($categoryIds));

            $sql = parent::$connection->prepare("select count(distinct posts.id) as total from posts inner join category_post on posts.id = category_post.post_id where category_post.category_id in ($quesion_cate) order by created_at desc");
            $sql->bind_param($params, ...$categoryIds);
        } else {
            // random post
            $sql = parent::$connection->prepare("select count(distinct posts.id) as total from posts inner join category_post on posts.id = category_post.post_id order by created_at desc");
        }

        return parent::select($sql)[0];
    }


    public static function like($postId)
    {
        $sql = parent::$connection->prepare("update posts set likes = likes + 1 where posts.id = ?");
        $sql->bind_param("i", $postId);
        $sql->execute();


        $sql = parent::$connection->prepare("select likes from posts where posts.id = ?");
        $sql->bind_param("i", $postId);

        return parent::select($sql)[0];
    }

    public static function view($postId)
    {
        $sql = parent::$connection->prepare("update posts set views = views + (rand() * 10) where posts.id = ?");
        $sql->bind_param("i", $postId);
        $sql->execute();


        $sql = parent::$connection->prepare("select views from posts where posts.id = ?");
        $sql->bind_param("i", $postId);

        return parent::select($sql)[0];
    }

    public static function get($postId)
    {
        $sql = parent::$connection->prepare("select * from posts where posts.id = ?");
        $sql->bind_param("i", $postId);
        return parent::select($sql)[0];
    }

}