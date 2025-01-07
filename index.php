<?
include $_SERVER['DOCUMENT_ROOT'].'/assets/Goods.php';
use assets\Goods;
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>
        <div class="center"><h2>Топ 10 самых дешёвых товаров</h2></div>
        <div class="roulone">
            <?
            $cheapGoods = new Goods();
            $result = $cheapGoods->getItems('SELECT * FROM `Goods` ORDER BY Price ASC LIMIT 10');

            while ($row = mysqli_fetch_array($result)):
            ?>
            <a href="<?='/goods/detail.php?id='.$row['ID']?>">
                <div class="item">
                    <? $arrImg = explode(',',$row['Picture']);?>
                    <? if (count($arrImg) > 1):?>
                        <img src="<?=$arrImg[0] ?>" alt="<?= $row['Name'] ?>"></img>
                    <? else: ?>
                        <img src="<?=$row['Picture']?>" alt="<?= $row['Name'] ?>"></img>
                    <? endif; ?>
                    <span><?= $row['Name'] ?></span>
                    <p><?= $row['Price'] ?></p>
                </div>
            </a>
            <?
            endwhile;
            ?>
        </div>
    </div>
</div>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>
