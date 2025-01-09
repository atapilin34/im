<?
include $_SERVER['DOCUMENT_ROOT'] . '/assets/Goods.php';
use assets\Goods;
?>
<?
session_start();
$arrItems=[];
if ($_REQUEST) {
    $arrItems = array('id'=>$_REQUEST['ID'],'name'=>$_REQUEST['Name'],'price'=>$_REQUEST['Price'],'quantity'=>intval($_REQUEST['Quantity']), 'img'=>$_REQUEST['Img']);
    $counter = 0;
    if (!$_SESSION['$arrItems']) {
        $_SESSION['$arrItems'] = [];
    }
    if (array_key_exists($_REQUEST['ID'],  $_SESSION['$arrItems'])) {
        $quant = $_SESSION['$arrItems'][$_REQUEST['ID']]['quantity'];
        $counter++;
        $_SESSION['$arrItems'][$_REQUEST['ID']]['quantity'] = $quant+$counter;
    } else {
        $_SESSION['$arrItems'][$_REQUEST['ID']] = $arrItems;
    }
}
else if ($_REQUEST["CLEAR"]) { $_SESSION['$arrItems'] = []; }
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>

        <div class="roulone">
            <?
            if (empty($_SESSION['$arrItems'])) { echo 'В корзине пока пусто, давайте исправим это'; die;}
            $arrGoods = $_SESSION['$arrItems'];
            foreach ($arrGoods as $goods):
            $goodsId = $goods['id'];
            $goodsName = $goods['name'];
            $goodsPrice = $goods['price'];
            $goodsQuantity = $goods['quantity'];
            $goodsImg = $goods['img'];

            $basketItem = new Goods();
            $result = $basketItem->getItems("SELECT * FROM Goods WHERE ID={$goodsId}");
            while ($row = mysqli_fetch_array($result)) :
                $count = $row['Amount'];
                $count--;
                $basketItem->setItems("UPDATE `Goods` SET `Amount` = $count  WHERE `Goods`.`ID` = {$goodsId}");
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
            <button class="clear-basket">Очистить корзину</button>
        </div>
    </div>
</div>
    <script>
        $('.clear-basket').on('click', function (){
            $.post( "/basket/", {"CLEAR":"YES"})
                .done(function( data ) {
                    $('.roulone').html('')
                    $('.roulone').html('В корзине пока пусто, давайте исправим это')
                    setTimeout(function () {
                        window.location.replace('/')
                    },2000)
                })
        })
    </script>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>