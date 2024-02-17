<header>

<nav>
    <div class="app-nav">
        <div class="secondary-menu">
            <div class="container">
                <?php
                session_start();
                $db = new MyDB();
                $db->connect();

                $query = "SELECT * FROM main_menu";
                $db->run($query);

                $table = array();
                while ($row = $db->fetch()) {
                    $table[] = $row;
                }

                $associativeArray = array();
                foreach ($table as $row) {
                    $associativeArray[$row['id']] = $row;
                }

                function buildList($items, $parentId = 0) {
                    global $Lang;
                    $html = "<ul>";
                    foreach ($items as $item) {
                        if(preg_match('/secondary/', $item['custom_class'])) {
                            if ($item['parent_id'] == $parentId) {
                                $html .= "<li><a href='{$item['link']}'>{$Lang['Header']['secondary'][$item['id']]}</a>";
                                $html .= buildList($items, $item['id']);
                                $html .= "</li>";
                            }
                        }
                    }
                    $html .= "</ul>";
                    return $html;
                }

                echo buildList($associativeArray);
                ?>
            </div>
        </div>
    <div class="main-menu">
        <div class="container">
            <div class="logo">
                <a href="/?option=home">
                    GrandeLinci LV
                </a>
            </div>
            <?php
            session_start();
            $db = new MyDB();
            $db->connect();

            $query = "SELECT * FROM main_menu";
            $db->run($query);

            $table = array();
            while ($row = $db->fetch()) {
                $table[] = $row;
            }

            $associativeArray = array();
            foreach ($table as $row) {
                $associativeArray[$row['id']] = $row;
            }

            function buildList1($items, $parentId = 0) {
                global $Lang;
                $html = "<ul>";
                foreach ($items as $item) {
                    if(!preg_match('/secondary/', $item['custom_class'])) {
                        if ($item['parent_id'] == $parentId) {
                            $html .= "<li><a href='/?option={$item['link']}'>{$Lang['Header']['main_menu'][$item['id']]}</a>";
                            $html .= buildList1($items, $item['id']);
                            $html .= "</li>";
                        }
                    }
                }
                $html .= "</ul>";
                return $html;
            }

            echo buildList1($associativeArray);
            $db->stop();
            ?>
        </div>
    </div>
    </div>
</nav>
</header>
