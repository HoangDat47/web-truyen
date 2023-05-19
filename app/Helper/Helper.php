<?php

use App\Models\TheoDoi;

    function getTimeAgo($carbonObject) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return str_ireplace(
            [' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks'
            , ' week', 'ago', 'from now', 'months', ' month', 'years', ' year'],
            [' giây', ' giây', ' phút', ' phút', ' giờ', ' giờ', ' ngày', ' ngày'
            , ' tuần', ' tuần', ' trước', ' trước', ' tháng', ' tháng', ' năm', ' năm'], 
            Carbon\Carbon::parse($carbonObject)->diffForHumans()
        );
    }

    function count_theo_doi($id) {
        $count = Theodoi::where('truyen_id', $id)->count();
        return $count;
    }
?>