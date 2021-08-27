<?php
    if(isset($_SESSION['email'])) {
        function getCurrentUrl() {
            $link = "";
            $link .= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
            $link .= "://";
            $link .= $_SERVER['HTTP_HOST'];
            $link .= $_SERVER['PHP_SELF'];
            $link .= basename($_SERVER['REQUEST_URI']);
            return $link;
        }

        function getName() {
            $url = getCurrentUrl();
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            return $params['page'];
        }

        function getForPageName() {
            $url = getCurrentUrl();
            $url_components = parse_url($url);
            parse_str($url_components['query'], $params);
            if($params['page'] == 'time_table') {
                return $params['forPage'];
            }
            return null;
        }

        function removeSpecialCharacters() {
            $data = ucfirst(getName());
            $new_data = str_replace('_',' ',$data);
            return ucwords($new_data);
        }
    }
?>
