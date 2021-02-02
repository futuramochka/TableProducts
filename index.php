<!DOCTYPE html>
<html>
    <head>
        <title>DemoTable</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <?php
            require_once('config.php');
            //Select
            //Get Product options
            $limit = 5;
            $OptionsProducts = $connect->getProducts($limit);
            ?>
            <section class="table">
                <table>
                    <h1>Table Products</h1>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>PRODUCT_ID</th>
                            <th>PRODUCT_NAME</th>
                            <th>PRODUCT_PRICE</th>
                            <th>PRODUCT_ARTICLE</th>
                            <th>PRODUCT_QUANTITY</th>
                            <th>DATE_CREATE</th>
                            <th>DELETE ROW</th>
                        </tr>
                    </thead>
                    <tbody><?php
                        foreach($OptionsProducts as $value){?>
                            <tr><?php
                            foreach($value as $key=>$val){
                                if($key === 'product_quantity'){
                                    echo "<td class='quantity'>";
                                    ?>
                                        <a class="plus" title='Добавить'>&plus;</a>
                                        <?php echo "<div class='forvalue'>" .$val. "</div>"?>
                                        <a class="minus" title='Убрать'>&minus;</a>
                                    <?php
                                    echo "</td>";
                                }else{
                                    echo "<td>";
                                    echo $val;
                                    echo "</td>";
                                }
                            }?>
                            <?php echo "<td>"?><button type="button">Скрыть</button><?php echo "</td>"?>
                            </tr><?php
                        }?>
                    </tbody>
                </table>
            </section>
            <?php
            //Delete
            $connect->CloseConnectDB();
            unset($connect);
        ?>
        <script src="script.js"></script>
    </body>
</html>