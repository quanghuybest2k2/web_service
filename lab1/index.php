<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS Feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        $urls = [
            "https://vnexpress.net/rss/tin-moi-nhat.rss",
            "https://vnexpress.net/rss/suc-khoe.rss",
            "https://vnexpress.net/rss/the-gioi.rss",
            "https://vnexpress.net/rss/gia-dinh.rss"
        ];

        foreach ($urls as $url) {
            $rss = simplexml_load_file($url);

            if ($rss === false) {
                echo "Không thể tải RSS feed từ URL: " . $url . "<br>";
            } else {
                echo "<h2>Tin tức từ " . $rss->channel->title . "</h2>";
                $count = 0;
                echo '<div class="row">';
                foreach ($rss->channel->item as $item) {
                    if ($count < 5) {
                        echo '<div class="col-md-6">';
                        echo "<h3><a href='" . $item->link . "'>" . $item->title . "</a></h3>";
                        echo "<p>" . $item->description . "</p>";
                        echo "<p>Ngày đăng: " . date("Y-m-d H:i:s", strtotime($item->pubDate)) . "</p>";
                        echo '</div>';
                        $count++;
                    } else {
                        break;
                    }
                }
                echo '</div>';
            }
        }
        ?>
    </div>
</body>

</html>