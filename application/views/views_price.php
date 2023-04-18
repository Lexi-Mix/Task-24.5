<div class="container">
  <div class="row row-cols-2 row-cols-lg-5 g-2">
    <?php
    foreach ($content_view as $value):
    ?>
    <div class="col">
      <div class="p-3 border bg-light text-center">
        <h5 class="card-title "><?= $value['id']?></h5>
        <p class="card-text"><?= $value['content']?></p>
    </div>
    </div>
    <?php endforeach;?>
  </div>
</div>

    
<!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            
            <p class="card-text"><?= $value['content']?></p>
        </div>
    </div> -->