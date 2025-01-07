<?
include $_SERVER['DOCUMENT_ROOT'] . '/assets/Goods.php';
use assets\Goods;
?>
<?
session_start();
$arrItems=[];
if ($_POST) {
//    $_SESSION['$arrItems'] = [];
    $arrItems = array('id'=>$_POST['ID'],'name'=>$_POST['Name'],'price'=>$_POST['Price'],'quantity'=>intval($_POST['Quantity']), 'img'=>$_POST['Img']);
    $counter = 0;
    if (array_key_exists($_POST['ID'],  $_SESSION['$arrItems'])) {
        $quant = $_SESSION['$arrItems'][$_POST['ID']]['quantity'];
        $counter++;
        $_SESSION['$arrItems'][$_POST['ID']]['quantity'] = $quant+$counter;
    } else {
        $_SESSION['$arrItems'][$_POST['ID']] = $arrItems;
    }
}
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>

        <div class="roulone">
            <?
            if (empty($_SESSION['$arrItems'])) die;
            $arrGoods = $_SESSION['$arrItems'];
            foreach ($arrGoods as $goods):
            $goodsId = $goods['id'];
            $goodsName = $goods['name'];
            $goodsPrice = $goods['price'];
            $goodsQuantity = $goods['quantity'];
            $goodsImg = $goods['img'];

            $basketItem = new Goods();
            $result = $basketItem->getItems("SELECT * FROM Goods WHERE ID=$goodsId");
            while ($row = mysqli_fetch_array($result)) :
                $count = $row['Amount'];
                $count--;
                $basketItem->setItems("UPDATE `Goods` SET `Amount` = $count  WHERE `Goods`.`ID` = $goodsId");
                ?>
            <div class="item">
                <span>
                    <img src="<?=$goodsImg?>">
                </span>
                <span>
                  <p>
                      <?=$goodsName?>
                  </p>
                </span>
                <span>
                  <p>
                      <?=$goodsQuantity?> шт.
                  </p>
                  </span>
                <span>
                  <p>
                      <?=$goodsPrice?> руб.
                  </p>
              </span>
            </div>
            <? endwhile; ?>
            <? endforeach; ?>
        </div>
    </div>
</div>

<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>