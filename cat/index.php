<?
include $_SERVER['DOCUMENT_ROOT'].'/assets/Goods.php';
use assets\Goods;
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>

        <div class="roulone">
            <div class="center-cat">
                <?
                $category = new Goods();
                    $result = $category->getItems( 'SELECT * FROM `Category`');
                    while ($row = mysqli_fetch_array($result)):?>
                        <a href="<?=$row['ID']=='1'?'/goods/?cat='.$row['Category']:'/goods/?cat='.$row['Category']?>"><span class="cat"><?="Категория: " . $row['Category']?></span></a>
                    <? endwhile; ?>
            </div>

        </div>
    </div>
</div>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>
