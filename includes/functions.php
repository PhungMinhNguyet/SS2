<?php
    define('BASE_URL', 'http://localhost/ss2_myblog/');
    function confirm_query($result, $query)
    {
        global $dbc;
        if (!$result) {
            die("Query {$query} \n<br/> MySQL Error: " . mysqli_error($dbc));
        }
    }
    function redirect_to($page = 'index.php')
    {
        $url = BASE_URL . $page;
        header("Location: $url");
        exit();
    }
    // Cat chu~ de hien thi thanh doan van ngan.
    function the_excerpt($text, $string = 400)
    {
        //ent_compat utf-8 
        $sanitized = htmlentities($text, ENT_COMPAT, 'UTF-8');
        if (strlen($sanitized) > $string) {
            $cutString = substr($sanitized, 0, $string);
            $words = substr($sanitized, 0, strrpos($cutString, ' '));
            return $words;
        } else {
            return $sanitized;
        }
    }
    function validate_id($id)
    {
        if (isset($id) && filter_var($id, FILTER_VALIDATE_INT, array('min_range' => 1))) {
            $val_id = $id;
            return $val_id;
        } else {
            return NULL;
        }
    }
    // Truy van CSDL de lay post va thong tin nguoi dung.
    function get_page_by_id($id)
    {
        global $dbc;
        $q = " SELECT p.page_name, p.page_id, p.content, p.image, ";
        $q .= " DATE_FORMAT(p.post_on, '%b %d, %y') AS date, ";
        $q .= " CONCAT_WS(' ', u.first_name, u.last_name) AS name, u.user_id ";
        $q .= " FROM pages AS p ";
        $q .= " INNER JOIN users AS u ";
        $q .= " USING (user_id) ";
        $q .= " WHERE p.page_id={$id}";
        $q .= " ORDER BY date ASC LIMIT 1";
        $result = mysqli_query($dbc, $q);
        confirm_query($result, $q);
        return $result;
    }

    function fetch_user($user_id)
    {
        global $dbc;
        $q = "SELECT * FROM users WHERE user_id = {$user_id}";
        $r = mysqli_query($dbc, $q);
        confirm_query($r, $q);

        if (mysqli_num_rows($r) > 0) {
            // Neu co ket qua tra ve
            return $result_set = mysqli_fetch_array($r, MYSQLI_ASSOC);
        } else {
            // Neu ko co ket qua tra ve
            return FALSE;
        }
    }
