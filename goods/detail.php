<?
include $_SERVER['DOCUMENT_ROOT'].'/assets/Goods.php';
use assets\Goods;
?>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/header.php';?>

        <? if (!empty($_GET['id'])):?>
            <? $goods = new Goods();
            $id = $_GET['id'];
            $result = $goods->getItems("SELECT * FROM `Goods` as Go LEFT JOIN `Category` as Cat ON Go.Category=Cat.ID AND Go.ID=$id LIMIT 1");
            while ($row = mysqli_fetch_array($result)) :?>
        <div class="center"><h2>Карточка товара <?=$row['Name']?></h2></div>
        <div class="roulone">
            <? $arrImg = explode(',',$row['Picture']);?>
            <? if (count($arrImg)>1): ?>
                <? foreach($arrImg as $img): ?>
                    <img src="<?=$img?>" alt="<?=$row['Name']?>" id="img"></img>
                <? endforeach;?>
            <? else:?>
                    <img src="<?=$row['Picture']?>" alt="<?=$row['Name']?>" id="img"></img>
            <? endif; ?>
                <span>Наименование товара: <p id="name"><?= $row['Name'] ?></p></span>
                <span>Категория: <p id="cat"><?= $row['Category']?></p></span>
                <span >Цена: <p id="price"><?= $row['Price'] ?></p></span>
                <span>Остаток товара: <p id="amount"><?= $row['Amount'] ?></p></span>
                <?if ($row['Amount']>0):?>
                <button class="buy-btn" data-id="<?=$_GET['id']?>">Купить</button>
                <? endif; ?>
        </div>
            <div class="thanks-modal hidden"><h2>Благодарим за покупку</h2></div>
        <? endwhile; ?>
        <? endif; ?>
    </div>
</div>


<script>
    const buyBtn = $('.buy-btn');
    let id = $('.buy-btn').attr('data-id')
    let name = $('#name').html();
    let price = $('#price').html();
    let img = $('#img').attr('src');
    let quantity = 1;
    let amount = $('#amount').html()-1;
    buyBtn.on('click', function() {

        $.get( "/basket/index.php", {'ID':id, 'Name':name,'Price':price,'Quantity':quantity, 'Img': img  })
            .done(function( data ) {
                $('#amount').html(amount)
                $('.thanks-modal').removeClass('hidden')
                $('.thanks-modal').addClass('visible')
                setTimeout(function () {
                    $('.thanks-modal').removeClass('visible')
                    $('.thanks-modal').addClass('hidden')
                    window.location.replace('/basket/')
                },3000)
            });

    })
</script>
<? include_once $_SERVER['DOCUMENT_ROOT'].'/footer.php';?>