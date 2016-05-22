<div ng-app="mikiryApp" ng-controller="CherherVolCtrl">
  <div class="jumbotron text-center">
    <h1>MIKIRY</h1> 
    <p>A la rechercher de vols pour la CORSE?</p> 
    <form class="form-inline">
      <input type="text" class="form-control" size="25" placeholder="Sélectionner la ville d'origine"  name="ville_origine" ng-model="ville_origine" required>
      <input type="text" class="form-control" size="25" placeholder="Sélectionner la ville d'arriver"  name="ville_arriver" ng-model="ville_arriver">
      <button type="button" class="btn btn-primary" name="update_product" ng-click="search_vol()">Trouver des vols</button>
    </form>
  </div>

  <div id="search_result">
    <?php include("views/search.html"); ?>
  </div>

</div>

<!-- Container (annonces Section) -->
<div id="annonces" class="container-fluid text-center bg-grey">  
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"
          <br>
          <span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span>
        </h4>
      </div>

      <div class="item">
        <h4>"One word... WOW!!"
          <br>
          <span style="font-style:normal;">John Doe, Salesman, Rep Inc</span>
        </h4>
      </div>

      <div class="item">
        <h4>"Could I... BE any more happy with this company?"
          <br>
          <span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span>
        </h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
      </span>
      <span class="sr-only">Précedent</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">
      </span>
      <span class="sr-only">Suivant</span>
    </a>
  </div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contacter nous, une réponse sera envoyé dans les 24 heures.</p>
      <p>
        <span class="glyphicon glyphicon-map-marker"></span> ANTANANARIVO, MG
      </p>
      <p>
        <span class="glyphicon glyphicon-phone"></span> +261 34 27 789 62
      </p>
      <p>
        <span class="glyphicon glyphicon-envelope"></span>
        &nbsp;
        <a href="mailto:infoline@mikiry.mg">infoline@mikiry.mg</a>
      </p>     
    </div>

    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Votre nom" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Adresse e-mail" type="email" required>
        </div>
      </div>

      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5">
      </textarea>
      <br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-info pull-right" type="submit">Send</button>
        </div>
      </div>

    </div>
  </div>
</div>