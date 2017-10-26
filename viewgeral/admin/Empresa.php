  <div class="x_title">
    <h2>A empresa</h2>
    <div class="clearfix"></div>
  </div>
  <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <?php
                   for($i = 0; $i < count($idiomas); $i++){
                      echo '<li role="presentation" class="' . ($i==0? 'active':'' )  . '"><a href="#tab_content' . $idiomas[$i]['IdiomaId']  . '" role="tab" id="_tab_content' . $idiomas[$i]['IdiomaId']  . '" data-toggle="tab" aria-expanded="'. ($i==0? 'true':'false' ) .'">' . $idiomas[$i]['Label']  . '</a></li>';
                   }
                ?>
            </ul>
            <div id="myTabContent" class="tab-content">
                <?php
                    for($i = 0; $i < count($idiomas); $i++){
                       echo '<div role="tabpanel" class="tab-pane fade' . ($i==0? ' active in':'' ) . '" id="tab_content' . $idiomas[$i]['IdiomaId'] . '" aria-labelledby="' . ($i==0? 'home-tab':'profile-tab' ) . '">' . $idiomas[$i]['Label'] . '</div>';
                    }
                ?>
            </div>
        </div>
  </div>