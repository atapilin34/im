<?
include $_SERVER['DOCUMENT_ROOT'].'/assets/Goods.php';
use assets\Goods;
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>

        <? if (!empty($_GET['cat'])):?>
        <div class="center"><h2>Категория <?=$_GET['cat']==='Electronic'?'Электроника':'Одежда'?></h2></div>
        <? endif; ?>
        <div class="roulone">
                <?
                if (!empty($_GET['cat'])) {
                    $catName = $_GET['cat'];
                    $goods = new Goods();
                    $catId = $goods->getCategory($catName);
                    $result = $goods->getItems("SELECT `Goods`.ID,Picture,Name,Price FROM `Goods` LEFT JOIN `Category` ON `Goods`.Category = `Category`.ID WHERE`Category`.`ID`=$catId");

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
                    <? endwhile;
                } else {?>
            <div class="center">
                <h3>Необходим выбрать категорию</h3>
            </div>
                <?
                }
                ?>
        </div>
    </div>
</div>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>