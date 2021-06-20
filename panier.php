
<?php
include("cnx.php");
include('elements/head.html');
session_start();
?>
<?php

$total=0;
if(isset($_SESSION['all_id'])){
    $nbr = count($_SESSION['all_id']);
}
else{
    $nbr = 0;
}

if(isset($_SESSION['id1'])){
    $loginLink=1;
 }
 else{
    $loginLink=0;
 }

?>


<body style="background-image: linear-gradient(rgba(255,255,255,0.9),rgba(255,255,255,0.9)), url(assets/img/banner4.jpg); background-repeat: no-repeat;
  background-attachment: fixed; background-size: cover;" >
 <div align="center" class="uk-margin">
            <a href="index.php"><img src="assets/img/blvckn.png" width="200px" alt=""></a>
        </div>
 <div class="content" align="center">
 <br>
 <?php if($loginLink==1){ ?>
 <span> voici votre panier Mr <?=$_SESSION['nom']?> </span><br>
 <?php } ?>
 <span class="uk-margin-small-right" id="pannel" uk-icon="icon: cart; ratio: 2"><?=$nbr?></span>
    <h1 style="font-size:50px;">PANIER</h1>
    <div class="uk-width-2-3  uk-child-width-2-3 uk-text-center uk-margin" uk-grid>
      <div id="table">
          <div class="uk-card uk-card-default uk-card-body uk-overflow-auto">
          <br>
            <input class='uk-button uk-button-secondary uk-button-large uk-margin'type='submit' id="remove" value='vider panier'>
            <br>
          <table class="uk-table uk-table-striped uk-table-small uk-table-divider">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<$nbr;$i++) {
                    $req1="SELECT * FROM products where sku='".$_SESSION['all_id'][$i]."'";
                    $res1=$dbcnx->query($req1);
                    if($res1){
                        while($arr1=$res1->fetch_array())
                        {
                    ?>
                <tr class="uk-text-left" >
                    <td>
                      <p style="float:left;"><?=$arr1['name']?></p>
                    </td>
                    <td><?=$arr1['price']?></td>
                    <?php $total+=$arr1['price']; ?>
                    <td>
                        <div class="uk-margin">
                            <input class="qte uk-input uk-form-width-small"  type="number" prod-price="<?=$arr1['price']?>" placeholder="QTE" value="1" onclick="ret()">
                        </div>
                    </td>
                    <td id="total">200.00 DH</td>
                    <td>
                    <a class="remove_once" uk-icon="trash" user-id="<?=$arr1['sku']?>"> </a><span>delete</span>

                    </td>
                </tr>
                <?php 
                }
                }
                }
                ?>
            </tbody>
        </table>
          </div>
      </div>
    </div>
    <div  class="uk-width-1-3  uk-child-width-2-3 uk-text-center uk-margin ">
      <table class="uk-table uk-table-striped uk-text-left">
          <thead>
              <tr >
                  <th>  TOTAL :</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                    <td>Total</td>
                    <td id="total"><?=$total?></td>
              </tr>
          </tbody>
      </table>
      <a class="uk-button uk-button-secondary" href="buy.php">buy</a>
    </div> 
  </div>
  


  <script>

$(document).on("click","#remove",function(){
        
        var action ="delete";
        $('#pannel').load('panier.php #pannel', {
        }, function() {});
        
        $('#table').load('panier.php #table', {
        }, function() {});
        $total=0;
        $('#total').load('panier.php #total', {
        }, function() {});
        

        $.ajax({
        url: "add.php",
        method:"POST",
        data:{action:action},
        dataType:"JSON",
        success:function(data){
            console.log(data);
            load_data();
        }
    });
});


$(document).on("click",".remove_once", function(event){
    event.preventDefault();
    console.log("remove_once");
    const idP = event.target.getAttribute("user-id");
    console.log(idP);
    var id=idP;
    var action='delete_once';

    $('#pannel').load('panier.php #pannel', {
  }, function() {});

    $.ajax({
        url:"add.php",
        method:"POST",
        dataType:"JSON",
        data: {id:id,action:action},
        success:function(data){
            console.log(data);
        }
    }
    );
   
});

// Fonction pour changer le contenu de t2
function ret(){
    const el = document.getElementsByClassName("qte").value;
    console.log(el);
}

$(document).on("click",".qte", function(event){
    event.preventDefault();
    const price = event.target.getAttribute("prod-price");
    console.log(price);
   
});


</script>

 <?php
include 'elements/footer.html';
?>
