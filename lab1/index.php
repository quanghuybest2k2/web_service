<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }

        .post {
            margin-bottom: 20px;
        }

        .card-img-top {
            width: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>

<body>

    <div class="container">
        <form method="post" action="">
            <div class="mb-3">
                <label for="feedurl" class="form-label">Nhập URL có chứa RSS</label>
                <input type="text" class="form-control" id="feedurl" name="feedurl" placeholder="Nhập URL">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Lấy tin</button>
        </form>

        <?php
        $url = 'https://vnexpress.net/rss/tin-moi-nhat.rss';
        if (isset($_POST['submit'])) {
            if ($_POST['feedurl'] != '') {
                $url = $_POST['feedurl'];
            }
        }
        $invalidurl = false;
        if (@simplexml_load_file($url)) {
            $feeds = simplexml_load_file($url);
        } else {
            $invalidurl = true;
            echo "<h2 class='mt-4'>Invalid RSS feed URL</h2>";
        }

        $i = 0;
        if (!empty($feeds)) {
            $site = $feeds->channel->title;
            echo "<h1 class='mt-4'>" . $site . "</h1>";

            foreach ($feeds->channel->item as $item) {
                $title = $item->title;
                $link = $item->link;
                $description = $item->description;
                $postdate = $item->pubDate;
                $pubDate = date('D, d M Y', strtotime($postdate));
                $image = '';
                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $description, $imageMatches);
                if (!empty($imageMatches['src'])) {
                    $image = $imageMatches['src'];
                }
                if ($i > 5) {
                    break;
                }
        ?>
                <div class="post">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                            <span class="card-subtitle mb-2 text-muted"><?php echo $pubDate; ?></span>
                            <p class="card-text"><?php echo implode(" ", array_slice(explode(' ', $description), 0, 20)); ?></p>
                        </div>
                    </div>
                </div>
        <?php
                $i++;
            }
        } else {
            if (!$invalidurl) {
                echo "<h2 class='mt-4'>No item found.</h2>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eBCPhF2tZqX46fZEtexl8rGGpllo5CCEVaHh1BA5ayjDIeD9AkdP4QK67tNo7iW4" crossorigin="anonymous"></script>
</body>

</html>