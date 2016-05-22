    var listApp = angular.module('mikiryApp', []);    

    listApp.controller('CherherVolCtrl', function ($scope,$http) {
    $scope.pagedItems    =  [];
    $scope.currentPage   =  0;

    /** toggleMenu Function to show menu by toggle effect , by default the stage of the menu is false as we click on toggle button, we make it to true or show and reverse on anothe click event. **/

    $scope.menuState = false;
    $scope.add_prod = true;

    $scope.toggleMenu = function() {                
        if($scope.menuState) {                    
            $scope.menuState= false;
        }
        else {
            $scope.menuState= !$scope.menuState.show;
        }
    };

    /** function to get detail of product added in mysql referencing php **/

    $scope.get_product = function() {
        $http.get("db.php?action=get_product").success(function(data)
        { 
            $scope.pagedItems = data;    

        });
    }

    /** function to add details for products in mysql referecing php **/

    $scope.submit_product = function() {
        $http.post('db.php?action=add_product', 
            {
                'prod_name'     : $scope.prod_name, 
                'prod_desc'     : $scope.prod_desc, 
                'prod_price'    : $scope.prod_price,
                'prod_quantity' : $scope.prod_quantity
            }
        )
        .success(function (data, status, headers, config) {
          $scope.get_product();
        })

        .error(function(data, status, headers, config){
           
        });
    }

    /** function to delete product from list of product referencing php **/

    $scope.delete_product = function(index) {  
     
      $http.post('db.php?action=delete_product', 
            {
                'prod_index'     : index
            }
        )      
        .success(function (data, status, headers, config) {    
             $scope.get_product();
        })

        .error(function(data, status, headers, config){
           
        });
    }

    /** fucntion to edit product details from list of product referencing php **/

    $scope.edit_product = function(index) {  
      $scope.update_prod = true;
      $scope.add_prod = false;
      $http.post('db.php?action=edit_product', 
            {
                'prod_index'     : index
            }
        )      
        .success(function (data, status, headers, config) {    
            $scope.prod_id          =   data[0]["id"];
            $scope.prod_name        =   data[0]["prod_name"];
            $scope.prod_desc        =   data[0]["prod_desc"];
            $scope.prod_price       =   data[0]["prod_price"];
            $scope.prod_quantity    =   data[0]["prod_quantity"];

        })

        .error(function(data, status, headers, config){
           
        });
    }

    /** function to update product details after edit from list of products referencing php **/

    $scope.update_product = function() {

        $http.post('db.php?action=update_product', 
                    {
                        'id'            : $scope.prod_id,
                        'prod_name'     : $scope.prod_name, 
                        'prod_desc'     : $scope.prod_desc, 
                        'prod_price'    : $scope.prod_price,
                        'prod_quantity' : $scope.prod_quantity
                    }
                  )
                .success(function (data, status, headers, config) {
                  $scope.get_product();
                })
                .error(function(data, status, headers, config){
                   
                });
    }

    $scope.search_vol = function() {
        /*$http.post('db.php?action=search_vol', 
                    {
                        'id'            : $scope.prod_id,
                        'prod_name'     : $scope.prod_name, 
                        'prod_desc'     : $scope.prod_desc, 
                        'prod_price'    : $scope.prod_price,
                        'prod_quantity' : $scope.prod_quantity
                    }
                  )
                .success(function (data, status, headers, config) {
                  $scope.pagedItems = data;
                })
                .error(function(data, status, headers, config){
                   
                });*/

    $http.post('db.php?action=search_vol&'+'ville_origine='+$scope.ville_origine, 
            {
                'ville_origine'     : $scope.ville_origine, 
                'ville_arriver'     : $scope.ville_arriver
            }
        )
        .success(function (data, status, headers, config) {
          //$scope.get_product();
          //console.log(data);
          $scope.pagedItems = data;
        })
        .error(function(data, status, headers, config){
            
        });
    }
   
});